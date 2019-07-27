<?php

class CategorieController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new CategoriesModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e); 
        }

    }


    public function index(){
        // try{

        //     $datas = $this->_model->readAll();
        //     $categories = [];


        //     if(count($datas) > 0 ){

        //         foreach ($datas as $data) {
        //         $categories[] = new Gategories($data);
        //         }

        //     }

        // }catch(PDOException $e){
 
        // throw new Exception($e->getMessage(), 0 , $e);
        // }
    }

    public function add(array $request){

        if(!empty($request['title_cat']) && is_string($request['title_cat'])){

            $request['title_cat'] = htmlentities($request['title_cat']);

            $idCat = $this->_model->add($request['title_cat']);

            #On va créer un dossier avec la catégorie de l'id si le dossier n'existe pas déjà
            if($idCat != false){

                $filename = './img/carousels/visible/'.$idCat ;
                $filedetails = './img/carousels/invisible/'.$idCat ;

                if(file_exists($filename) != true){
                    mkdir($filename, 0777);
                    mkdir($filedetails, 0777);
                }
            }

        }else{

                $erreur = "Veuillez rentrer un titre";
              
        }

        if($idCat){
            header('Location: ./index.php?ctrl=admin&action=manageCategorie&addCategorie=success');
        }else{
            header('Location: ./index.php?ctrl=admin&action=manageCategorie&addCategorie=error');
        }


    }

    

    public function delete(int $id){

        
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

    public function edit(int $id){

        $page = 'categorie';

            try{

                $datas = $this->_model->readOne($id);

                if(count($datas) > 0 ){
                $categorie = new Categories($datas);
                }
                
                include './Views/Categorie/edit.php';

            }catch(PDOException $e){
                throw new Exception($e->getMessage(), 0 , $e);
            }         

    }
    
    public function update(int $id, array $request){
       
        try{

            if((empty($request['title_cat']) || is_null($request['title_cat'])) && is_string($request['title_cat'])){

                $datas = $this->_model->readOne($id);

                if(count($datas) > 0 ){
                $categorie = new Categories($datas);
                }

                $request['title_cat']= $categorie->getName();
            }


            $edit = $this->_model->update($id, $request);
            
            if($edit){
                header('Location: ./index.php?ctrl=admin&action=manageCategorie&editCategorie=success');
            }else{
                header('Location: ./index.php?ctrl=admin&action=manageCategorie&editCategorie=error');
            }

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }

    }



}