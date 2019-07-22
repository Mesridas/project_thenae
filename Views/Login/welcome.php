<?php  require 'vendor/inc/dash_head.php'; ?>

<div class="columns is-full is-multiline">

<?php  require 'vendor/inc/dash_nav.php'; ?>  
<?php
$user = unserialize($_SESSION[APP_TAG]['connected']);
?>
      <div class="container column is-10 ">
        <div class="section">
          <section class="hero is-link is-bold">
            <div class="hero-body">
              <div class="container">
                <h1 class="title">
                  Hello, <?php echo $user->getLogin(); ?>.
                </h1>
                <h2 class="subtitle">
                  Bienvenue sur le panneau d'administration !
                </h2>
              </div>
            </div>
          </section>
        </div>
      </div>
      
  </div> <!-- Div qui ferme la nav + la premier div de columns is-ful-->
<?php   require 'vendor/inc/dash_foot.php'; ?>  