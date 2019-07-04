<?php   
  require 'vendor/inc/dash_head.php'; 
  require 'vendor/inc/dash_nav.php'; 
?>  

<div class="container">
<h2>Images principales de la catégorie</h2>
<table class="table">
  <thead>
    <tr>
      <th><abbr title="id">Image principale</abbr></th>
      <th>Image(s) de détails</th>
    </tr>
  </thead>

  <tbody>
        <tr>
        <th>        
            <figure class="image is-48x48">
                <img src="img/carousels/visible/<?php echo $carousel->getCategorie_id().'/'.$carousel->getImage() ;?>" >
            </figure></th>
        <?php foreach($hidden as $hide){ 
            var_dump($hidden);?>            
        <td>
            <figure class="image is-48x48">
                <img src="img/carousels/invisible/<?php echo $hide->getCategorie_id().'/'.$hide->getImage() ;?>" >
            </figure>
        </td> 
         <?php } ?>       
        <td><?php echo $carousel->getCategorie_name()?></td>
        <td><a href="index.php?ctrl=carousel&action=deleteMe&id=<?php echo $carousel->getId()?>" class=" btn button-info ">Supprimer l'image</a></td>
        </tr>
  </tbody>
</table>  
</div>
<br>
<div class="container">
<h2>Ajouter des images détails pour cette image </h2>
<form method="POST" action="index.php?ctrl=carousel&action=add" class="control" enctype="multipart/form-data">
    <div class="field">
        <label for="desc" class="label">Description de l'image</label>
        <div class="control">
            <textarea class="textarea" placeholder="Description" name="desc" id="desc"></textarea>
        </div>
    </div>
    <div class="field">
        <label for="mon_image" class="label">Veuillez ajouter une image à afficher</label>
        <div class="control">
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
            <input type="file" name="mon_image_principale" id="mon_image">
        </div>
    </div>
    <input type="hidden" name="location">
    <input type="hidden" name="cat_number" value="<?php echo $id?>">
    <div class="field">
        <div class="control">
            <button class="button is-link">Envoyer</button>
        </div>
    </div>
</form>
</div>


      
<?php   require 'vendor/inc/dash_foot.php'; ?>  