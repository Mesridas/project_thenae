<?php

class Carousels {

  
    private $_id;
    private $_title_carousel; // titre de la catégorie : sac à mains, pochettes, ...
    private $_title; // data-title
    private $_location; // data-lightbox
    private $_type_img; // set = 1 ou unset = 0
    private $_image; // nom de l'image
  
  
    #####//////##### MAGIC METHOD #####//////##### 
   
    public function __construct($datafromdb){
      $this->hydrate($datafromdb);
    }
  
    #####//////##### GETTERS #####//////##### 
  
    public function getId(){
      return $this->_id;
    }
  
    public function getTitle_carousel(){
      return $this->_title_carousel;
    }
  
    public function getTitle(){
      return $this->_title;
    }
  
    public function getLocation(){
      return $this->_location;
    }

  
    public function getType_img(){
      return $this->_type_img;
    }
  
    public function getImage(){
      return $this->_image;
    }
  
  
    #####//////##### SETTERS #####//////##### 
  
    public function setId($id){
      $this->_id = $id;
      return $this;
    }
    public function setTitle_carousel($titlec){
      $this->_title_carousel = $titlec;
      return $this;
    }
    public function setTitle($title){
      $this->_title = $title;
      return $this;
    }
    public function setLocation($location){
      $this->_location = $location;
      return $this;
    }

    public function setType_img($type){
        $this->_type_img = $type;
        return $this;
    }
  
    public function setImage($picture){
        $this->_image = $picture;
        return $this;
    }
  
  
    #####//////##### METHOD #####//////##### 
  
  
 
    public function hydrate($data){

        foreach($data as $key => $value){
          $methodName = 'set'. ucfirst($key);
          if(method_exists($this, $methodName)){
            $this->$methodName($value);
          }
        }
    }



}