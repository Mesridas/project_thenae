<?php

class Galleries {

    private $_id;
    private $_title; //<h2> de la section
    private $_image; // à placer dans le href et le src de <img>
    private $_data_lightbox;// relie les images entre elles
    private $_data_title;// titre de l'image
    private $_nbImages; // Nombre d'images en galerie, sert pour la pagination

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

    public function getImage(){
        return $this->_image;
    }

    public function getData_lightbox(){
        return $this->_data_lightbox;
    }

    public function getData_title(){
        return $this->_data_title;
    }

    public function getNbImages(){
        return $this->_nbImages;
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
    
    public function setImage($img){
        $this->_image = $img;
        return $this;
    }

    public function setData_lightbox($link){
        $this->_data_lightbox = $link;
        return $this;
    }


    public function setData_title($img_title){
        $this->_data_title = $img_title;
        return $this;
    }

    public function setNbImages($image_number){
        $this->_nbImages = $image_number;
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