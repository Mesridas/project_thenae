<?php
session_start();

  require_once 'config/ini.php';
  require_once 'vendor/autoload.php';
  require 'vendor/inc/header.php';
  // require 'vendor/inc/navbar.php';    
   

  

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
  $ctrl = 'HomeController';
  if(isset($_GET['ctrl'])) {
    $ctrl = ucfirst(strtolower($_GET['ctrl'])) . 'Controller';
  }

  $method = 'index';
  if(isset($_GET['action'])) {
    $method = $_GET['action'];
  }

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


// require 'vendor/inc/footer.php'; 