<?php include_once APPROOT . '../views/inc/header.php'; ?>
<!-- <?php var_dump($data); ?> -->

<main id="main">
    <div class="container row p-0" id="container">
        <div class="vid col-2 p-0"></div>
            <div class="content col-10 p-0">
            <h2 class="h2">Ajouter un offre</h2>
            <form action="<?php echo URLROOT; ?>/AdminsController/addMoreInfos" method="post" class="" enctype="multipart/form-data">
                <div class="inputs">
                    <div id ="group" class="offre_emploi">
                        <label for="offre_emploi">Offres d'emploi: </label>
                        <input type="file" name="offre_emploi" id="offre_emploi" webkitdirectory="true" multiple>
                    </div>
                    <div id ="group" class="cnss">
                        <label for="cnss">CNSS: </label>
                        <input type="file" name="cnss" id="cnss" webkitdirectory="true" multiple>
                    </div>
                    <div id ="group" class="certificate">
                        <label for="certificate">Fiches de paie: </label>
                        <input type="file" name="certificate" id="certificate" webkitdirectory="true" multiple>
                    </div>
                    <div id ="group" class="illness_records">
                        <label for="illness_records">Attestations: </label>
                        <input type="file" name="illness_records" id="illness_records" webkitdirectory="true" multiple>
                    </div>
                    <div id ="group" class="illness_records">
                        <label for="pay_sheets">Dossiers de maladie: </label>
                        <input type="file" name="pay_sheets" id="pay_sheets" webkitdirectory="true" multiple>
                    </div>
                    <input type="hidden" name="id_user" value="<?= $data; ?>">

                    <div class="button">
                        <button type="submit">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include_once APPROOT . '../views/inc/footer.php'; ?>

</body>
</html>