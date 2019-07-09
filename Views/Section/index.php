<?php
   foreach($sections as $section){

    if(($section->getId() % 2) == 0 ){
?>

    <section class="mh-100">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5">
                <img class="img-fluid rounded-circle" src="img/sections/<?php echo $section->getImage() ;?>" alt="">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="p-5">
                <h2 class="display-4"><?php echo $section->getTitle() ;?></h2>
                <p><?php echo $section->getText() ;?></p>
                </div>
            </div>
            </div>
        </div>
    </section>

<?php
    }else{
        
?>
    <section id="<?php echo ($section->getId() == 1) ? "start" : " " ; // set scroll on first section ?>" > 
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="img/sections/<?php echo $section->getImage() ;?>" alt="">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <h2 class="display-4"><?php echo $section->getTitle() ;?></h2>
              <p><?php echo $section->getText() ;?></p>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php
    }
   }
?>
