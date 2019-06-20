<?php

class Orders {

    private $_id;
    private $_content;
    private $_statut;
    private $_customer;

    #####//////##### MAGIC METHOD #####//////##### 

    public function __construct($datafromdb){
    $this->hydrate($datafromdb);
    }  

    #####//////##### GETTERS #####//////##### 
  
    public function getId(){
        return $this->_id;
    }
  
    public function getContent(){
        return $this->_content;
    }
  
    public function getStatus(){
        return $this->_statut;
    }
  
    public function getCustomer(){
        return $this->_customer;
    }

    #####//////##### SETTERS #####//////##### 

    public function setId($id){
        $this->_id = $id;
        return $this;
    }

    public function setContent($ord_content){
        $this->_content = $ord_content;
        return $this;
    }

    public function setStatus($ord_status){
        $this->_status = $ord_status;
        return $this;
    }

    public function setCustomer($ord_customer){
        $this->_customer = $ord_customer;
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