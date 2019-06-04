<?php

class Medias {

  private $_id;
  private $_title; // a prendre du post qu'on a dans le form d'envoi
  private $_location; // Si on veut lui attribuer un endroit de 0 à 9 sur l'affichage dans la gallerie
  private $_description; // Si on veut décrire l'image qu'on envoie.
  #On va passer en bdd le tableau renvoyer par $_files une fois uploadé :
  private $_name;
  private $_type;
  private $_tmp_name;
  private $_error;
  private $_size;

  public function __construct($datas){
    $this->hydrate($datas);
  }

##################### GETTER's #####################

  public function getId(){
    return $this->_id;
  }

  public function getTitle(){
    return $this->_title;
  }

  public function getLocation(){
    return $this->_location;
  }

  public function getDescription(){
    return $this->_description;
  }

  public function getName(){
    return $this->_name;
  } 

  public function getType(){
    return $this->_type;
  } 

  public function getTmp_Name(){
    return $this->_tmp_name;
  } 

  public function getError(){
    return $this->_error;
  } 

  public function getSize(){
    return $this->_size;
  } 

  public function getRank(){
    return $this->_rank;
  } 

##################### SETTER's #####################

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

  public function setDescription($desc){
    $this->_description = $desc;    
    return $this;
  }
  
  public function setName($name){
    $this->_name = $name;   
    return $this;
  } 

  public function setType($type){
    $this->_type = $type; 
    return $this;
  } 

  public function setTmp_Name($tmp){
    $this->_tmp_name = $tmp;    
    return $this;
  } 

  public function setError($error){
    $this->_error = $error;
    return $this;
  } 

  public function setSize($size){
    $this->_size = $size;   
    return $this;
  } 

  public function setRank($rank){
    $this->_rank = $rank; 
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