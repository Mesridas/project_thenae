<?php 

    class OrdersModel extends CoreModel {

        private $_req;

        public function sendData($request){

            try{

                $query = 'INSERT INTO `CUSTOMERS`( `cus_name`, `cus_email`) VALUES ( :firstname, :email ) ';

    
                if( ($this->_req = $this->getDb()->prepare($query)) !== false ){
        
                    if($this->_req->bindValue('firstname', $request['name']) && $this->_req->bindValue('email', $request['email'])){ 
        
                        if($this->_req->execute()) {
            
                          $res1 = $this->getDb()->lastInsertId();
            
                        }
                      }
        
                }

                $query2 = 'INSERT INTO `ORDERS`( `ord_content`, `ord_statut`, `ord_customer_fk`) VALUES ( :content, 1, '.$this->getDb()->lastInsertId().' ) ';
                if( ($this->_req = $this->getDb()->prepare($query2)) !== false ){
        
                    if($this->_req->bindValue('content', $request['message'])){ 
        
                        if($this->_req->execute()) {
            
                          $res2 = $this->getDb()->lastInsertId();
            
                        }
                      }
                      return true;
                }

                return false;
                    
            }catch(PDOException $e){
     
                throw new Exception($e->getMessage(), 0 , $e);
            }
        }
       
        public function check($request){

            try{

                $query = 'SELECT * FROM `CUSTOMERS` WHERE `cus_email` = :email';
          
                if(($this->_req = $this->getDb()->prepare($query)) !== false){
          
                    if($this->_req->bindValue('email', $request['email'])){
          
                        if($this->_req->execute()){
          
                          $answer = $this->_req->fetch(PDO::FETCH_ASSOC);
                          return $answer;
                        }
                    }
                }   
                return false;
                
            }catch(PDOException $e){
          
              throw new Exception($e->getMessage(), 1 , $e);
          
              }
        }

        public function addOrder($content, $id){

            try{
       
                $query = 'INSERT INTO `ORDERS`( `ord_content`, `ord_statut`, `ord_customer_fk`) VALUES ( :content, 1, :id ) ';
                if( ($this->_req = $this->getDb()->prepare($query)) !== false ){
        
                    if($this->_req->bindValue('content', $content['message']) && $this->_req->bindValue('id', $id['cus_id'])){ 
        
                        if($this->_req->execute()) {
            
                          $res = $this->getDb()->lastInsertId();
            
                        }
                    }

                    return true;
                }

                return false;
                    
            }catch(PDOException $e){
     
                throw new Exception($e->getMessage(), 0 , $e);
            }

        }







    }