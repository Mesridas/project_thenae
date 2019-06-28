<?php

class Login {

  private $_id;
  private $_login;
  private $_password;
  private $_roleid;
  private $_rolename; // récupére le role admin
  private $_power; // permet d'attribuer les autorisations
  private $_image;


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

  public function getRoleid(){
    return $this->_roleid;
  }

  public function getRolename(){
    return $this->_rolename;
  }

  public function getPower(){
    return $this->_power;
  }

  public function getImage(){
    return $this->_image;
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

  public function setRoleid($rolid){
    $this->_roleid = $rolid;
    return $this;
  }
  public function setRolename($role){
    $this->_rolename = $role;
    return $this;
  }
  public function setPower($power){
    $this->_power = $power;
    return $this;
  }
  
  public function setImage($img){
    $this->_image = $img;
    return $this;
  }

  #####//////##### METHOD #####//////##### 


  public function hydrate($datafromdb){
    
    foreach($datafromdb as $attribute => $bindValue){

      $methodName = 'set'.ucfirst($attribute);
  
      if(method_exists($this, $methodName)){

        $this->$methodName($bindValue);

      }
    }
  }



}