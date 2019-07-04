<?php 

    class CarouselsModel extends CoreModel {

        private $_req;

        public function readOne($id){
            try{

                       $query = 'SELECT `car_id` AS `id`, `car_image` AS `image`, `car_title` AS `title`, `car_location` AS `location`, `car_type_img` AS `type_img`, `car_categorie_id` AS `categorie_id`, `cat_id`, `cat_name` AS `categorie_name`
                FROM `CAROUSEL` 
                LEFT JOIN `CATEGORIES` ON `car_categorie_id` = cat_id
                WHERE `car_id` = :id';      

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

                $query = 'SELECT `car_id` AS `id`, `car_image` AS `image`, `car_title` AS `title`, `car_location` AS `location`, `car_type_img` AS `type_img`, `car_categorie_id` AS `categorie_id`, `cat_id`, `cat_name` AS `categorie_name`
                FROM `CAROUSEL` 
                LEFT JOIN `CATEGORIES` ON `car_categorie_id` = cat_id
                WHERE `car_type_img` = 1 
                ORDER BY `car_id` ASC';

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

        public function readDetails($lightbox){

            try{
// LIRE LA OU LE LOCATION EST LE MEME MAIS EXCEPT LA 1
                $query = 'SELECT `car_id` AS `id`, `car_image` AS `image`, `car_title` AS `title`, `car_location` AS `location`, `car_type_img` AS `type_img`, `car_categorie_id` AS `categorie_id`, `cat_id`, `cat_name` AS `categorie_name`
                FROM `CAROUSEL` 
                LEFT JOIN `CATEGORIES` ON `car_categorie_id` = cat_id
                WHERE `car_location` = :lightbox
                ORDER BY `car_id` ASC';

                if(($this->_req = $this->getDb()->prepare($query)) !== false ){

                    if($this->_req->bindValue('lightbox', $lightbox)){

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

        public function readAllFromCat($id){

            try{

                $query = 'SELECT `car_id` AS `id`, `car_image` AS `image`, `car_title` AS `title`, `car_location` AS `location`, `car_type_img` AS `type_img`, `car_categorie_id` AS `categorie_id`, `cat_id`, `cat_name` AS `categorie_name`
                FROM `CAROUSEL` 
                LEFT JOIN `CATEGORIES` ON `car_categorie_id` = cat_id
                WHERE `car_type_img` = 1 AND `car_categorie_id` = :id_cat
                ORDER BY `car_id` ASC';

                if(($this->_req = $this->getDb()->prepare($query)) !== false ){


                    if($this->_req->bindValue('id_cat', $id)){

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

        public function readInvisible(){

            try{

                $query = 'SELECT `car_id` AS `id`, `car_image` AS `image`, `car_title` AS `title`, `car_location` AS `location`, `car_type_img` AS `type_img`, `car_categorie_id` AS `categorie_id`, `cat_id`, `cat_name` AS `categorie_name`
                FROM `CAROUSEL` 
                LEFT JOIN `CATEGORIES` ON `car_categorie_id` = cat_id
                WHERE `car_type_img` = 0 ';

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

                $query = 'INSERT INTO `CAROUSEL`( `car_title`, `car_location`, `car_type_img`, `car_image`, `car_categorie_id`) VALUES ( :description, :location, 1, :img, :id_cat) ';

                if(($this->_req = $this->getDb()->prepare($query)) !== false){

                    if(
                        $this->_req->bindValue('img', $files['name']) 
                        && $this->_req->bindValue('description', $request['desc']) 
                        && $this->_req->bindValue('location', $request['location']) 
                        && $this->_req->bindValue('id_cat', $request['cat_number']) 
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


        public function delete($id){

            try{
      
              $query = 'DELETE FROM `CAROUSEL` WHERE `car_id` = :id ';
      
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