<?php 
class Admin_Controller_Base extends Fw_Controller{
    public $allowAccessAction = array();
    public function __construct() {
        parent::__construct();
    }
     
    public function init(){
        Fw_Session::start();
        if($this->authentication()){
            $this->setGlobal();
        }
        $this->view->setLayout("default");
    }
     
    private function setGlobal(){
        $this->defaultRecordPerPage = Fw::$config['recordPerPage'];
        $this->defaultPageRank = Fw::$config['pageRank'];
    }
     
    private function authentication(){
        if(in_array(Fw::$action, $this->allowAccessAction)){
            return true;
        }
        if(Fw_User::logged()){
            if($this->authorization()){
                return true;
            }else{
                $this->redirect(Fw::$baseUrl . '/../');
            }
        }else{
            Fw_Session::set("oldUrl",Fw_Helper::getCurrentUrl());
            $this->redirect(Fw::$baseUrl . '/login');
            return false;
        }
    }
     
    private function authorization(){
        $user = Users::model()->find('id = :id', array(':id' => Fw_User::getId()));
        if($user != false && $user->id != ''){
            if($user->roles == 1){
                return true;
            }
        }
        return false;
    }
}