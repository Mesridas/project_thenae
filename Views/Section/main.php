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
      <th>Titre</th>
      <th><abbr title="Content">Contenu</abbr></th>
      <th><abbr title="Image">Image</abbr></th>
    </tr>
  </thead>

  <tbody>
  <?php 
    foreach($sections as $section){
  ?>
        <tr>
        <th><?php echo $section->getId()?></th>
        <td><?php echo $section->getTitle()?></td>
        <td><?php echo $section->getText()?></td>
        <!-- <td>?php echo $section->getImage()?></td> -->
        <td><figure class="image is-48x48">
          <img src="img/sections/<?php echo $section->getImage() ;?>" alt="Placeholder image">
        </figure></td>
        <td><a href="index.php?ctrl=admin&action=editSection&id=<?php echo $section->getId()?>" class=" btn button-info ">Modifier cette section</a></td>
        <td><a href="index.php?ctrl=section&action=delete&id=<?php echo $section->getId()?>" class=" btn button-info ">Supprimer cette section</a></td>
        </tr>
    <?php 
    }
    ?> 
  </tbody>
</table>  
</div>
<br>
<div class="container">
<h2>Ajouter une section : </h2>
<form method="POST" action="index.php?ctrl=section&action=add" class="control" enctype="multipart/form-data">
    <div class="field">
        <label for="title" class="label">Titre</label>
        <div class="control">
            <input class="input" type="text" placeholder="Titre" name="title" id="title">
        </div>
    </div>
    <div class="field">
        <label for="desc" class="label">Description</label>
        <div class="control">
            <textarea class="textarea" placeholder="Description" name="desc" id="desc"></textarea>
        </div>
    </div>
    <div class="field">
        <label for="mon_image" class="label">Veuillez ajouter une image à afficher</label>
        <div class="control">
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
            <input type="file" name="mon_image" id="mon_image">
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