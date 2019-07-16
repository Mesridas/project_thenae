<?php

    class EventsModel extends Coremodel {

        private $_req;


        public function readOne(){

            try{

                $query = 'SELECT `eve_id` AS `id`, `eve_text` AS `text` FROM `EVENT` ORDER BY `eve_id` DESC LIMIT 0, 1 ';

                if(($this->_req = $this->getDb()->prepare($query)) !== false){

                      if($this->_req->execute()) {
          
                        $datas = $this->_req->fetch(PDO::FETCH_ASSOC);
          
                        return $datas;
          
                      }
            
          
                  }
          
                  return false;
                
            }catch(PDOException $e){

                throw new Exception($e->getMessage(),1, $e);

            }
        
        }

        public function readAll(){

            try{

                $query = 'SELECT `eve_id` AS `id`, `eve_text` AS `text` FROM `EVENT`';

                if(($this->_req = $this->getDb()->prepare($query)) !== false ){

                    if($this->_req->execute()){

                        $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);

                        return $datas;

                    }

                }

                return false;

            }catch(PDOException $e){

                throw new Exception($e->getMessage(), 1, $e);
            }


        }


        public function add($request){

            try{

                $query = 'INSERT INTO `EVENT`(`eve_text`) VALUES ( :content ) ';

                if(($this->_req = $this->getDb()->prepare($query)) !== false){

                    if(
                        $this->_req->bindValue('content', $request['desc'])){

                        if($this->_req->execute()) {

                            $res = $this->getDb()->lastInsertId();
                            return $res;
            
                        }
                    }
                }

                return false;

            }catch(PDOException $e){

                throw new Exception($e->getMessage(), 1 , $e);
        
            }

        }

        public function delete($id){

            try{
      
              $query = 'DELETE FROM `EVENT` WHERE `eve_id` = :id ';
      
              if(($this->_req = $this->getDb()->prepare($query)) !== false){
      
                if($this->_req->bindValue('id', $id, PDO::PARAM_INT) ){
      
                  if($this->_req->execute()) {
      
                    $res = $this->_req->rowCount();
                    return $res;
      
                  }
                }
      
              }
      
              return false;
      
            }catch(PDOException $e){
      
              throw new Exception($e->getMessage(), 1 , $e);
      
            }
      
        }
      



    }