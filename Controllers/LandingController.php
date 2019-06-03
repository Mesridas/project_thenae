<?php

class LandingController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new LandingModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e);

        }
    }

    public function index(){

        

        include './Views/Landing/index.php';

    }





}