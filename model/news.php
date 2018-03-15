<?php
class News extends Fw_Model{
     
    public function __construct($scenario = null) {
        $this->scenario = $scenario;
        parent::__construct('news');
    }
     
    public function maps(){
        return array(
            'id' => array('id'),// , 'label' => 'Id', 'match' => true, 'operator' => 'AND'
            'title' => array('title', 'match' => false),
            'alias' => array('alias', 'match' => false),
            'cate_id' => array('cate_id', 'label' => 'Category'),
            'image' => array('image'),
            'description' => array('description', 'match' => false),
            'summary' => array('summary'),
            'tags' => array('tags'),
            'source' => array('source'),
            'rate' => array('rate', 'label' => 'Type'),
            'status' => array('status'),
            'seo_title' => array('seo_title', 'match' => false),
            'seo_keywords' => array('seo_keywords', 'match' => false),
            'seo_description' => array('seo_description', 'match' => false),
            'views' => array('views'),            
            'inserted' => array('inserted'),
            'updated' => array('updated'),
            'inserter' => array('inserter'),
            'updater' => array('updater'),
        );
    }
     
    public function rules(){
        return array(
            array('title, alias, cate_id, summary, description, tags', 'required'),
            array('cate_id, status, rate', 'number', 'integerOnly' => true),
            array('ImageUpload', 'file', 'ext' => array('jpg', 'png', 'gif'), 'minWidth' => 500),
            array('ImageUpload', 'file', 'ext' => array('jpg', 'png', 'gif'), 'minWidth' => 500, 'allowEmpty' => true, 'on' => 'update')
        );
    }
     
    public function beforeInsert() {
        // setting default value of fields was not attacked in screen
        $this->views = 0;
        $this->seo_title = $this->title;
        $this->seo_keywords = $this->tags;
        $this->seo_description = $this->description;
        $this->inserted = date('Y-m-d H:i:s');
        $this->inserter = Fw_User::getId();
        $this->updated = date('Y-m-d H:i:s');
        $this->updater = Fw_User::getId();
    }
     
    public function beforeUpdate() {
        // implement new value for fields was not attached
        $this->seo_title = $this->seo_title;
        $this->seo_keywords = $this->tags;
        $this->seo_description = $this->description;
        $this->updated = date('Y-m-d H:i:s');
        $this->updater = Fw_User::getId();
    }
}