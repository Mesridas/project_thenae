<?php

class Orders {

    private $_id;
    private $_content;
    private $_statut;
    private $_customer_id;
    private $_customer_name;
    private $_customer_email;

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
  
    public function getStatut(){
        return $this->_statut;
    }
  
    public function getCustomer_id(){
        return $this->_customer_id;
    }
    public function getCustomer_name(){
        return $this->_customer_name;
    }
    public function getCustomer_email(){
        return $this->_customer_email;
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

    public function setStatut($ord_status){
        $this->_status = $ord_status;
        return $this;
    }

    public function setCustomer($ord_customer){
        $this->_customer_id = $ord_customer;
        return $this;
    }
    public function setCustomer_name($name_cus){
        $this->_customer_name = $name_cus;
        return $this;
    }
    public function setCustomer_email($cus_email){
        $this->_customer_email = $cus_email;
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