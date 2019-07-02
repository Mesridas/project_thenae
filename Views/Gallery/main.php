<?php   
  require 'vendor/inc/dash_head.php'; 
  require 'vendor/inc/dash_nav.php'; 
?>  

<div class="container">
<h2>Liste des sections </h2>
<table class="table">
  <thead>
    <tr>
      <th><abbr title="id">#</abbr></th>
      <th>Titre de l'image</th>
      <th><abbr title="Image">Image</abbr></th>
    </tr>
  </thead>

  <tbody>
  <?php 
    foreach($galeries as $galerie){
  ?>
        <tr>
        <th><?php echo $galerie->getId()?></th>
        <td><?php echo $galerie->getTitle()?></td>
        <td><figure class="image is-48x48">
          <img src="img/galeries/<?php echo $galerie->getImage() ;?>" alt="Placeholder image">
        </figure></td>
        <td><a href="index.php?ctrl=admin&action=editGalerie&id=<?php echo $galerie->getId()?>" class=" btn button-info ">Modifier cette galerie</a></td>
        <td><a href="index.php?ctrl=admin&action=deleteGalerie&id=<?php echo $galerie->getId()?>" class=" btn button-info ">Supprimer cette galerie</a></td>
        </tr>
    <?php 
    }
    ?> 
  </tbody>
</table>  
</div>
<br>
<div class="container">
<h2>Ajouter une image à la galerie : </h2>
<form method="POST" action="index.php?ctrl=gallery&action=add" class="control" enctype="multipart/form-data">
    <div class="field">
        <label for="title" class="label">Titre de l'image</label>
        <div class="control">
            <input class="input" type="text" placeholder="Titre" name="title" id="title">
        </div>
    </div>
    <div class="field">
        <label for="mon_image" class="label">Veuillez ajouter une image à afficher</label>
        <div class="control">
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
            <input type="file" name="mon_image_galerie" id="mon_image">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button class="button is-link">Envoyer</button>
        </div>
    </div>
</form>
</div>


      
<?php   require 'vendor/inc/dash_foot.php'; ?>  