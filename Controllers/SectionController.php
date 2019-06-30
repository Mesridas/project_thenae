<?php

class SectionController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new SectionsModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e);

        }
    }

    public function index(){
        try{

            $datas = $this->_model->readAll();
            $sections = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                $sections[] = new Sections($data);
                }
            }

        include './Views/Section/index.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }
    }

    public function add($request){

        if(!empty($_FILES) && !empty($request)){

 
            $files = $_FILES['mon_image'];
            // var_dump($files['error']);
            $files['name'] = basename($files['name']);
            $ext = strtolower(substr(strrchr($files['name'], '.'), 1) );
            $allow_ext = array( 'jpg' , 'jpeg' , 'gif' , 'png'); 
           
            // #Je stocke l'image dans le dossier
            if(in_array($ext, $allow_ext)){
                $folder = "./img/sections";
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
    
    public function edit($id){
 
        try{
            
            $datas = $this->_model->readOne($id);

            if(count($datas) > 0 ){
            $section = new Sections($datas);
            }
            
            include './Views/Section/edit.php';

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }
    }

    public function update($id, $request){
       
        try{
            
            $datas = $this->_model->readOne($id);

            if(count($datas) > 0 ){
            $section = new Sections($datas);
            }

            // if(empty($request['title'])){
            //     $request['title']= $section->getTitle();
            // }
            // if(empty($request['desc'])){
            //     $request['desc']= $section->getText();
            // }
            // if(empty($request['mon_image'])){
            //     $request['mon_image']= $section->getImage();
            // }

            $edit = $this->_model->update($id, $request);
            
            

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }

    }

    public function delete($id){

        try{

            $del = $this->_model->delete($id);
    
            if($del){
            header('Location: ./index.php?ctrl=admin&action=manageSection');
            }else{
            header('Location: ./index.php?ctrl=admin&action=manageSection');
            }            

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }
    }


}