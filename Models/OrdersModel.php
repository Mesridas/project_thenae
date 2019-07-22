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


        public function readOrdersby($status){

            try{

                $query = 'SELECT `ord_id` AS `id`, `ord_content` AS `content`, `ord_statut` AS `statut`, `ord_customer_fk` AS `customer_id`, `cus_name` AS `customer_name`, `cus_email` AS `customer_email`, `cus_id` 
                FROM `ORDERS`
                LEFT JOIN `CUSTOMERS` ON `ord_customer_fk` = `cus_id`
                WHERE `ord_statut` = :state ORDER BY `ord_id` DESC';

                    if(($this->_req = $this->getDb()->prepare($query)) !== false){

                        if($this->_req->bindValue('state', $status, PDO::PARAM_INT)){

                            if($this->_req->execute()) {

                                $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);

                                return $datas;

                            }
                        }

                    }

                    return false;


            }catch(PDOException $e){

                throw new Exception($e->getMessage(), 0, $e);
            }
        }

        public function readOrderFrom($order_id){

            try{

                $query = 'SELECT `ord_id` AS `id`, `ord_content` AS `content`, `ord_statut` AS `statut`, `ord_customer_fk` AS `customer_id`, `cus_name` AS `customer_name`, `cus_email` AS `customer_email`, `cus_id` 
                FROM `ORDERS`
                LEFT JOIN `CUSTOMERS` ON `ord_customer_fk` = `cus_id`
                WHERE `ord_id` = :id';

                    if(($this->_req = $this->getDb()->prepare($query)) !== false){

                        if($this->_req->bindValue('id', $order_id, PDO::PARAM_INT)){

                            if($this->_req->execute()) {

                                $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);

                                return $datas;

                            }
                        }

                    }

                    return false;


            }catch(PDOException $e){

                throw new Exception($e->getMessage(), 0, $e);
            }
        }

        public function readMessageFrom($idOrder){

            try{

                $query = 'SELECT `ord_content` AS `content`
                FROM `ORDERS`
                WHERE `ord_id` = :id';

                    if(($this->_req = $this->getDb()->prepare($query)) !== false){

                        if($this->_req->bindValue('id', $idOrder, PDO::PARAM_INT)){

                            if($this->_req->execute()) {

                                $data = $this->_req->fetch(PDO::FETCH_ASSOC);

                                return $data;

                            }
                        }

                    }

                    return false;


            }catch(PDOException $e){

                throw new Exception($e->getMessage(), 0, $e);
            }
        }



        public function update($params, $id){

            try {

                $query = 'UPDATE `ORDERS` SET `ord_statut` = :newstate WHERE `ord_id` = :id ';     
              
                if(($req = $this->getDb()->prepare($query))!==false) {
         
                 if($req->bindValue('id', $id, PDO::PARAM_INT) && 
                 $req->bindValue('newstate', $params)) {
                       if($req->execute()) {
                         $res = $req->rowCount();
                         $req->closeCursor();
                         return $res;
                       }
                     }
                   }
                   return false;

            } catch(PDOException $e) {
                 throw new Exception('Can not read from the database', 10, $e);
            } 
        
        }

        public function delete($id){

            try {

                $query = 'DELETE FROM `ORDERS` WHERE `ord_id` = :id ';    
              
                if(($req = $this->getDb()->prepare($query))!==false) {
         
                    if($req->bindValue('id', $id, PDO::PARAM_INT)){  
                    
                        if($req->execute()) {
                            $res = $req->rowCount();
                            $req->closeCursor();
                            return $res;
                        }
                    }
                }
                
                return false;

            } catch(PDOException $e) {
                 throw new Exception('Can not read from the database', 10, $e);
            } 
        
        }
       


    }