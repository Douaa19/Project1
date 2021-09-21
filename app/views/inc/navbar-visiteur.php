<nav class="stroke col-6">
    <ul class="row mb-0">
        <li class="col-1"><a href="<?php echo URLROOT; ?>/VisiteurController/index" aria-label="accueil" class="hov text-light">Accueil</a></li>
        <li class="col-1"><a href="<?php echo URLROOT; ?>/VisiteurController/foldersPhotos" aria-label="folders photos" class="hov text-light">Photos</a></li>
        <li class="col-1"><a href="<?php echo URLROOT; ?>/VisiteurController/foldersVideos" aria-label="folders videos" class="hov text-light">Vidéos</a></li>
        <li class="col-1"><a href="#about" aria-label="session about" class="hov text-light">A propos</a></li>
        <form action="<?php echo URLROOT; ?>/VisiteurController/search" method="POST" class="form-inline col-3">
          <input type="search" name="name" id="search" class="form-control mr-sm-2"  placeholder="Recherche" aria-label="Search">
          <button name="submit_search" class="btn my-2 my-sm-0" title="search" type="submit"><i class="fas fa-search text-light"></i></button>
        </form>
    </ul>
</nav>