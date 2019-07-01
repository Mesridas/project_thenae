1
<?php

class LoginController {

  private $_model;

  public function __construct(){

    try{

      $this->_model = new LoginModel;
      
    }catch(PDOException $e){

      throw Exception($e->getMessage(), 0 , $e);

    }
  }

    public function index(){

        #Affichage des erreurs de connexions/créations de compte :



      if(isset($_GET['_err'])){

        switch($_GET['_err']){
            case '403' :
            echo '<div class="notification is-warning">Vous devez vous connecter ! </div>';
            break;
            case 'empty':
            if(isset($_GET['field'])){
                switch($_GET['field']){
                    case 'login' :
                    echo '<div class="notification is-warning">Vous devez saisir un login ! </div>';
                    break;
                    case 'pwd' :
                    echo '<div class="notification is-warning">Vous devez saisir un mot de passe ! </div>';
                    break;
                    case 'all' :
                    echo '<div class="notification is-warning">Vous devez saisir tous les champs ! </div>';
                    break;
                }
            }
            break;
            case 'connect':
            echo '<div class="notification is-warning">Mauvais identifiant/mot de passe !</div>';
            break;
        }
        }

        include './Views/Login/index.php';

    }

   public function welcome(){
    
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

  // public function userConnect($post){

  // extract($post);

  //     if(empty($_SESSION['thenae']['user'])){

  //       if(!empty($login) && !empty($password)) {

  //         try{

  //           $userCheck = $this->_model->connexion($login, $password);

  //           if(($userCheck) !== false){
  //           #Je récupére les info dont l'id du connecté
  //           $info = new Login($userCheck);

  //           #j'instancie mon objet utilisateur pour avoir toutes ses infos 
  //           $usermodel = new UsersModel;
  //           #Je lui passe en paramètre son id (pour récupèrer ses infos)
  //           $userDb = $usermodel->readOne($info->getId());
  //           $user = new Users($userDb);


  //           $_SESSION['thenae']['user'] = serialize($user);

  //           if($userDb){
  //               include './Views/Login/welcome.php';
  //             }

  //           }else{
  //             header('Location: ./index.php?ctrl=login&action=index');
  //             exit;

  //           }

  //         }catch(PDOException $e){

  //         throw new Exception($e->getMessage(), 0 , $e);

  //         }  

  //     }else{
  //           header('Location: ./index.php?ctrl=login&action=index');
             
  //           exit;
  //           //  include './Views/Login/index.php';
  //         }        
  //     }else{
  //       include './Views/Login/welcome.php';
  //     }


  
  // }




}