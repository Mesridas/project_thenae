<?php

class EventController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new EventsModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e);

        }
    }

    public function index(){
        try{

            $datas = $this->_model->readAll();
            $events = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                $events[] = new Events($data);
                }
            }

        include './Views/Event/index.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        
        }
    }


    public function add($request){

        if(!empty($request)){

            $newEvent = $this->_model->add($request);

        }else{

                $erreur = "Veuillez rentrer un titre";
              
        }

        if($newEvent){
            header('Location: ./index.php?ctrl=admin&action=manageEvent&addevent=success');
        }else{
            header('Location: ./index.php?ctrl=admin&action=manageEvent&addevent=error');
        }


    }
    
    public function delete($id){

        try{

            $del = $this->_model->delete($id);
    
            if($del){
            header('Location: ./index.php?ctrl=admin&action=manageEvent');
            }else{
            header('Location: ./index.php?ctrl=admin&action=manageEvent');
            }            

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }
    }


}