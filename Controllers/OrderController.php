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

    
    public function store(array $request){

        extract($request);
        try{
            
            if(!empty($name) && !empty($email) && !empty($message)){

                #J'empêche une injection SQL
                $request['message'] = htmlentities($message);

                #REGEX pour vérifier format email
                if(preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9]{3,61}\.[a-z]{0,4}$/', $email)) {
                    
                    #REGEX pour longueur pseudo
                    if(preg_match('/^[a-zA-Z0-9 ._-]{2,31}$/', $name)) {

                        #On vérifie si la personne à déja envoyé un mail => évite de recréer un customer dans la bdd
                        $userExist = $this->_model->check($request); 

                        #Si c'est la première fois, alors on l'enregistre dans notre bdd
                        if($userExist == false){
                            $datas = $this->_model->sendData($request);                    
                        }else{
                            $datas = $this->_model->addOrder($request, $userExist);
                        }

                    }else{
                        header('Location: ./index.php?ctrl=home&action=index&_err=toolong');
                    }
                
                }else{

                    header('Location: ./index.php?ctrl=home&action=index&_err=invalid');
            
                }

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

    public function getLastOrdersBy(int $statut){
    
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
    

    public function getMessageFromOrder(int $order_id){

        try{
            

            $data = $this->_model->readMessageFrom($order_id);
            $order = '';
    
            if(count($data) > 0 ){

                $order = new Orders($data);

            }
        
           return $result = '<p>'.$order->getContent().'</p>'; 

    
        }catch(PDOException $e){
    
            throw new Exception($e->getMessage(), 0 , $e);
    
        }
    }

    // Renvoie un objet json avec tous le détail de la commande
    public function getObjectFromOrder(int $order_id){

        $order_id = $_GET['params'];
        try{
            
            $orderData = $this->_model->readOrderFrom($order_id);
        
            return $result = json_encode($orderData);

        }catch(PDOException $e){
    
            throw new Exception($e->getMessage(), 0 , $e);
    
        }
    }


    public function updateStatut(int $id){

        $params = $_GET['params'];

        try{
            
            $newState = $this->_model->update($params, $id); 

            if($newState){
                header('Location: ./index.php?ctrl=admin&action=manageForm&id='.$id.'' );
            }
    
        }catch(PDOException $e){
    
            throw new Exception($e->getMessage(), 0 , $e);
    
        }

    }

    public function delete(int $id){


        try{
            
            $endingOrder = $this->_model->delete($id); 

            if($endingOrder){
                header('Location: ./index.php?ctrl=admin&action=manageForm&id='.$id.'' );
            }
    
        }catch(PDOException $e){
    
            throw new Exception($e->getMessage(), 0 , $e);
    
        }

    }


    
}