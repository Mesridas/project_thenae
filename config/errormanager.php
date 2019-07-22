<?php 
############ MESSAGES #############

if(isset($_GET['contact'])){

  $msg = $_GET['contact'];
  switch ($msg) {
        case 'success':
             echo " <div class=\"alert alert-success errorMsg\" role=\"alert\">
                       Votre message à bien été envoyé, vous recevrez une réponse par email une fois votre demande traité !
                    </div>"; 
          break;
        case 'error':
             echo " <div class=\"alert alert-danger\" role=\"alert\">
                       Il y a eu une erreur, veuillez réessayer votre demande. Merci
                    </div>"; 
          break;
  }
    
  }

  #GERER AFFICHAGE MESSAGE ERREUR CONNECTION 
  
//   $nav = '';
  if(isset($_GET['_err'])){

      switch($_GET['_err']){
          case '403' :
          echo '<div class="alert alert-danger' . ($nav === 'eventon' ? ' errorMsgEvent' : ' errorMsg') .'">Vous devez vous connecter ! </div>';
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
