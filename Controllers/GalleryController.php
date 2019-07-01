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

    public function add($request){

        if(!empty($_FILES) && !empty($request)){

 
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
                $idSection = $this->_model->add($request, $files);
            }else{

                $erreur = "Votre fichier n'est pas une image";
              
            }
      

            // if($idSection){
            //     header('Location: ./index.php?ctrl=admin&action=manageSection&addsection=success');
            // }else{
            //     header('Location: ./index.php?ctrl=admin&action=manageSection&addsection=error');
            // }
        }
    }


    public function update($id, $request){
       
        try{
            $files = $_FILES['mon_image_galerie'];

            if(empty($request['title'])){

                $datas = $this->_model->readOne($id);

                if(count($datas) > 0 ){
                $section = new Sections($datas);
                }

                $request['title']= $section->getTitle();
            }

            if(empty($files['mon_image_galerie'])){

                $datas = $this->_model->readOne($id);

                if(count($datas) > 0 ){
                $section = new Sections($datas);
                }

                $files['name']= $section->getImage();
            }else{

                // var_dump($files['error']);
                $files['name'] = basename($files['name']);
                $ext = strtolower(substr(strrchr($files['name'], '.'), 1) );
                $allow_ext = array( 'jpg' , 'jpeg' , 'gif' , 'png'); 
               
                // #Je stocke l'image dans le dossier
                if(in_array($ext, $allow_ext)){
                    $folder = "./img/galeries";
                    $test = move_uploaded_file($files['tmp_name'], $folder.'/'.$files['name']);
    
                   #Je l'envoi en bdd
                    $idSection = $this->_model->add($request, $files);
                }
            }

            $edit = $this->_model->update($id, $request,$files['name']);
            

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }

    }




}