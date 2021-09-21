        <?php include_once APPROOT . '../views/inc/header-dash.php'; ?>

        <main class="row m-0">
            <div class="container mt-5 col-10">
                <h1 class="text-uppercase">Sections</h1>
                <div class="container-fluid row m-0 p-0">
                    <div class="card col-3 p-0">
                        <img src="<?= URLROOT ?>/img/markus-spiske-EfhOW3cYqD8-unsplash.jpg" alt="">
                        <div class="route strok"><h2><a href="<?= URLROOT ?>/PostController/dashPhoto" class="hov" aria-label="dashboard photos">PHOTOS</a></h2></div>
                    </div>
                    <div class="card col-3 p-0">
                        <img src="<?= URLROOT ?>/img/thomas-william-4qGbMEZb56c-unsplash.jpg" alt="">
                        <div class="route strok"><h2><a href="<?= URLROOT ?>/PostController/dashVideo" class="hov" aria-label="dashboard videos">VIDEOS</a></h2></div>
                    </div>
                    <div class="card col-3 p-0">
                        <img src="<?= URLROOT ?>/img/viktor-talashuk-05HLFQu8bFw-unsplash.jpg" alt="">
                        <div class="route strok"><h2><a href="<?= URLROOT ?>/PostController/dashFolder" class="hov" aria-label="dashboard folders">DOSSIERS</a></h2></div>
                    </div>
                    <div class="card col-3 p-0">
                        <img src="<?= URLROOT ?>/img/cytonn-photography-n95VMLxqM2I-unsplash.jpg" alt="">
                        <div class="route strok"><h2><a href="<?= URLROOT ?>/AdminController/dashClient" class="hov" aria-label="dashboard clients">CLIENTS</a></h2></div>
                    </div>
                </div>
            </div>
        </main>
        <!-- MAIN -->

        <!-- SECTION FOOTER -->
        <?php include_once APPROOT . '../views/inc/footer.php'; ?>
        <!-- SECTION FOOTER -->
