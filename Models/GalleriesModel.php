<?php 

    class GalleriesModel extends CoreModel {

        private $_req;

        public function readOne(int $id){

            try{

                $query = 'SELECT `gal_id` AS `id`, `gal_image` AS `image`, `gal_title` AS `title`, `gal_data_lightbox` AS `data_lightbox`, `gal_data_title` AS `data_title` FROM `GALLERY` WHERE `gal_id` = :id';

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

                $query = 'SELECT `gal_id` AS `id`, `gal_image` AS `image`, `gal_title` AS `title`, `gal_data_lightbox` AS `data_lightbox`, `gal_data_title` AS `data_title` FROM `GALLERY` ORDER BY `gal_id` DESC LIMIT 9 ';

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

        public function readAllAdmin(){

            try{

                $query = 'SELECT `gal_id` AS `id`, `gal_image` AS `image`, `gal_title` AS `title`, `gal_data_lightbox` AS `data_lightbox`, `gal_data_title` AS `data_title` FROM `GALLERY` ORDER BY `gal_id` DESC';

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


        public function readAllAdminPagination(int $limit = 0, int $pagination){

            try{

                $query = 'SELECT `gal_id` AS `id`, `gal_image` AS `image`, `gal_title` AS `title`, `gal_data_lightbox` AS `data_lightbox`, `gal_data_title` AS `data_title`,(SELECT COUNT(`gal_id`)  FROM `GALLERY`) AS `nbImages` FROM `GALLERY` ORDER BY `gal_id` DESC LIMIT :limit, :pagination ';

                if(($this->_req = $this->getDb()->prepare($query)) !== false ){

                    if($this->_req->bindValue('limit', $limit, PDO::PARAM_INT) && $this->_req->bindValue('pagination', $pagination, PDO::PARAM_INT)){
                        if($this->_req->execute()){

                            $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);

                            return $datas;

                        }
                    }
                }

                return false;


            }catch(PDOException $e){

                throw new Exception($e->getMessage(), 1, $e);
            }


        }

        public function add(string $request, array $files){


            try{

                $query = 'INSERT INTO `GALLERY`( `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES ( "Mes créations", :img, "nouveautes",:title) ';

                if(($this->_req = $this->getDb()->prepare($query)) !== false){

                    if(
                        $this->_req->bindValue('img', $files['name']) 
                        && $this->_req->bindValue('title', $request) 
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


        public function delete(int $id){

            try{
      
              $query = 'DELETE FROM `GALLERY` WHERE `gal_id` = :id ';
      
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


        public function update(int $id, string $request, string $files){

            try {

                $query = 'UPDATE `GALLERY` SET `gal_image` = :img, `gal_data_title` = :title WHERE `gal_id` = :id ';     
              
                if(($req = $this->getDb()->prepare($query))!==false) {
         
                 if($req->bindValue('id', $id, PDO::PARAM_INT) && $req->bindValue('img', $files) && 
                 $req->bindValue('title', $request)) {
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