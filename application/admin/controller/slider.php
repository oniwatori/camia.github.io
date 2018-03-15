<?php 
class Admin_Controller_Slider extends Admin_Controller_Base{
     
    public function init(){
        $this->allowAccessAction = array('login');
        parent::init();
    }

    public function index()
    {
        $model = new News('slider');
        $model->load(Fw_Request::request('News'));
        $model->rate = Constant::$Slider;
        $condition = $model->searchCondition();
        $this->view->model = $model;
        $this->view->models = $model->findAll($condition['condition'], $condition['param']);
        $this->view->render('index');
    }

    public function search($param)
    {
        $model = new News('slider');
        $model->load(Fw_Request::request('News'));
        $model->rate = Constant::$Slider;
        $condition = $model->searchCondition();
        $this->view->model = $model;
        $this->view->models = $model->findAll($condition['condition'], $condition['param']);
        $this->view->renderPartial('search');
    }

    public function add()
    {
        $count = News::model()->getCount('id','status = 0 and rate = :rate', array(':rate' => Constant::$Slider));
        if($count and $count >= 10){
            http_response_code(403);
            return;
        }
        $alias = Fw_Request::request("alias");
        if($alias and trim($alias) != "") {
            // set slider
            
            $existed = News::model()->find('alias=:alias and status = 0', array(':alias' => $alias));
            if($existed){
                $existed->rate = Constant::$Slider;
                $update = new News('update');
                $update->load($existed);
                $update->update('id=:id', array(':id' => $existed->id));
            }

            $count = News::model()->getCount('id','status = 0 and rate = :rate', array(':rate' => Constant::$Slider));
            if($count and $count >= 10){
                http_response_code(410);
                return;
            }            
        }
        $model = new News("search-slider");
        $model->load(Fw_Request::request("News"));
        $model->rate = Constant::$Normal;
        $condition = array();
        $condition['condition'] = ($model-> cate_id == 0 ? "" : "cate_id = :cate_id and ")."title like :title and rate = :rate and status = 0";
        if($model->cate_id != 0){
            $condition['param'][':cate_id'] = $model->cate_id; 
        }
        $condition['param'][':title'] = '%'.$model->title.'%';
        $condition['param'][':rate'] = Constant::$Normal;

        $this->view->model = $model;
        $this->view->models = $model->findAll($condition['condition'], $condition['param'], 0, 20);
        $this->view->renderPartial('form');
    }

    public function delete($param){
        
        if(sizeof($param) == 1 and trim($param[0]) != "") {
            // unset slider            
            $existed = News::model()->find("id=:id and rate = :rate and status = 0", array(':id' => $param[0], ':rate' => Constant::$Slider));
            
            if($existed){
                $existed->rate = Constant::$Normal;
                $update = new News('update');
                $update->load($existed);
                $update->update('id=:id', array(':id' => $existed->id));
            }            
        }

        $this->redirect(Fw::$baseUrl . '/slider');
    }
     
}