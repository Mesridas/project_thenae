<?php

class Categories {
  
    private $_id;
    private $_name; // titre de la categorie
  
  
    #####//////##### MAGIC METHOD #####//////##### 
   
    public function __construct($datafromdb){
      $this->hydrate($datafromdb);
    }
  
    #####//////##### GETTERS #####//////##### 
  
    public function getId(){
      return $this->_id;
    }

    public function getName(){
      return $this->_name;
    }
  
    #####//////##### SETTERS #####//////##### 
  
    public function setId($id){
      $this->_id = $id;
      return $this;
    }
    public function setName($title){
      $this->_name = $title;
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