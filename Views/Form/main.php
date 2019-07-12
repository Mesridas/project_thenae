<?php  require 'vendor/inc/dash_head.php'; ?>

<div class="columns is-full is-multiline">

<?php  require 'vendor/inc/dash_nav.php'; ?>  

<div class="column columns is-10 is-multiline">


<!-- <section class="column is-2 has-background-grey-light tile">
</section>
<section class="column is-3 has-background-grey-lighter tile">
</section>
<section class="column is-6 has-background-grey-dark tile">
</section> -->
<?php 

// echo '<pre>';
// var_dump($orders);
// echo '</pre>';

 ?>


<div class="tile is-ancestor">
  <!-- All other tile elements -->
    <div class="tile is-2 is-vertical is-parent">
        <button class="tile is-child box" value="1">En attente</button>
        <button class="tile is-child box" value="2">En cours</button>
        <button class="tile is-child box" value="3">Achevée(s)</button>
    </div>
    
    <div id="lastorders" class="tile  is-3 is-primary is-vertical is-parent">
    <?php foreach($orders as $order){
        echo '
        <div id="'.$order->getId().'" class="tile is-child box selectedOrder">
            <p class="title">'.$order->getCustomer_name().'</p>
            <p class="subtitle">'.$order->getCustomer_email().'</p>
            <p class="subtitle">Numéro de commande :'.$order->getId().'</p>
        </div>';
    } ?>
    </div>

    <!-- Récuperer l'id de mon client en onclick  et faire une afficher mon message where l'id de 
    de mon message est egal a l'id du client et de la commande du onclick aussi -->
    <div class="tile is-6 is-danger is-parent">
        <div  class="tile is-child box content">
            <p class="title ">Message</p>
            <p id="orderMessage">Veuillez selectionner une commande.</p>
            <div class="buttons is-centered "> 
                <a class="button is-rounded is-small">Répondre </a>
                <a class="button is-rounded is-small">Marqué "En cours"</a>
                <a class="button is-rounded is-small">Marqué "Achevé"</a>
            </div>
        </div>
    </div>
</div>












</div>

</div> <!-- Div qui ferme la nav + la premier div de section -->

<!-- Affichage dynamique de notre 'order client' -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/app.js"></script>
      
<?php   require 'vendor/inc/dash_foot.php'; ?>  