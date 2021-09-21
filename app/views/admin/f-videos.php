<?php include_once APPROOT . '../views/inc/header-pvf.php'; ?>
<!-- MAIN -->
<main>
    <!-- FOLDERS -->
    <div class="folders mt-5 footer-margin-bot">
        <h1>Dossiers vidéos</h1>
        <div class="folder">
            <?php foreach($data as $row) : ?>
            <div class="card">
                <img src="<?= URLROOT ?>/uploads/<?php echo $row->image ?>" alt="">
                <form action="<?php echo URLROOT ?>/PostController/videos" method="POST">
                    <div class="route strok">
                        <input type="hidden" name="id" value="<?php echo $row->id_folder; ?>">
                        <button name="submit"><h3><a><?php echo $row->name; ?></a></h3></button>
                    </div>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<!-- FOLDERS -->
</main>
<!-- MAIN -->
</body>
</html>