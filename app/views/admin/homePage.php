<?php include_once APPROOT . '../views/inc/header.php'; ?>

<!-- <?php var_dump($_SESSION) ?> -->

<main>
    <div class="container row">
        <div class="logout col-2 m-4">
            <a href="<?= URLROOT ?>/AdminsController/offres" class="btn btn-primary text-decoration-none text-center">Offres</a>
        </div>
        <div class="dashboard col-2 m-4">
            <a href="<?= URLROOT ?>/AdminsController/dashboard" class="btn btn-primary text-decoration-none text-center">Bashboard</a>
        </div>
    </div>
</main>