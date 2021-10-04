<?php include_once APPROOT . '../views/inc/header.php'; ?>

<!-- <?php var_dump($_SESSION) ?> -->

<main>
    <div class="container row">
        <?php if(isset($_SESSION['id_admin'])) { ?>
                <button class="btn"><a class="nav-link" href="<?= URLROOT ?>/AdminsController/dashboard">Dashboard</a></button>
        <?php } ?>
    </div>
</main>