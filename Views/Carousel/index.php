<!-- Gallerie avec présentation plus détaillés des produits -->
  <h2 class="display-4 m-b-80 m-t-50 p-t-80" >Plus en détails :</h2>
<?php 
  foreach($carousels as $key => $value){
?>
    <h3 class="m-l-50 my-5 text-center"><?php echo $value[0]->getCategorie_name() ?></h3>
      <section class="container text-center"> 
        <div id="<?php echo $value[0]->getCategorie_name() ?>" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
<?php
              $i = 0;
              foreach(array_chunk($value, 3, true) as $array){  // Je sépare en 3 pour l'affichage de mon carousel par 3

                if($i == 0){
                  echo '<div class="carousel-item active">';  
                  $i++;
                }else{
                  echo '<div class="carousel-item col-lg-12">';  
                }
                    
                foreach($array as $carousel){ // Le dossier de mes images est l'id de mes categories
                  echo '<a href="img/photo_thenae/'.$carousel->getCategorie_id().'/'.$carousel->getImage().'.jpg" data-lightbox="'.$carousel->getLocation().'" data-title="'.$carousel->getTitle().'"><img src="img/photo_thenae/'.$carousel->getCategorie_id().'/'.$carousel->getImage().'.jpg" class="img-thumbnail"></a>';
                }

                echo '</div>';
                      
               }  
              
?>   
            </div>
            <a class="carousel-control-prev" href="#<?php echo $value[0]->getCategorie_name() ?>" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            
            <a class="carousel-control-next" href="#<?php echo $value[0]->getCategorie_name() ?>" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
      </section>

<?php 
  } 
?>


<!-- Galerie caché qui s'affiche lorsqu'on clique sur les photos -->
  <div class="unsetgallery"> 
  <?php 
      foreach($hidden as $hide){

        echo '<a href="img/img_details/'.$hide->getCategorie_id().'/'.$hide->getImage().'.jpg" data-lightbox="'.$hide->getLocation().'" data-title="'.$hide->getTitle().'"><img src="img/img_details/'.$hide->getCategorie_id().'/'.$hide->getImage().'.jpg"></a>';
        
      }
  ?>
  <!-- </div> -->



 <!-- FERME LA SECTION AVEC GALLERY -->
      </div>
    </div>
  </div>
</section>
