<?php
class Fw_Controller{
    public $view;
    
    public function __construct() {
        $this->view = new Fw_View;
    }
    
    public function redirect($url){
        header('location:' . $url);
    }
}