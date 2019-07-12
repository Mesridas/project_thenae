<?php

class OrderController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new OrdersModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e); 
        }

    }

    
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

    public function getLastOrdersBy($statut){

    
        try{
            
            $datas = $this->_model->readOrdersBy($statut);
            $orders = [];
    
            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                  $orders[] = new Orders($data);
                }
            }
    
        }catch(PDOException $e){
    
            throw new Exception($e->getMessage(), 0 , $e);
    
        }
    
        $result = '';
    
        foreach($orders as $order){
    
            $result .= '
            <div id="'.$order->getId().'" class="tile is-child box selectedOrder">
                <p class="title">'.$order->getCustomer_name().'</p>
                <p class="subtitle">'.$order->getCustomer_email().'</p>
                <p class="subtitle">Numéro de commande :'.$order->getId().'</p>
            </div>';
        }
        return $result;
    
    }
    

    public function getMessageFromOrder($order_id){

        try{
            

            $data = $this->_model->readMessageFrom($order_id);
            $order = '';
    
            if(count($data) > 0 ){

                $order = new Orders($data);

            }
        
           return $result = '<p id="orderMessage">'.$order->getContent().'</p>'; 

    
        }catch(PDOException $e){
    
            throw new Exception($e->getMessage(), 0 , $e);
    
        }
    }


}