<?php include_once APPROOT . './views/inc/header-accueil.php'; ?>


<main id="accueil" class="row m-0">
  <div class="container col-10">
    <!-- SECTION PHOTOS -->
    <div class="photos mt-5 row">
        <h1 class="col-9">photos</h1>
        <a href="<?= URLROOT ?>/PostController/foldersPhotos" class="col-3 text-center text-primary d-flex justify-content-center text-uppercase" aria-label="folders photos">voir plus</a>
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
    <div class="videos row mt-1">
        <h1 class="col-9">vidéos</h1>
        <a href="<?= URLROOT ?>/PostController/foldersVideos" class="col-3 text-center text-primary d-flex justify-content-center text-uppercase" aria-label="folders videos">voir plus</a>
        <div id="carouselExampleControls" class="carousel slide mt-5" >
            <div class="carousel-inner">
            <?php foreach($data1 as $row) : ?>
              <div class="carousel-item active">

                <!-- <video controls="controls" src="<?= URLROOT ?>/uploads/<?php echo $row->video ?>" video="web/mp4" class="d-block w-100" type="video/mp4"></video> -->

                <video controls class="d-block w-100" src="<?= URLROOT ?>/uploads<?php echo $row->video ?>">
                <track default
                    type="video/mp4"
                    kind="captions"
                    srclang="en"
                    src="<?= URLROOT ?>/uploads/<?php echo $row->video ?>"/>
                </video>

              </div>
              <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- SECTION VIDEOS -->
    <!-- SECTION ABOUT -->
    <div class="about mt-5 footer-margin-bot" id="about">
        <h1>a propos</h1>
        <div class="content">
            <img src="<?= URLROOT ?>/img/brandon-erlinger-ford-jL8QFwnuOcQ-unsplash.jpg" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla</p>
        </div>
    </div>
    <!-- SECTION ABOUT -->

</main>
<!-- MAIN -->
<!-- SECTION FOOTER -->
<?php include_once APPROOT . '../views/inc/footer.php'; ?>
<!-- SECTION FOOTER -->