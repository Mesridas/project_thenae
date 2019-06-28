<?php

class LoginModel extends CoreModel  {

  private $_req;

  public function __destruct(){

    if(!empty($this->_req)){
      $this->_req->closeCursor();
    }
  }

  public function connexion($id, $pwd){

    try{

      if(($this->_req = $this->getDb()->prepare('SELECT `use_id` as `id`, `use_login` as `login`, `use_pwd` as `password`, `rol_id` as `roleid`, `rol_name` as `rolename`, `rol_power` as `power` FROM `USERS` LEFT JOIN `ROLES` ON `use_rol_fk` = `rol_id` WHERE `use_login` = :idlogin AND `use_password` = :pwdlogin')) !== false){

        if(($this->_req->bindValue('idlogin', $id) && $this->_req->bindValue('pwdlogin', $pwd))){

          if($this->_req->execute()){

            $connexions = $this->_req->fetch(PDO::FETCH_ASSOC);

            return $connexions;
          }
        }
      }
      return false;

    }catch(PDOException $e){
      die($e->getMessage());
    }
  }
}
