<?php include_once APPROOT . '../views/inc/header-dash-pvf.php'; ?>
<!-- MAIN -->
<main class="row m-0">
    <div class="container col-10">
        <h1 class="mt-4">Modifier photo</h1>
        <!-- FORM -->
        <div class="form footer-margin-bot mt-3">
            <?php if(isset($_GET['error'])) : ?>
            <div class="error"><?= $error->error; ?></div>
            <?php endif; ?>
            <form action="<?= URLROOT ?>/PostController/updatePhoto" method="POST" class="form-group container col-6" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data->id; ?>">
                <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Titre</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" name="title" value="<?= $data->title ?>">
                </div>
                <div class="choix">
                    <div class="image">
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Image</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple name="new_image">
                            <img src="<?=URLROOT?>/uploads/<?= $data->image; ?>" alt="" style="width:25%;">
                            <input type="hidden" name="old_image" value="<?= $data->image; ?>">
                        </div>
                    </div>
                    <div class="folder">
                        <div class="col-md-4">
                            <label for="folder" class="form-label">Dossier</label>
                            <select id="inputState" class="form-select" name="folder">
                              <option selected>Choisir...</option>
                              <?php foreach($data1 as $name) : ?>
                              <option><?= $name->name; ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tags">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Tag</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="tag" value="<?php echo $data->tag ?>">
                    </div>
                </div>
                <div class="description">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?php echo $data->description ?></textarea>
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