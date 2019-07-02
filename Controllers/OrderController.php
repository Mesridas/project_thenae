<?php

class OrderController {

    private $_model;

    public function __construct(){

    public function __construct(){
zézé
        try{

            $this->_model = new OrdersModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e); 
        }

    }


    // public function index(){
    //     try{

    //     }catch(PDOException $e){
 
    //     throw new Exception($e->getMessage(), 0 , $e);
    //     }
    // }
    
    public function store($request){

        extract($request);
        try{
            
            if(!empty($name) && !empty($email) && !empty($message)){
                
                #On vérifie si la personne à déja envoyé un mail => évite de recréer un customer dans la bdd
                $userExist = $this->_model->check($request); 

                #Si c'est la première fois, alors on l'enregistre dans notre bdd
                if($userExist == false){
                    $datas = $this->_model->sendData($request);                    
                }else{
                    $datas = $this->_model->addOrder($request, $userExist);
                }
                echo '<pre>';
                var_dump($userExist);
                echo '</pre>';

            }
            

            if($datas){
                header('Location: ./index.php?ctrl=home&action=index&contact=success');
            }
            else{
                header('Location: ./index.php?ctrl=home&action=index&contact=error');
            }
    
          }catch(PDOException $e){
    
            throw new Exception($e->getMessage(), 0 , $e);
    
          }

    }





}