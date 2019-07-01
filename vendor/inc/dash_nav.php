<aside class="column is-2 is-fullheight section has-background-white ">
        <p class="has-text-link is-size-2">Thenae</p>
          <p class="menu-label">
          General
        </p>
        <ul class="menu-list">
          <li><a href="index.php?ctrl=admin&action=dashboard" class="<?php echo $page == 'Dashboard' ? 'is-active' : '' ?>">Tableau d'administration</a></li>
          <li><a href="index.php?ctrl=home&action=index" class="<?php echo $page == 'Dashboard' ? 'is-active' : '' ?>">Revenir sur le site</a></li>
        </ul>
        <p class="menu-label">
          Administration
        </p>
        <ul class="menu-list">
          <li><a href="index.php?ctrl=admin&action=manageSection" class="<?php echo $page == 'Gallery_main' ? 'is-active' : '' ?>">Section - présentation </a></li>
          <li><a href="index.php?ctrl=admin&action=manageGalerie" class="<?php echo $page == 'Gallery_sac' ? 'is-active' : '' ?>">Mes créations - Galerie </a></li>
          <li><a href="gallery_sac.php" class="<?php echo $page == 'Gallery_sac' ? 'is-active' : '' ?>">Plus en détails - Carousels/Sliders </a></li>
          <li><a href="gallery_sac.php" class="<?php echo $page == 'Gallery_sac' ? 'is-active' : '' ?>">Mes demandes clients </a></li>
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