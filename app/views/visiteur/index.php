<?php include_once APPROOT . '../views/inc/header-accueil.php'; ?>
<?php if(isset($data['error'])) { ?>
  <div class="error text-danger text-bold container text-center">
    <?= $data['error']; ?>
  </div>
<?php } ?>
<!-- MAIN -->
<main id="accueil" class="row m-0">
  <div class="container col-10">
    <!-- SECTION PHOTOS -->
    <div class="photos row m-0">
        <h1 class="col-10 mt-4">photos</h1>
        <a href="<?= URLROOT ?>/VisiteurController/foldersPhotos" aria-label="folders photos" class="col-2 text-center text-primary mt-4 d-flex justify-content-center text-uppercase p-0">voir plus</a>
        <div class="galery">
            <?php foreach($data as $rows) : ?>
            <div class="img">
                <h3><?php echo $rows->title ?></h3>
                <img src="<?= URLROOT ?>/uploads/<?php echo $rows->image ?>" alt="">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- SECTION PHOTOS -->
    <!-- SECTION VIDEOS -->
    <div class="videos row mt-5">
        <h1 class="col-10">vidéos</h1>
        <a href="<?= URLROOT ?>/VisiteurController/foldersVideos" aria-label="folders videos" class="col-2 text-center text-primary d-flex justify-content-center text-uppercase p-0">voir plus</a>
        <div id="carouselExampleControls" class="carousel slide mt-5" >
            <div class="carousel-inner">
              <?php foreach($data1 as $row) : ?>
              <div class="carousel-item active">

                <video src="<?= URLROOT ?>/uploads<?php echo $row->video ?>" class="d-block w-100" controls type="videos/mp4"></video>

              </div>
              <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- SECTION VIDEOS -->
    <!-- SECTION ABOUT -->
    <div class="about mt-5" id="about">
        <h1>a propos</h1>
        <div class="content">
            <img src="<?= URLROOT ?>/img/brandon-erlinger-ford-jL8QFwnuOcQ-unsplash.jpg" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla</p>
        </div>
    </div>
    <!-- SECTION ABOUT -->
    <!-- SECTION FORM FOR CLIENT -->
    <div class="date mt-5 mb-2">
        <h1>Prenez votre rondez-vous</h1>
        <div class="form row mt-4 footer-margin-bot">
          <div class="col-2"></div>
          <form action="<?php echo URLROOT ?>/VisiteurController/addClient" method="POST" class="col-8">
            <div class="mail row mt-3">
                <label for="mail" class="col-6">Adresse émail</label>
                <div class="col-6">
                  <input type="email" class="form-control" id="mail" name="email">
                </div>
              </div>
              <div class="phone row mt-3">
                <label for="phone" class="col-6">Numéro de télephone</label>
                <div class="col-6">
                  <input type="phone" class="form-control" id="phone" name="phone">
                </div>
              </div>
              <div class="genre row mt-3">
                <label for="genre" class="col-6">Genre</label>
                <div class="check1 col-6">
                    <input class="form-check-input" type="checkbox" id="photos" value="photos" name="photos">
                    <label class="form-check-label" for="photos">Photos</label>
                    <input class="form-check-input" type="checkbox" id="videos" value="vidéos" name="videos">
                    <label class="form-check-label" for="videos">Vidéos</label>
                </div>
              </div>
              <div class="occasion row mt-3">
                <label for="occasion" class="col-6">Occasion</label>
                <div class="check2 col-6">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="marriage" value="marriage" name="marriage">
                    <label class="form-check-label" for="marriage">Marriage</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="fête" value="fete" name="fête">
                    <label class="form-check-label" for="fête">Fête</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="shooting" value="shooting" name="shooting">
                    <label class="form-check-label" for="shooting">Shooting</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="sport" value="match" name="match">
                    <label class="form-check-label" for="sport">Sport</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="anniv" value="anniversaire" name="anniversaire">
                    <label class="form-check-label" for="anniv">Anniversaire</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="autre" value="autre" name="autre">
                    <label class="form-check-label" for="autre">Autre</label>
                  </div>
                </div>
              </div>
              <div class="button mt-4 text-center">
                <input type="submit" value="Envoyer" name="envoyer" class="btn btn-primary col-2 mb-5">
              </div>
          </form>
        </div>
    </div>
    <!-- SECTION FORM FOR CLIENT TO SEND HIS COMMAND-->
  </div>
</main>
<!-- MAIN -->
<!-- SECTION Footer -->
<?php include_once APPROOT . '../views/inc/footer.php'; ?>
<!-- SECTION Footer -->
