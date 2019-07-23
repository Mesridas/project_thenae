<?php  require 'vendor/inc/dash_head.php'; ?>

<div class="columns is-full is-multiline">

<?php  require 'vendor/inc/dash_nav.php'; ?>  

<div class="column columns is-10 is-multiline container">

<div class="column is-full ">
<h2>Liste des évènements </h2>
<table class="table">
  <thead>
    <tr>
      <th><abbr title="id">#</abbr></th>
      <th><abbr title="Content">Contenu</abbr></th>
      <th></th>
    </tr>
  </thead>

  <tbody>
  <?php 
    foreach($events as $event){
  ?>
        <tr>
        <th><?php echo $event->getId()?></th>
        <td><?php echo $event->getText()?></td>
        <td><a href="index.php?ctrl=event&action=delete&id=<?php echo $event->getId()?>" class=" btn button-info ">Supprimer cette section</a></td>
        </tr>
    <?php 
    }
    ?> 
  </tbody>
</table>  
</div>
<!-- <br> -->

<div class="column is-full">
<h2>Ajouter un évènement : </h2>
<form method="POST" action="index.php?ctrl=event&action=add" class="control" enctype="multipart/form-data">
    <div class="field">
        <label for="desc" class="label">Description de l'annonce </label>
        <div class="control">
            <textarea class="textarea" placeholder="Description" name="desc" id="desc"></textarea>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button class="button is-link">Envoyer</button>
        </div>
    </div>
</form>
</div>
</div>
</div> <!-- Div qui ferme la nav + la premier div de section -->



      
<?php   require 'vendor/inc/dash_foot.php'; ?>  