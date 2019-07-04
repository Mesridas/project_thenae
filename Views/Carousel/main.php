<?php   
  require 'vendor/inc/dash_head.php'; 
  require 'vendor/inc/dash_nav.php'; 
?>  

<div class="container">
<h2>Liste des catégories</h2>
<table class="table">
  <thead>
    <tr>
      <th><abbr title="id">#</abbr></th>
      <th>Titre de la catégorie</th>
      <th><abbr title="Content">Description de l'image</abbr></th>
      <th><abbr title="Image">Image</abbr></th>
    </tr>
  </thead>

  <tbody>
  <?php 

    foreach($categories as $categorie){
  ?>
        <tr>
        <th><?php echo $categorie->getId()?></th>
        <td><?php echo $categorie->getName()?></td>
        <td><a href="index.php?ctrl=admin&action=manageCarousel&id=<?php echo $categorie->getId()?>" class=" btn button-info ">Modifier les images de cette catégorie</a></td>
        <td><a href="index.php?ctrl=categorie&action=edit&id=<?php echo $categorie->getId()?>" class=" btn button-info ">Modifier le titre de la catégorie</a></td>
        <td><a href="index.php?ctrl=categorie&action=delete&id=<?php echo $categorie->getId()?>" class=" btn button-info ">Supprimer la catégorie </a></td>
        </tr>
    <?php 
    }
    ?> 
  </tbody>
</table>  
</div>
<br>
<div class="container">
<h2>Ajouter une categorie </h2>
<form method="POST" action="index.php?ctrl=categorie&action=add" class="control" enctype="multipart/form-data">
    <div class="field">
        <label for="title" class="label">Titre de la catégorie</label>
        <div class="control">
            <input class="input" type="text" placeholder="Titre" name="title_cat" id="title">
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