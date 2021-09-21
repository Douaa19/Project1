<?php include_once APPROOT . '../views/inc/header-dash-pvf.php'; ?>
<!-- MAIN -->
<main class="row m-0">
    <div class="container col-10">
        <h1 class="mt-4">Modifier photo</h1>
        <!-- FORM -->
        <div class="form footer-margin-bot mt-3">
            <form action="<?= URLROOT ?>/PostController/updateFolder" method="POST" class="form-group container col-6" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data->id_folder ?>">
                <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Nom</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="<?php echo $data->name; ?>">
                </div>
                <div class="choix">
                    <div class="image">
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Image</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple name="new_image">
                            <img src="<?= URLROOT; ?>/uploads/<?= $data->image; ?>" alt="" style="width:25%;">
                            <input type="hidden" name="old_image" value="<?= $data->image; ?>">
                        </div>
                    </div>
                <div class="button">
                    <input type="submit" value="Modifier" name="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
        <!-- FORM -->
    </div>
</main>
<!-- MAIN -->

</body>
</html>