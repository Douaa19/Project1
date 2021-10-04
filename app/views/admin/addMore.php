<?php include_once APPROOT . '../views/inc/header.php'; ?>
<!-- <?php var_dump($data); ?> -->

<main id="main">
    <div class="container row p-0" id="container">
        <div class="vid col-2 p-0"></div>
            <div class="content col-10 p-0">
            <h2 class="h2">Ajouter un offre</h2>
            <form action="<?php echo URLROOT; ?>/AdminsController/addMoreInfos" method="post" class="" enctype="multipart/form-data">
                <div class="inputs">
                    <div id ="group" class="titre">
                        <label for="offre_emploi">Offres d'emploi: </label>
                        <input type="text" name="title" id="title">
                    </div>
                    <div id ="group" class="date">
                        <label for="cnss">CNSS: </label>
                        <input type="cnss" name="cnss" id="cnss">
                    </div>
                    <div id ="group" class="city">
                        <label for="city">Fiches de paie: </label>
                        <input type="text" name="city" id="city">
                    </div>
                    <div id ="group" class="type_contrat">
                        <label for="type_contrat">Attestations: </label>
                        <input type="text" name="type_contrat" id="type_contrat">
                    </div>
                    <div id ="group" class="type_contrat">
                        <label for="type_contrat">Dossiers de maladie: </label>
                        <input type="text" name="type_contrat" id="type_contrat">
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