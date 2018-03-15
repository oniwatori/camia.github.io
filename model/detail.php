<?php
class Detail extends Fw_Model{
     
    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('tbl_detail');
    }
     
    public function maps(){
        return array(
            'id' => array('id'),// , 'label' => 'Id', 'match' => true, 'operator' => 'AND'
            'language_id' => array('language_id'),
            'post_id' => array('post_id'),
            'content' => array('content', 'match' => false),       
            'status' => array('status'),                        
            'inserted' => array('inserted'),
            'updated' => array('updated'),
            'inserter' => array('inserter'),
            'updater' => array('updater'),
        );
    }
     
    public function rules(){
        return array(
            array('name, alias', 'required'),
            array('status, horizontal_id', 'number', 'integerOnly' => true)
        );
    }
     
    public function beforeInsert() {
        $this->status = 1;
        $this->inserted = date('Y-m-d H:i:s');
        $this->inserter = Fw_User::getId();
        $this->updated = date('Y-m-d H:i:s');
        $this->updater = Fw_User::getId();
    }
     
    public function beforeUpdate() {
        $this->updated = date('Y-m-d H:i:s');
        $this->updater = Fw_User::getId();
    }
}