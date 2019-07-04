<?php

class CarouselController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new CarouselsModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e); 
        }

    }


    public function index(){
        try{

            $datas = $this->_model->readAll();
            $carousels = [];
            // echo '<pre>'; var_dump($datas); '</pre>';
            if(count($datas) > 0 ){
                #Je crée un tableau qui contiendra un tableau pour chaque titre (catégorie de carousel) qui lui même contient toutes les images associés à ce titre (catégorie).
                // foreach ($datas as $data) {

                // $carousels[$data['title_carousel']][] = new Carousels($data);
               
                // }

            }

        // include './Views/Carousel/index.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }
    }


    #Fonction pour ajouter une image principale pour un carousel
    public function add($request){


        #Fonction qui génére un id unique
        function uniqidReal($lenght = 13) {

            if (function_exists("random_bytes")) {
                $bytes = random_bytes(ceil($lenght / 2));
            } elseif (function_exists("openssl_random_pseudo_bytes")) {
                $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
            } else {
                throw new Exception("no cryptographically secure random function available");
            }
            return substr(bin2hex($bytes), 0, $lenght);
        }

        try{        
            
            if(!empty($_FILES) && !empty($request)){
    
                $files = $_FILES['mon_image_principale'];
                $files['name'] = basename($files['name']);
                $ext = strtolower(substr(strrchr($files['name'], '.'), 1) );
                $allow_ext = array( 'jpg' , 'jpeg' , 'gif' , 'png'); 
            
                // #Je stocke l'image dans le dossier
                if(in_array($ext, $allow_ext)){
                    $folder = './img/carousels/visible/'.$request['cat_number'];
                    // $test = move_uploaded_file($files['tmp_name'], $folder.'/'.$request['cat_number'].$files['name']);
                    $test = move_uploaded_file($files['tmp_name'], $folder.'/'.$files['name']);


                #On génère une location (data-lightbox) unique pour l'image principale (qu'on reprendra pour les images détails)
                $request['location'] = uniqidReal();


                #Je l'envoi en bdd
                    $idCarousel = $this->_model->add($request, $files);
                }else{

                    $erreur = "Votre fichier n'est pas une image";
                
                }

                if($idCarousel){
                        header('Location: ./index.php?ctrl=admin&action=manageCarousel&id='.$request['cat_number'].'&addcar=success');
                        }else{
                        header('Location: ./index.php?ctrl=admin&action=manageCarousel&id='.$request['cat_number'].'&addcar=error');
                        }  
            }

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
            
        }

    }

    

    #Function pour voir les images rattachés à l'image principale
    public function manageMe($id){

        try{
            $this->_model = new CarouselsModel;
            $datas = $this->_model->readOne($id);

            if(count($datas) > 0 ){
            $carousel = new Carousels($datas);
            }
            
            include './Views/Carousel/edit.php';

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }

    }





    #Function qui supprime l'image principale
    public function deleteMe($id){

        try{

            $del = $this->_model->delete($id);
    
            if($del){
            header('Location: ./index.php?ctrl=admin&action=manageCategorie');
            }else{
            header('Location: ./index.php?ctrl=admin&action=manageCategorie');
            }            

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }
    }



}