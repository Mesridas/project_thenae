<?php

class Carousels {

  
    private $_id;
    private $_title; // data-title
    private $_location; // data-lightbox
    private $_type_img; // set = 1 ou unset = 0
    private $_image; // nom de l'image
    private $_categorie_id;// 
    private $_categorie_name;// nom de la categorie
    private $_nbImages; // Nombre d'images du carousel, sert pour la pagination
  
  
    #####//////##### MAGIC METHOD #####//////##### 
   
    public function __construct($datafromdb){
      $this->hydrate($datafromdb);
    }
  
    #####//////##### GETTERS #####//////##### 
  
    public function getId(){
      return $this->_id;
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
    
    public function getCategorie_id(){
      return $this->_categorie_id;
    }

    public function getCategorie_name(){
      return $this->_categorie_name;
    }
 
    public function getNbImages(){
      return $this->_nbImages;
  } 

    #####//////##### SETTERS #####//////##### 
  
    public function setId($id){
      $this->_id = $id;
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
    public function setCategorie_id($categorie){
      $this->_categorie_id = $categorie;
      return $this;
    }
    public function setCategorie_name($categorieName){
      $this->_categorie_name = $categorieName;
      return $this;
    }
    
    public function setNbImages($image_number){
      $this->_nbImages = $image_number;
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