<?php

class AdminController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new AdminModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e);

        }
    }
        
    public function login(){
        self::landingConnection();
    }

    public function check($post){
        self::userConnect($post);
    }

    public function dashboard(){
        self::mainMenu();
    }

    public function manageSection(){
        self::section();
    
    }

    public function editSection($id){
        self::edit($id);
    }

    private function landingConnection(){
        try{

            $this->_model = new LoginModel;
            
        }catch(PDOException $e){
      
            throw new Exception($e->getMessage(), 0 , $e);
      
        }
        #GERER AFFICHAGE MESSAGE ERREUR CONNECTION        
        // if(isset($_GET['_err'])){

        //     switch($_GET['_err']){
        //         case '403' :
        //         echo '<div class="notification is-warning">Vous devez vous connecter ! </div>';
        //         break;
        //         case 'empty':
        //         if(isset($_GET['field'])){
        //                 switch($_GET['field']){
        //                     case 'login' :
        //                     echo '<div class="notification is-warning">Vous devez saisir un login ! </div>';
        //                     break;
        //                     case 'pwd' :
        //                     echo '<div class="notification is-warning">Vous devez saisir un mot de passe ! </div>';
        //                     break;
        //                     case 'all' :
        //                     echo '<div class="notification is-warning">Vous devez saisir tous les champs ! </div>';
        //                     break;
        //                 }
        //         }
        //         break;
        //         case 'connect':
        //         echo '<div class="notification is-warning">Mauvais identifiant/mot de passe !</div>';
        //         break;
        //     }
        // }

        include './Views/Login/index.php';

    }

    private function userConnect($post){
        try{

            $this->_model = new LoginModel;
            
          }catch(PDOException $e){
      
            throw Exception($e->getMessage(), 0 , $e);
      
        }
        extract($post);

    // if(empty($_SESSION['thenae']['user'])){

            if(!empty($login) && !empty($password)){

                try{

                    $userCheck = $this->_model->connexion($login, $password);

                    if(($userCheck) !== false){
                    #Je récupére les info dont l'id du connecté
                        $user = new Login($userCheck);


                        $_SESSION['thenae']['user'] = serialize($user);

                        if($user){
                            // header('Location: ./index.php?ctrl=admin&action=dashboard');
                            include './Views/Login/welcome.php';
                        }else{
                        header('Location: ./index.php?ctrl=admin&action=login');
                        exit;
                        }
                    }   

                }catch(PDOException $e){

                    throw new Exception($e->getMessage(), 0 , $e);
                }
            }else{

                header('Location: ./index.php?ctrl=admin&action=login');
                
                exit;
                //  include './Views/Login/index.php';
            }        
        // }else{
        // include './Views/Login/welcome.php';
        // }



    }

    private function mainMenu(){

        // session_start();
    
        $page = 'Dashboard';
    
        # VERIF user connecté
        if(empty($_SESSION[APP_TAG]['connected'])) {
        header('Location:../login.php?_err=403');
        exit;
        }else{
        include './Views/Login/welcome.php';

        }
    }

    private function section(){

        try{

            $this->_model = new SectionsModel;
            $datas = $this->_model->readAll();
            $sections = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                  $sections[] = new Sections($data);
                }
            }

            include './Views/Section/main.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }

    }

    private function edit($id){

        try{
            $this->_model = new SectionsModel;
            $datas = $this->_model->readOne($id);

            if(count($datas) > 0 ){
            $section = new Sections($datas);
            }
            
            include './Views/Section/edit.php';

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }
        
    }








}
