<!-- Gallerie photo -->
<section id="galery" class="m-t-150 p-b-80">
      <h2 class="container display-4 m-b-80 m-t-50 p-t-80"><?php echo $galleries[0]->getTitle() ;?></h2>
      <div class="container mh-100">
        <div class="row align-items-center">
          <div class="col-lg-12 order-lg-2 text-center">
            <?php 
            foreach($galleries as $gallery){
              echo '<a href="img/'.$gallery->getImage().'" data-lightbox="'.$gallery->getData_lightbox().'" data-title="'.$gallery->getData_title().'"><img src="img/'.$gallery->getImage().'" class="img-thumbnail"></a>';
            }
            ?>

