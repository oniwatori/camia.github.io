<?php 
class Admin_Controller_Cates extends Admin_Controller_Base{
     
    public function init(){
        $this->allowAccessAction = array('login');
        parent::init();
    }
    
    public function index(){        
        $model = new Cates('search');
        $model->load(Fw_Request::Post('Cates'));
        $condition = $model->searchCondition();
        $this->view->model = $model;
        $this->view->models = $model->findAll($condition['condition'], $condition['param']);
        $this->view->render('index');
    }
    
    public function add(){
        
    }
    
    public function edit($param = null){
        
    }
    
    public function delete($param = null){
        
    }
     
}