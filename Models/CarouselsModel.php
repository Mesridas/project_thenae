<?php 

    class CarouselsModel extends CoreModel {

        private $_req;

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









        
    }