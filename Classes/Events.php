<?php


class Events {

    private $_id;
    private $_text;

    public function __construct($datas){
        $this->hydrate($datas);
    }


##################### GETTER's #####################

    public function getId(){
        return $this->_id;
    }

    public function getText(){
        return $this->_text;
    }


##################### SETTER's #####################

    public function setId($id){
        $this->_id = $id;
        return $this;
    }

    public function setText($txt){
        $this->_text = $txt;
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