
      <div class="container column is-10 ">
        <div class="section">
          <section class="hero is-link is-bold">
            <div class="hero-body">
            <div class="container">
              <h1 class="title">
                Hello, <?php echo $_SESSION[APP_TAG]['connected']['use_login']; ?>.
              </h1>
              <h2 class="subtitle">
                I hope you are having a great day!
              </h2>
            </div>
          </div>
          <div>
          <?php 
          if(isset($erreur)){

              echo $erreur;
          }
          ?>
          </div>
        </section>
        </div>


      </div>

      
