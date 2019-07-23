<?php  require 'vendor/inc/dash_head.php'; ?>

<div class="columns is-full is-multiline">

<?php  require 'vendor/inc/dash_nav.php'; ?>  

<div class="column columns is-10 is-multiline container">  

<div class="column is-full">
<h2>Images principales de la catégorie</h2>
<table class="table">
  <thead>
    <tr>
      <th><abbr title="id">#</abbr></th>
      <th>Titre de la catégorie</th>
      <th><abbr title="Content">Description de l'image</abbr></th>
      <th><abbr title="Image">Image</abbr></th>
      <th></th>
      <th></th>
    </tr>
  </thead>

  <tbody>
  <?php 
    foreach($carousels as $carousel){
  ?>
        <tr>
        <th></th>
        <td><?php echo $carousel->getCategorie_name()?></td>
        <td><?php echo $carousel->getTitle()?></td>
        <td><figure class="image is-48x48">
          <img src="img/carousels/visible/<?php echo $carousel->getCategorie_id().'/'.$carousel->getImage() ;?>" alt="Placeholder image">
        </figure></td>
        <td><a href="index.php?ctrl=carousel&action=manageMe&id=<?php echo $carousel->getId()?>" class=" btn button-info ">Modifier cette image</a></td>
        <td><a href="index.php?ctrl=carousel&action=deleteMe&id=<?php echo $carousel->getId()?>" class=" btn button-info ">Supprimer l'image</a></td>
        </tr>
    <?php 
    }
    ?> 
  </tbody>
</table> 
<?php 
    // Calcul pour pagination et affichage du nombre de pages
    $pagesTotales = ceil($carousel->getNbImages()/$pagination);

    for($i = 1; $i <= $pagesTotales; $i++){

        if( $i == $currentPage){
        echo '['.$i.']';
        }else {
        echo '<a href="index.php?ctrl=admin&action=manageCarousel&id='.$carousel->getCategorie_id().'&page='.$i.'">'.$i.'</a>';
        }
    }
?>
    <nav class="pagination is-centered" >
        <!--Permet de disabled le bouton page précédente ou suivante s'il n'y a pas de pages avant ou après   -->
    <a href="index.php?ctrl=admin&action=manageCarousel&id=<?php echo $carousel->getCategorie_id()?>&page=<?php echo $currentPage - 1;?>" class="pagination-previous" <?php echo $currentPage > 1 ? '' : 'disabled' ?>>Page précédente</a>

    <a href="index.php?ctrl=admin&action=manageCarousel&id=<?php echo $carousel->getCategorie_id()?>&page=<?php echo $currentPage + 1;?>" class="pagination-next" <?php echo $pagesTotales > $currentPage ? '' : 'disabled'?> >Page suivante</a>
    </nav> 
</div>
<br>
<div class="column is-full">
<h2>Ajouter une image principale </h2>
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
</div>

</div> <!-- Div qui ferme la nav + la premier div de section -->


      
<?php   require 'vendor/inc/dash_foot.php'; ?>  