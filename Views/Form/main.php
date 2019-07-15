<?php  require 'vendor/inc/dash_head.php'; ?>

<div class="columns is-full is-multiline">

<?php  require 'vendor/inc/dash_nav.php'; ?>  

<div class="column columns is-10 is-multiline">

<div class="tile is-ancestor">
    <div class="tile is-2 is-vertical is-parent">
        <button class="tile is-child box <?php if($_GET['action'] = 'manageForm'){ echo 'notification is-primary';} ?>" value="1">En attente</button>
        <button class="tile is-child box" value="2">En cours</button>
        <button class="tile is-child box" value="3">Achevée(s)</button>
    </div>
    <div id="lastorders" class="tile  is-3 is-vertical is-parent">
    <?php foreach($orders as $order){
        echo '
        <div id="'.$order->getId().'" class="tile is-child box selectedOrder">
            <p class="title">'.$order->getCustomer_name().'</p>
            <p class="subtitle">'.$order->getCustomer_email().'</p>
            <p class="subtitle">Numéro de commande :'.$order->getId().'</p>
        </div>';
    } ?>
    </div>
    <div class="tile is-6 is-danger is-parent">
        <div  class="tile is-child box content">
            <p class="title ">Message</p>
            <p id="orderMessage">Veuillez selectionner une commande.</p>
            <div id="stateorder" class="buttons is-centered "> 

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