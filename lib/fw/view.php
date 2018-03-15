<?php
class Fw_View {
    private $title;
    private $image;
    private $keywords;
    private $description;
    private $published;
    private $modified;
    private $layout;
    private $placeholder;
    
    public function __construct(){
        $this->setLayout(Fw::$config['defaultTemplate']);
        $this->setTitle(isset(Fw::$config['name'])?Fw::$config['name']:'');
    }
    
    public function render($name){
        $this->placeholder = $name;
        require 'application/'.strtolower(Fw::$module).'/view/layout/'.$this->layout.'.php';
    }
    
    public function renderPartial($name){
        $names = explode('/', $name);
        if(count($names) == 1){
            $name = strtolower(Fw::$controller) .'/'. $name;
        }
        require 'application/'.strtolower(Fw::$module).'/view/'.$name.'.php';
    }
    
    public function placeholder(){
        $names = explode('/', $this->placeholder);
        if(count($names) == 1){
            $this->placeholder = strtolower(Fw::$controller) .'/'. $this->placeholder;
        }
        require 'application/'.strtolower(Fw::$module).'/view/'.$this->placeholder.'.php';
    }
    
    public function setLayout($layout){
        $this->layout = $layout;
    }
    public function getLayout(){
        return $this->layout;
    }
    public function setKeywords($keywords){
        $this->keywords = $keywords;
    }
    public function getKeywords(){
        return $this->keywords;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function getDescription(){
        return $this->description;
    }
    
    public function setPublished($published){
        $this->published = $published;
    }
    
    public function setModified($modified){
        $this->modified = $modified;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function getTitle(){
        return $this->title;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getImage(){
        return $this->image;
    }
}