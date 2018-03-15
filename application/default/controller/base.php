<?php
class Default_Controller_Base extends Fw_Controller{
    public function init(){
        Fw_Session::start();
        $this->horzFunc = $this->loadHorizontalFunc();
        $this->view->horzFunc = $this->horzFunc;
    }

    public function loadHorizontalFunc(){
    	$item = Horizontal::model()->findAll("deleted IS NULL AND status = 1");
    	return $item;
    }

}