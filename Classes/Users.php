<?php

class Users {

  
    private $_id;
    private $_login;
    private $_password;
    private $_email; 
    private $_role_fk;
    private $_picture_fk;
  
  
    #####//////##### MAGIC METHOD #####//////##### 
   
    public function __construct($datafromdb){
      $this->hydrate($datafromdb);
    }
  
    #####//////##### GETTERS #####//////##### 
  
    public function getId(){
      return $this->_id;
    }
  
    public function getLogin(){
      return $this->_login;
    }
  
    public function getPassword(){
      return $this->_password;
    }
  
    public function getEmail(){
      return $this->_email;
    }

  
    public function getRole(){
      return $this->_role_fk;
    }
  
    public function getPicture_fk(){
      return $this->_picture_fk;
    }
  
  
    #####//////##### SETTERS #####//////##### 
  
    public function setId($id){
      $this->_id = $id;
      return $this;
    }
    public function setLogin($login){
      $this->_login = $login;
      return $this;
    }
    public function setPassword($pwd){
      $this->_password = $pwd;
      return $this;
    }
    public function setEmail($email){
      $this->_email = $email;
      return $this;
    }

    public function setRole($role){
        $this->_role_fk = $role;
        return $this;
    }
  
    public function setPicture($picture){
        $this->_picture_fk = $picture;
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