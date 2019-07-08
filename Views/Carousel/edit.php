<?php  require 'vendor/inc/dash_head.php'; ?>

<div class="columns is-full is-multiline">

<?php  require 'vendor/inc/dash_nav.php';   

  $id = $_GET['id'];

?>  

<div class="column columns is-10 is-multiline container">


<div class="column is-full">
<h2>Images principales de la catégorie</h2>
<form action="index.php?ctrl=carousel&action=deleteDetails&id=<?php echo $id ?>" method="POST">
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
        <?php 
        unset($hidden[0]);    
        foreach($hidden as $hide){ 
        ?>            
        <td>
            <figure class="image is-48x48">
                <img src="img/carousels/invisible/<?php echo $hide->getCategorie_id().'/'.$hide->getImage() ;?>" >
            </figure>
            <br>
            <label class="checkbox">
                <input type="checkbox" name="select[]" value="<?php echo $hide->getId()?>">
            </label>

         <?php } ?>  
        </td>               
        <td><button name="submit" class="button is-danger is-small">Supprimer les images cochées</button></td>
        </tr>
  </tbody>
</table>  
</form>
</div>
<br>
<div class="column is-full">
<h2>Ajouter des images détails pour cette image </h2>
<form method="POST" action="index.php?ctrl=carousel&action=addDetails&id=<?php echo $id ?>" class="control" enctype="multipart/form-data">
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
            <input type="file" name="mon_image_details" id="mon_image">
        </div>
    </div>
    <input type="hidden" name="location">
    <input type="hidden" name="cat_number">
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