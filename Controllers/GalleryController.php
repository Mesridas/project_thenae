<?php

class GalleryController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new GalleriesModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e); 
        }

    }


    public function index(){
        try{

            $datas = $this->_model->readAll();
            $galleries = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                $galleries[] = new Galleries($data);
                }
            }

        include './Views/Gallery/index.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }
    }






}