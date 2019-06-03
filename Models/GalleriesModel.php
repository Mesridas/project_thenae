<?php 

    class GalleriesModel extends CoreModel {

        private $_req;

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









        
    }