<aside class="column is-2 is-fullheight section has-background-white dash">
        <p class="has-text-link is-one-quarter">Thenae</p>
          <p class="menu-label">
          General
        </p>
        <ul class="menu-list">
          <li><a href="index.php?ctrl=admin&action=dashboard" class="<?php echo $page == 'Dashboard' ? 'is-active' : '' ?>">Tableau d'administration</a></li>
          <li><a href="index.php?ctrl=home&action=index">Revenir sur le site</a></li>
        </ul>
        <p class="menu-label">
          Administration
        </p>
        <ul class="menu-list">
          <li><a href="index.php?ctrl=admin&action=manageSection" class="<?php echo $page == 'section' ? 'is-active' : '' ?>" >Présentation - Section </a></li>
          <li><a href="index.php?ctrl=admin&action=manageGalerie" class="<?php echo $page == 'galerie' ? 'is-active' : '' ?>" >Mes créations - Galerie </a></li>
          <li><a href="index.php?ctrl=admin&action=manageCategorie" class="<?php echo $page == 'categorie' ? 'is-active' : '' ?>" >Plus en détails - Carousels </a></li>
          <li><a href="index.php?ctrl=admin&action=manageForm&id=1" class="<?php echo $page == 'formulaire' ? 'is-active' : '' ?>" >Mes demandes clients </a></li>
          <li><a href="index.php?ctrl=admin&action=manageEvent" class="<?php echo $page == 'event' ? 'is-active' : '' ?>" >Bannières évènemments  </a></li>
        </ul>
        <footer class="card-footer logout">
          <a href=".?logout" class="card-footer-item button is-white">
            <span class="icon">
              <i class="fas fa-sign-out-alt"></i>
            </span>
            <span>Logout</span>
          </a>
        </footer>
      </aside>