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
            // echo '<pre>'; var_dump($datas); '</pre>';
            if(count($datas) > 0 ){
                #Je crée un tableau qui contiendra un tableau pour chaque titre (catégorie de carousel) qui lui même contient toutes les images associés à ce titre (catégorie).
                // foreach ($datas as $data) {

                // $carousels[$data['title_carousel']][] = new Carousels($data);
               
                // }

            }

        // include './Views/Carousel/index.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }
    }






}