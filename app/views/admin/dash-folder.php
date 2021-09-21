<?php include_once APPROOT . '../views/inc/header-dash-pvf.php'; ?>

    <main class="row m-0">
        <div class="container mb-1 col-10">
            <h1 class="mt-5 text-uppercase">Dossiers</h1>
            <div class="add">
                <a href="<?php echo URLROOT; ?>/PostController/addFolder" class="button primary new">Ajouter</a>
            </div>
            <div class="cards footer-margin-bot">
                <!-- Start Foreach Loop -->
                <?php foreach($data as $row) : ?>
                <div class="card">
                    <img src="<?= URLROOT ?>/uploads/<?php echo $row->image ?>" class="card-img-top" alt="..">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row->name ;?></h5>
                    </div>
                    <div class="actions">
                        <form action="<?php echo URLROOT ?>/PostController/editFolder" method="post">
                            <input type="hidden" name="id_folder" value="<?php echo $row->id_folder ?>">
                            <input type="hidden" name="image" value="<?php echo $row->image ?>">
                            <button type="submit" name="btn-edit" class="button primary edit btn-success">Modifier  <i class="far fa-edit"></i></button>
                        </form>
                        <form action="<?php echo URLROOT ?>/PostController/deleteFolder" method="post">
                            <input type="hidden" name="id_folder" value="<?php echo $row->id_folder ?>">
                            <input type="hidden" name="image" value="<?php echo $row->image ?>">
                            <button type="submit" name="btn-delete" class="button primary delete btn-danger">Supprimer  <i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- End Foreach Loop -->
            </div>
        </div>
    </main>
    <!-- MAIN -->
</body>
</html>