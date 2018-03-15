<?php 
class Admin_Controller_News extends Admin_Controller_Base{
     
    public function init(){
        $this->allowAccessAction = array('login');
        parent::init();
    }
    
    public function index(){
        
        $model = new News('search');
        $model->load(Fw_Request::request('News'));
        $condition = $model->searchCondition();
        $total = $model->getCount('id', $condition['condition'], $condition['param']);
        /* Start Paging */
        $totalPage = $total < $this->defaultRecordPerPage ? 1 : $total % $this->defaultRecordPerPage == 0 ? $total / $this->defaultRecordPerPage : (int)($total / $this->defaultRecordPerPage) + 1;
        $page = Fw_Request::request('page');
        $page = $page == null ? 1 : is_numeric($page) ? ($page > 0 ? ($page > $totalPage ? $totalPage : $page) : 1) : 1;
        $offset = ($page - 1) * $this->defaultRecordPerPage;
        $offset = $offset > 0 ? $offset : 0;
        $paging = Fw_Helper::getPagingArray($page, $totalPage, $this->defaultPageRank);
        /* End Paging */
        $this->totalPage = $totalPage;
        $this->view->page = $page;
        $this->view->paging = $paging;
        $this->view->model = $model;
        $this->view->models = $model->findAll($condition['condition'], $condition['param'], $offset, $this->defaultRecordPerPage);
        $this->view->render('index');
    }
    
    public function add(){
        $model = new News;
        if(null != Fw_Request::post('News')){
            $model->load(Fw_Request::post('News'));
            $model->alias = Fw_Helper::convertAlias($model->alias);

            if(Fw_Request::file('ImageUpload')["size"] != 0) {
                $model->image = $model->alias.".jpg";
            }

            if($model->validate()){
                $exists = $model->find('alias = :alias', array(':alias' => $model->alias));
                if($exists != false){
                    $model->errors['alias'] = 'This product is exists in database.';
                }else{

                    Fw_Helper::saveImageAsResource($model->image, "news", true);
                    //Insert data to database
                    $model->insert();
                    $this->redirect(Fw::$baseUrl . '/' . Fw::$controller);
                }
            }
            $this->view->errors = $model->errors;
        }
        $this->view->model = $model;
        $this->view->render('form');
    }
    
    public function edit($param = null){
        if(isset($param[0])){
            $product = News::model()->find('id = :id', array(':id' => $param[0]));
            if($product){
                $model = new News('update');
                $model->load($product);
                if(null != Fw_Request::post('News')){
                    $model->load(Fw_Request::post('News'));
                    $model->alias = Fw_Helper::convertAlias($model->alias);
                    if($model->validate()){
                        $exists = $model->find('alias = :alias and id <> :id', array(':alias' => $model->alias, ':id' => $model->id));
                        if($exists){
                            $model->errors['alias'] = 'Other product with this alias exists in database.';
                        }else{
                            $exists = $model->find('id = :id', array(':id' => $model->id));
                            if(Fw_Request::file('ImageUpload')["size"] != 0){

                                if (file_exists("public/images/news/".$model->image)) {
                                    unlink("public/images/news/".$model->image);
                                }
                                if (file_exists("public/images/news/".$model->image)) {
                                    unlink("public/images/news/thumbs/".$model->image);
                                }
                                
                                $model->image = $model->alias . '.jpg';
                                Fw_Helper::saveImageAsResource($model->image, "news", true);
                            } else {
                                $model->image = $exists->image;
                            }
                            $model->update('id = :id', array(':id' => $model->id));
                            $this->redirect(Fw::$baseUrl . '/' . Fw::$controller);
                        }
                    }
                    $this->view->errors = $model->errors;
                }
                $this->view->model = $model;
                $this->view->render('form');
            }else{
                $this->redirect(Fw::$baseUrl . '/' . Fw::$controller);
            }
        }else{
            $this->redirect(Fw::$baseUrl . '/' . Fw::$controller);
        }
    }
    
    public function delete($param = null){
        if(isset($param[0])){
            $model = new News('delete');
            $exists = $model->find('id = :id', array(':id' => $param[0]));
            if($exists) {
                News::model()->delete('id = :id', array(':id' => $param[0]));
                Fw_Helper::deleteResourceImage($exists->title, "news", true);
            }
        }
        $this->redirect(Fw::$baseUrl . '/' . Fw::$controller);
    }

    public function search(){
        $model = new News('search');
        $model->load(Fw_Request::request('News'));
        $condition = $model->searchCondition();
        $total = $model->getCount('id', $condition['condition'], $condition['param']);
        /* Start Paging */
        $totalPage = $total < $this->defaultRecordPerPage ? 1 : $total % $this->defaultRecordPerPage == 0 ? $total / $this->defaultRecordPerPage : (int)($total / $this->defaultRecordPerPage) + 1;
        $page = Fw_Request::request('page');
        $page = $page == null ? 1 : is_numeric($page) ? ($page > 0 ? ($page > $totalPage ? $totalPage : $page) : 1) : 1;
        $offset = ($page - 1) * $this->defaultRecordPerPage;
        $offset = $offset > 0 ? $offset : 0;
        $paging = Fw_Helper::getPagingArray($page, $totalPage, $this->defaultPageRank);
        /* End Paging */
        $this->totalPage = $totalPage;
        $this->view->page = $page;
        $this->view->paging = $paging;
        $this->view->model = $model;
        $this->view->models = $model->findAll($condition['condition'], $condition['param'], $offset, $this->defaultRecordPerPage);
        $this->view->renderPartial('search');
    }
     
}