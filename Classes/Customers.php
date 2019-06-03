<?php 

class Customers {

  
    private $_id;
    private $_name;
    private $_email; 
    // private $_orders_fk;

  
  
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

    public function getEmail(){
      return $this->_email;
    }
  
    // public function getOrders_fk(){
    //   return $this->_orders_fk;
    // }
  
    #####//////##### SETTERS #####//////##### 
  
    public function setId($id){
      $this->_id = $id;
      return $this;
    }
    public function setLogin($name){
      $this->_name = $name;
      return $this;
    }
    public function setEmail($email){
      $this->_email = $email;
      return $this;
    }
    // public function setOrders_fk($orders){
    //   $this->_orders_fk = $orders;
    //   return $this;
    // }
 
  
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


