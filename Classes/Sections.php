<?php


class Sections {

    private $_id;
    private $_image;
    private $_text;
    private $_title;

    public function __construct($datas){
        $this->hydrate($datas);
    }


##################### GETTER's #####################

    public function getId(){
        return $this->_id;
    }

    public function getImage(){
        return $this->_image;
    }

    public function getText(){
        return $this->_text;
    }

    public function getTitle(){
        return $this->_title;
    }


##################### SETTER's #####################

    public function setId($id){
        $this->_id = $id;
        return $this;
    }

    public function setImage($img){
        $this->_image = $img;
        return $this;
    }

    public function setText($txt){
        $this->_text = $txt;
        return $this;
    }

    public function setTitle($title){
        $this->_title = $title;
        return $this;
    }


  ####################  METHODS  #####################

    public function hydrate($data){

        foreach($data as $key => $value){
          $methodName = 'set'. ucfirst($key);
          if(method_exists($this, $methodName)){
            $this->$methodName($value);
          }
        }
    }

    
}