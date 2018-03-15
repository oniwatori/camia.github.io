<?php
class Language extends Fw_Model{
     
    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('tbl_language');
    }
     
    public function maps(){
        return array(
            'id' => array('id'),// , 'label' => 'Id', 'match' => true, 'operator' => 'AND'
            'name' => array('name', 'match' => false),
            'alias' => array('alias'),    
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