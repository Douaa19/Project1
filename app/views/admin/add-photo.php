<?php include_once APPROOT . '../views/inc/header-dash-pvf.php'; ?>


<main class="row m-0">
    <div class="container col-10">
        <h1 class="mt-4 text-uppercase">Ajouter photo</h1>
        <div class="form footer-margin-bot mt-3">
            <!-- FORM -->
            <form action="<?php echo URLROOT ?>/PostController/addPhoto" method="POST" class="form-group container col-6" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Titre</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" name="title">
                </div>
                <div class="choix">
                    <div class="image">
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Image</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple name="new_image">
                        </div>
                    </div>
                    <div class="folder">
                        <div class="col-md-4">
                            <label for="folder" class="form-label">Dossier</label>
                            <select id="inputState" class="form-select" name="folder">
                              <option selected>Choisir...</option>
                              <?php foreach($data as $name) : ?>
                              <option><?php echo $name->name; ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tags">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Tag</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="tag">
                    </div>
                </div>
                <div class="description">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Ajouter" name="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</main>
    
</body>
</html>