<?php 

    class CategoriesModel extends CoreModel {

        private $_req;

        public function readOne(int $id){

            try{

                $query = 'SELECT `cat_id` AS `id`, `cat_name` AS `name` FROM `CATEGORIES` WHERE `cat_id` = :id';

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

                $query = 'SELECT `cat_id` AS `id`, `cat_name` AS `name`
                FROM `CATEGORIES` 
                ORDER BY `cat_id` ASC';

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
       

        public function add(string $request){


            try{

                $query = 'INSERT INTO `CATEGORIES` (`cat_name`) VALUES ( :title ) ';

                if(($this->_req = $this->getDb()->prepare($query)) !== false){

                    if( $this->_req->bindValue('title', $request)){

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

        public function delete(int $id){

            try{
      
              $query = 'DELETE FROM `CATEGORIES` WHERE `cat_id` = :id ';
      
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


        public function update(int $id, array $request){

            try {

                $query = 'UPDATE `CATEGORIES` SET `cat_name` = :title WHERE `cat_id` = :id ';     
              
                if(($req = $this->getDb()->prepare($query))!==false) {
         
                 if($req->bindValue('id', $id, PDO::PARAM_INT) && 
                 $req->bindValue('title', $request['title_cat'])) {
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