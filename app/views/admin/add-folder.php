<?php include_once APPROOT . '../views/inc/header-dash-pvf.php'; ?>


<main class="row m-0">
    <div class="container col-10">
        <h1 class="m-3 text-uppercase">Ajouter dossier</h1>
        <div class="form footer-margin-bot mt-3">
            <form action="<?php echo URLROOT ?>/PostController/insertFolder" method="POST" class="form-group container col-6" enctype="multipart/form-data">
            <div class="error text-center text-danger"><?php if (isset($data['error'])) { echo $data['error'] . '!'; } ?></div>
                <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">Nom</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" name="name">
                </div>
                <div class="choix">
                    <div class="image">
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">image</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple name="new_image">
                        </div>
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