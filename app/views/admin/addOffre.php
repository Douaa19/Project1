<?php include_once APPROOT . '../views/inc/header.php'; ?>
<?php var_dump($data); ?>

<main id="main">
    <div class="container row p-0" id="container">
        <div class="vid col-2 p-0"></div>
            <div class="add col-10 p-0">
            <h2 class="h2">Espace condidature</h2>
            <form action="<?php echo URLROOT; ?>/AdminsController/addOffre" method="post" class="" enctype="multipart/form-data">
                <div class="titre">
                    <label for="title">Titre: </label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="date">
                    <label for="date">Date: </label>
                    <input type="date" name="date" id="date">
                </div>
                <div class="city">
                    <label for="city">Ville: </label>
                    <input type="text" name="city" id="city">
                </div>
                <div class="type_contrat">
                    <label for="type_contrat">Type de contrat: </label>
                    <input type="text" name="type_contrat" id="type_contrat">
                </div>
                <div class="poste">
                    <label for="">Poste: </label>
                    <textarea name="poste" id="poste" cols="40" rows="5"></textarea>
                </div>
                <div class="mission">
                    <label for="mission">Mission</label>
                    <textarea name="mission" id="mission" cols="40" rows="5"></textarea>
                </div>
                <div class="required_profile">
                    <label for="required_profile">Profil recherché: </label>
                    <input type="text" name="required_profile" id="required_profile">
                </div>
                <div class="diploma_formation">
                    <label for="diploma_formation">Diplôme/Formation: </label>
                    <input type="text" name="diploma_formation" id="diploma_formation">
                </div>
                <div class="required_qualitie">
                    <label for="required_qualitie">Qualités requises: </label>
                    <input type="text" name="required_qualitie" id="required_qualitie">
                </div>
                <div class="place_activity">
                    <label for="place_activity">Lieu d'activité: </label>
                    <input type="text" name="place_activity" id="place_activity">
                </div>
                <div class="profil">
                    <label for="profil">Profil: </label>
                    <input type="text" name="profil" id="profil">
                </div>
                <div class="experience">
                    <label for="experience">Experience: </label>
                    <input type="text" name="experience" id="experience">
                </div>
                
                <div class="button">
                    <button type="submit">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- <?php include_once APPROOT . '../views/inc/footer.php'; ?> -->

</body>
</html>