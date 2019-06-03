<?php

class CarouselController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new CarouselsModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e); 
        }

    }


    public function index(){
        try{

            $datas = $this->_model->readAll();
            $carousels = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                $carousels[] = new Carousels($data);
                }
            }

        include './Views/Carousel/index.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }
    }






}