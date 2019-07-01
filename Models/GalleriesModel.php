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

        public function add($request, $files){


            try{

                $query = 'INSERT INTO `GALLERY`( `gal_title`, `gal_image`, `gal_data_lightbox`, `gal_data_title`) VALUES ( "Mes créations", :img, "nouveautes",:title) ';

                if(($this->_req = $this->getDb()->prepare($query)) !== false){

                    if(
                        $this->_req->bindValue('img', $files['name']) 
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








        
    }