<nav class="stroke col-6">
  <ul class="row mb-0 nav-links">
      <li class="col-1"><a href="<?php echo URLROOT; ?>/PostController/index" class="hov text-light">Accueil</a></li>
      <li class="col-1"><a href="<?php echo URLROOT; ?>/PostController/foldersPhotos" class="hov text-light">Photos</a></li>
      <li class="col-1"><a href="<?php echo URLROOT; ?>/PostController/foldersVideos" class="hov text-light">Vidéos</a></li>
      <li class="col-1"><a href="<?php echo URLROOT; ?>/PostController/dashboard" class="hov text-light">Dashboard</a></li>
      <li class="col-1"><a href="<?php echo URLROOT; ?>/AdminController/killSession" class="hov text-light">Déconnexion</a></li>
      <form action="<?php echo URLROOT; ?>/AdminController/search" method="POST" class="form-inline col-3">
        <input type="search" name="name" id="search" class="form-control mr-sm-2"  placeholder="Recherche" aria-label="Search">
        <button name="submit_search" class="btn my-2 my-sm-0" title="search" type="submit"><i class="fas fa-search text-light"></i></button>
      </form>
  </ul>
</nav>