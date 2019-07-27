<?php

class GalleryController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new GalleriesModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e); 
        }

    }


    public function index(){
        try{

            $datas = $this->_model->readAll();
            $galleries = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                $galleries[] = new Galleries($data);
                }
            }

        include './Views/Gallery/index.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }
    }

    public function add(array $request){

        if(!empty($_FILES) && !empty($request['title_gal'])){

 
            $files = $_FILES['mon_image_galerie'];
            // var_dump($files['error']);
            $files['name'] = basename($files['name']);
            $ext = strtolower(substr(strrchr($files['name'], '.'), 1) );
            $allow_ext = array( 'jpg' , 'jpeg' , 'gif' , 'png'); 
           
            // #Je stocke l'image dans le dossier
            if(in_array($ext, $allow_ext)){
                $folder = "./img/galeries";
                $test = move_uploaded_file($files['tmp_name'], $folder.'/'.$files['name']);

               #Je l'envoi en bdd
                $idSection = $this->_model->add($request['title_gal'], $files);
            }else{

                $erreur = "Votre fichier n'est pas une image";
              
            }
      
            if($idSection){
                header('Location: ./index.php?ctrl=admin&action=manageGalerie&addGalerie=success');
            }else{
                header('Location: ./index.php?ctrl=admin&action=manageGalerie&addGalerie=error');
            }
        }
        
    }


    public function update(int $id, array $request){
       
        try{
            $files = $_FILES['mon_image_galerie_edit'];
            
            if(empty($request['title_gal'])){

                $datas = $this->_model->readOne($id);

                if(count($datas) > 0 ){
                $galerie = new Galleries($datas);
                }

                $request['title_gal']= $galerie->getData_title();
            }

            if(empty($files['name']) && $files['name'] !== '0'){

                $datas = $this->_model->readOne($id);

                if(count($datas) > 0 ){
                $galerie = new Galleries($datas);
                }

                $files['name']= $galerie->getImage();
            }else{

                $files['name'] = basename($files['name']);
                $ext = strtolower(substr(strrchr($files['name'], '.'), 1) );
                $allow_ext = array( 'jpg' , 'jpeg' , 'gif' , 'png'); 
               
                // #Je stocke l'image dans le dossier
                if(in_array($ext, $allow_ext)){
                    $folder = "./img/galeries";
                    $test = move_uploaded_file($files['tmp_name'], $folder.'/'.$files['name']);
    
                }
            }

            $edit = $this->_model->update($id, $request,$files['name']);
            
            if($edit){
                header('Location: ./index.php?ctrl=admin&action=manageGalerie&editGalerie=success');
            }else{
                header('Location: ./index.php?ctrl=admin&action=manageGalerie&editGalerie=error');
            }

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }

    }




}