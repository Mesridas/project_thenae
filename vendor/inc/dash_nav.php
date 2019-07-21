<aside class="column is-2 is-fullheight section has-background-white">
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
          <li><a href="index.php?ctrl=admin&action=manageSection" >Présentation - Section </a></li>
          <li><a href="index.php?ctrl=admin&action=manageGalerie" >Mes créations - Galerie </a></li>
          <li><a href="index.php?ctrl=admin&action=manageCategorie" >Plus en détails - Carousels </a></li>
          <li><a href="index.php?ctrl=admin&action=manageForm&id=1" >Mes demandes clients </a></li>
          <li><a href="index.php?ctrl=admin&action=manageEvent" >Bannières évènemments  </a></li>
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