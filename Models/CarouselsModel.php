<?php 

    class CarouselsModel extends CoreModel {

        private $_req;

        public function readVisible(){

            try{

                // $query = 'SELECT `car_id` AS `id`, `car_image` AS `image`, `car_title` AS `title`, `car_title_carousel` AS `title_carousel`, `car_location` AS `location`, `car_type_img` AS `type_img` FROM `CAROUSEL` WHERE `car_location` = 1  ORDER BY `gal_id` DESC LIMIT 12 ';
                $query = 'SELECT `car_id` AS `id`, `car_title_carousel` AS `title_carousel`, `car_title` AS `title`, `car_location` AS `location`, `car_type_img` AS `type_img`, `car_image` AS `image` FROM `CAROUSEL` WHERE `car_type_img` = 1 AND `car_title_carousel` = ":" ORDER BY `car_id` LIMIT 12 ';


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

        public function readInvisible(){

            try{

                $query = 'SELECT `car_id` AS `id`, `car_image` AS `image`, `car_title` AS `title`, `car_title_carousel` AS `title_carousel`, `car_location` AS `location`, `car_type_img` AS `type_img` FROM `CAROUSEL` WHERE `car_location` = 0  ORDER BY `gal_id` DESC LIMIT 12 ';

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