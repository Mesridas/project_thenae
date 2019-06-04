<?php
  require_once 'config/ini.php';
  require_once 'vendor/autoload.php';

  require 'vendor/inc/header.php';
  require 'vendor/inc/navbar.php';



############ ROUTEUR ##############

#Landing
  $ctrl = 'LandingController';
  if(isset($_GET['ctrl'])) {
    $ctrl = ucfirst(strtolower($_GET['ctrl'])) . 'Controller';
  }

  $method = 'index';
  if(isset($_GET['action'])) {
    $method = $_GET['action'];
  }

  try {
    
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
  } catch(Exception $e) {
    header('Location:500');
    exit;
  }

#Section
  $ctrl = 'SectionController';
  if(isset($_GET['ctrl'])) {
    $ctrl = ucfirst(strtolower($_GET['ctrl'])) . 'Controller';
  }

  $method = 'index';
  if(isset($_GET['action'])) {
    $method = $_GET['action'];
  }

  try {
    
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
  } catch(Exception $e) {
    header('Location:500');
    exit;
  }

#Gallery 
  $ctrl = 'GalleryController';
  if(isset($_GET['ctrl'])) {
    $ctrl = ucfirst(strtolower($_GET['ctrl'])) . 'Controller';
  }

  $method = 'index';
  if(isset($_GET['action'])) {
    $method = $_GET['action'];
  }

  try {
    
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
  } catch(Exception $e) {
    header('Location:500');
    exit;
  }




// #############FIN ROUTEUR##########


require 'vendor/inc/footer.php'; 