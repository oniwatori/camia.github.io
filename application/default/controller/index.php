<?php
class Default_Controller_Index extends Default_Controller_Base{

    public function init(){
            parent::init();
            $this->view->setLayout("default");
            //$this->view->banners = News::model()->findAll("rate = :rate and status = 0", array(':rate' => Constant::$Slider));
    }

    public function index($param){
        if(sizeof($param) == 0)
            $param[] = $this->horzFunc[0]->alias;
        if(sizeof($param) == 1) {
            $hmn = $param[0];
            $alias = '';
            $horz = Horizontal::model()->find("deleted IS NULL AND status = 1 AND alias = :alias", array(':alias' => $hmn));
            if(!$horz) {
                $horz = Horizontal::model()->find("deleted IS NULL AND status = 1 AND alias = :alias", array(':alias' => $this->horzFunc[0]->alias));
                $alias = $param[0];
            }
            if($alias != '') {
                $post = Post::model()->find("deleted IS NULL AND status = 1 AND alias = :alias", array(':alias' => $alias));
                if(!post)
                    $this->error(array('code' => '404', 'message' => $param[0].' not found!'));
                else {
                    $detail = Detail::model()->find("deleted IS NULL AND status = 1 AND post_id = :pid AND language_id = :lid", 
                        array(':pid' => $post->post_id, ':lid' => 1));
                    $this->view->post = $post;
                    $this->view->detail[$post->id] = $detail;
                    $this->view->render('index');
                }                
            } else {

                $post = Post::model()->findAll("deleted IS NULL AND status = 1");
                
                if(!$post)
                    $this->error(array('code' => '404', 'message' => $param[0].' not found!'));
                else {
                    $detail = array();
                    foreach ($post as $p) {
                        $detail[$p->id][1] = Detail::model()->find("deleted IS NULL AND status = 1 AND post_id = :pid AND language_id = :lid", array(':pid' => $p->id, ':lid' => 1));
                    }
                    $this->view->post = $post;
                    $this->view->detail = $detail;
                    $this->view->render('test');
                }
                
            }

        } else {
            $hmn = $param[0];
            $alias = '';
            $horz = Horizontal::model()->find("deleted IS NULL AND status = 1 AND alias = :alias", array(':alias' => $hmn));
            if(!$horz){
                $horz = Horizontal::model()->find("deleted IS NULL AND status = 1 AND alias = :alias", array(':alias' => $this->horzFunc[0]->alias));
                $alias = $param[0];
            } else {
                $alias = param[1];
            }

            if($alias != '') {
                $post = Post::model()->find("deleted IS NULL AND status = 1 AND alias = :alias", array(':alias' => $alias));
                if(!$post)
                    $this->error(array('code' => '404', 'message' => $param[0].' not found!'));
                else {
                    $detail = Detail::model()->find("deleted IS NULL AND status = 1 AND post_id = :pid AND language_id = :lid", 
                        array(':pid' => $post->post_id, ':lid' => $post->language_id));
                    $this->view->post = $post;
                    $this->view->detail[$post->id] = $detail;
                    $this->view->render('index');
                }                
            } else {

            }

        }
        
    }
    
    public function error($param = null){
        $this->view->param = $param;
        $this->view->render('error');
    }
    
    public function about(){
        $this->view->render('about');
    }
    
    public function contact(){
        echo 'This is contact page!';
    }

    public function tag($param){
        $this->view->param = array('code' => '404', 'message' => 'Request invalid or be deline!');
        $this->view->renderPartial('error');
    }

}