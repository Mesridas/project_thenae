<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion | Thenae</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body class="has-background-light">
  <section class="hero is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">

          <!-- <h1 class="title has-text-danger">Thenae Créations</h1> -->
          <h1 class="title has-text-danger"><img src="img/logo.png" alt="Logo" width="250" height="250"></h1>
          <p class="subtitle has-text-dark">Connexion à l'espace d'administration</p>
          <div class="card is-shadowless">
            <form action="index.php?ctrl=Login&action=welcome" method="POST" class="card-content">
              <div class="field has-text-left">
              <label class="label">Login</label>
                <div class="control">
                  <input class="input is-medium" type="text" name='login'>
                </div>
              </div>
              <div class="field has-text-left">
              <label class="label">Password</label>
                <div class="control">
                  <input class="input is-medium" type="password" name="password">
                </div>
              </div>
              <button type="submit" class="button is-danger is-medium is-fullwidth">Se connecter</button>
            </form>
          </div>
        </div>
        <a class="button is-info" href="index.php?ctrl=home&action=index">Revenir sur le site</a>
      </div>
    </div>
  </section>  
  </body>
</html>

