            <!-- Gallerie avec présentation plus détaillés des produits -->
            <h2 class="display-4 m-b-80 m-t-50 p-t-80" >Plus en détails :</h2>
              <!-- Slider sac à main -->
            <h3 class="m-l-50 my-5 text-center"><?php $carousels['_title_carousel']?></h3>

            <section class="container text-center"> 
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php 
                  $i = 0;
                  echo '<pre>';var_dump($carousels);'</pre>';
                  foreach (array_chunk($carousels, 3, true) as $array) {         

                      if($i == 0){
                        echo '<div class="carousel-item active">';  
                        $i++;
                      }else{
                        echo '<div class="carousel-item col-lg-12">';  
                      }
                
                      foreach($array as $carousel) {
                        echo '<a href="img/photo_thenae/sacamain/'.$carousel->getImage().'.jpg" data-lightbox="'.$carousel->getLocation().'" data-title="'.$carousel->getTitle().'"><img src="img/photo_thenae/sacamain/'.$carousel->getImage().'.jpg" class="img-thumbnail"></a>';
                      }
                      echo '</div>';
                  }
                  // echo '<pre>';var_dump($array);'</pre>';
                  ?>   

                </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
              </div>
            </section>
              <!-- Slider pochettes  -->
            <h3 class="m-l-50 my-5 text-center">Des pochettes</h3>

            <section class="container text-center"> 
                <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                   <?php 
                  $i = 0;
                  foreach (array_chunk($carousels, 3, true) as $array) {                    
                      if($i == 0){
                        echo '<div class="carousel-item active">';  
                        $i++;
                      }else{
                        echo '<div class="carousel-item col-lg-12">';  
                      }
                
                      foreach($array as $carousel) {
                        echo '<a href="img/photo_thenae/pochette/'.$carousel->getImage().'.jpg" data-lightbox="'.$carousel->getLocation().'" data-title="'.$carousel->getTitle().'"><img src="img/photo_thenae/pochette/'.$carousel->getImage().'.jpg" class="img-thumbnail"></a>';
                      }
                      echo '</div>';
                  }
                  ?>   

                </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
              </div>
            </section>