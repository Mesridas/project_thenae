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

  }


############ DECONNEXION ##########

if(isset($_GET['logout'])){
    // session_destroy();
    session_unset();
}

############ ROUTEUR ##############

#Condition pour afficher le site et l'accès à l'espace admin + envoi commande + sa connexion et empêcher tous les utilisateurs non connecté d'acceder au panel admin
if( ($ctrl === 'HomeController' && $method === 'index') || ($ctrl === 'AdminController' && $method === 'login') || ($ctrl === 'AdminController' && $method ==='check') || ($ctrl === 'OrderController' && $method ==='store')){

  try {
    
    if(class_exists($ctrl)) {
      $controller = new $ctrl;

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

        if(method_exists($controller, $method)) {

          if(!empty($_GET['id'])) {
            $controller->$method($_GET['id']);

            #Pour gérer le changement d'état de la commande dans l'AJAX
            if(!empty($_GET['params'])){
              $controller->$method($_GET['params'], $_GET['id']); 
            }   

          }else if(!empty($_GET['params'])) {

            echo $controller->$method($_GET['params']); 


                 
            }else{

            $controller->$method();
          }

        }else{
          header('Location: 2');
          exit;
        }

      }

    } else {
      header('Location: 3');
      exit;
    }
  } catch(Exception $e) {
    
    header('Location: 500');
    exit;
  }

}else{

      # Check  if user already connected in session and give him access to the page
      if(empty($_SESSION[APP_TAG]['connected'])){

          header('Location:./?_err=403');
          exit;
      }else{

        try {
    
          if(class_exists($ctrl)) {
            $controller = new $ctrl;
      
            if(!empty($_POST)) {
      
              if(method_exists($controller, $method)) {
      
                if(!empty($_GET['id'])) {
                  
                    $controller->$method($_GET['id'], $_POST); 
                         
                }else{
                  $controller->$method($_POST);
                }
      
              }else{
                header('Location: 1');
                exit;
              }
      
            } else {

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

        } catch(Exception $e) {
          
          header('Location: 500');
          exit;
        }
      }  

}




// #############FIN ROUTEUR##########

if (!$is_ajax) {
  require 'vendor/inc/footer.php'; 
}