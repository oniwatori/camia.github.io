<?php 
class Admin_Controller_Index extends Admin_Controller_Base{
     
    public function init(){
        $this->allowAccessAction = array('login');
        parent::init();
    }
    
    public function index(){
        $this->view->render("index");
    }
     
    public function login(){
        $this->view->setLayout('login');
        $this->view->error = '';
        if(null != Fw_Request::post('User')){
            $user = new Users('login');
            $user->load(Fw_Request::post('User'));
            if($user->validate() && $user->login()){
                $url = Fw_Session::get("oldUrl");
                if($url != null){
                    Fw_Session::delete("oldUrl");
                    //die($url);
                    $this->redirect($url);
                } else {
                    $this->redirect(Fw::$baseUrl);
                }                
            }else{
                $this->view->error = 'Wrong username or password.';
            }
        }
        $this->view->render('login');
    }
    
    public function logout(){
        if(Fw_User::logout()){
            $this->redirect(Fw::$baseUrl . '/login');
        }else{
            Fw_Session::destroy();
            $this->redirect(Fw::$baseUrl .'/../');
        }
    }
    
}