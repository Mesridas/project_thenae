<?php

    class SectionsModel extends Coremodel {

        private $_req;


        #method which reads one asked section
        public function readOne($id){

            try{

                $query = 'SELECT `sec_id` AS `id`, `sec_image` AS `image`, `sec_text` AS `text`, `sec_title` AS `title` FROM `SECTION` WHERE `sec_id` = :id';

                if(($this->_req = $this->getDb()->prepare($query)) !== false){

                    if($this->_req->bindValue('id', $id, PDO::PARAM_INT)){
          
                      if($this->_req->execute()) {
          
                        $datas = $this->_req->fetch(PDO::FETCH_ASSOC);
          
                        return $datas;
          
                      }
                    }
          
                  }
          
                  return false;
                
            }catch(PDOException $e){

                throw new Exception($e->getMessage(),1, $e);

            }
        
        }

        public function readAll(){

            try{

                $query = 'SELECT `sec_id` AS `id`, `sec_image` AS `image`, `sec_text` AS `text`, `sec_title` AS `title` FROM `SECTION`';

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


        public function add($request, $files){


            try{

                $query = 'INSERT INTO `SECTION`( `sec_image`, `sec_text`, `sec_title`) VALUES ( :img, :content, :title) ';

                if(($this->_req = $this->getDb()->prepare($query)) !== false){

                    if(
                        $this->_req->bindValue('img', $files['name']) 
                        && $this->_req->bindValue('content', $request['desc']) 
                        && $this->_req->bindValue('title', $request['title']) 
                    ){

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

        public function update($id, $request,$files){

            try {

                $query = 'UPDATE `SECTION` SET `sec_image` = :img, `sec_text` = :txt, `sec_title` = :title WHERE `sec_id` = :id ';     
              
                if(($req = $this->getDb()->prepare($query))!==false) {
         
                 if($req->bindValue('id', $id, PDO::PARAM_INT) && $req->bindValue('img', $files) && $req->bindValue('txt', $request['desc']) && 
                 $req->bindValue('title', $request['title'])) {
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

            try{
      
              $query = 'DELETE FROM `SECTION` WHERE `sec_id` = :id ';
      
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