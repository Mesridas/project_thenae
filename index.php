<?php
session_start();

############ INFOS ROUTEUR ##############
$ctrl = 'HomeController';
if(isset($_GET['ctrl'])) {
  $ctrl = ucfirst(strtolower($_GET['ctrl'])) . 'Controller';
}

$method = 'index';
if(isset($_GET['action'])) {
  $method = $_GET['action'];
}

// Permet de ne pas afficher toute la page html mais juste ce qui est nécessaire pour la requête Ajax
$is_ajax = false;
if(isset($_GET['is_ajax']) || isset($_POST['is_ajax'])) {
  $is_ajax = true;
}

  require_once 'config/ini.php';
  require_once 'vendor/autoload.php';

  if (!$is_ajax) {
    require 'vendor/inc/header.php';

    if(isset($ctrl) == 'HomeController'){
      // require 'vendor/inc/navbar.php';  
    }
  }
    
   

  

############ MESSAGES #############

// if(isset($_GET['contact'])){

//   $msg = $_GET['contact'];
//   switch ($msg) {
//         case 'success':
//              echo " <div class=\"alert alert-success\" role=\"alert\">
//                        Votre message à bien été envoyé, vous recevrez une réponse par email une fois votre demande traité !
//                     </div>"; 
//           break;
//         case 'error':
//              echo " <div class=\"alert alert-danger\" role=\"alert\">
//                        Il y a eu une erreur, veuillez réessayer votre demande. Merci
//                     </div>"; 
//           break;
//   }
    
//   }

############ ROUTEUR ##############
  // try {
    
    if(class_exists($ctrl)) {
      $controller = new $ctrl;

      # si je reçois un formulaire (creation[data] ou mise a jour[id+data])
      if(!empty($_POST)) {

        if(method_exists($controller, $method)) {

          if(!empty($_GET['id'])) {
            
              $controller->$method($_GET['id'], $_POST); 
                   
          } else {
            $controller->$method($_POST);
          }

        } else {
          header('Location: 1');
          exit;
        }

      } else {
        # sinon je gere index, show , delete
        if(method_exists($controller, $method)) {

          if(!empty($_GET['id'])) {
            $controller->$method($_GET['id']);

            #Pour gérer le changement d'état de la commande dans l'AJAX
            if(!empty($_GET['params'])){
              $controller->$method($_GET['params'], $_GET['id']); 
            }   

          } else if(!empty($_GET['params'])) {

            echo $controller->$method($_GET['params']); 


                 
            } else {
            $controller->$method();
          }

        } else {
          header('Location: 2');
          exit;
        }
      }
    } else {
      header('Location: 3');
      exit;
    }
  // } catch(Exception $e) {
    
  //   header('Location: 500');
  //   exit;
  // }


// #############FIN ROUTEUR##########

if (!$is_ajax) {
  require 'vendor/inc/footer.php'; 
}