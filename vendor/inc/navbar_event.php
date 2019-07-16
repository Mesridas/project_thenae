<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="col">
      <div class="container row">
        <div class="row col-12">
          <a class="navbar-brand" href="#">Thénaë Créations</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php?ctrl=home&action=index#galery">Mes créations</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?ctrl=home&action=index#contactme">Me contacter</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
<?php 
if(($event->getId()) !== null){  
     echo' <div class="row">
        <div class="col-12 text-white marquee visual-aid"> 
	        <span>'.$event->getText().'</span>
        </div>
      </div>';

  } 
?>
    </div>
</nav>

