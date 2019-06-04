<?php

class SectionController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new SectionsModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e);

        }
    }

    public function index(){
        try{

            $datas = $this->_model->readAll();
            $sections = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                $sections[] = new Sections($data);
                }
            }

        include './Views/Section/index.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }
    }





}