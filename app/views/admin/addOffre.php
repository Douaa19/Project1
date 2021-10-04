<?php include_once APPROOT . '../views/inc/header.php'; ?>
<!-- <?php var_dump($data); ?> -->

<main id="main">
    <div class="container row p-0" id="container">
        <div class="vid col-2 p-0"></div>
            <div class="content col-10 p-0">
            <h2 class="h2">Ajouter un offre</h2>
            <form action="<?php echo URLROOT; ?>/AdminsController/addOffre" method="post" class="" enctype="multipart/form-data">
                <div class="inputs">
                    <div id ="group" class="titre">
                        <label for="title">Titre: </label>
                        <input type="text" name="title" id="title">
                    </div>
                    <div id ="group" class="date">
                        <label for="date">Date: </label>
                        <input type="date" name="date" id="date">
                    </div>
                    <div id ="group" class="city">
                        <label for="city">Ville: </label>
                        <input type="text" name="city" id="city">
                    </div>
                    <div id ="group" class="type_contrat">
                        <label for="type_contrat">Type de contrat: </label>
                        <input type="text" name="type_contrat" id="type_contrat">
                    </div>
                    <div id ="group" class="poste">
                        <label for="">Poste: </label>
                        <textarea name="poste" id="poste" cols="21" rows="5"></textarea>
                    </div>
                    <div id ="group" class="mission">
                        <label for="mission">Mission: </label>
                        <textarea name="mission" id="mission" cols="21" rows="5"></textarea>
                    </div>
                    <div id ="group" class="required_profile">
                        <label for="required_profile">Profil recherché: </label>
                        <input type="text" name="required_profile" id="required_profile">
                    </div>
                    <div id ="group" class="diploma_formation">
                        <label for="diploma_formation">Diplôme/Formation: </label>
                        <input type="text" name="diploma_formation" id="diploma_formation">
                    </div>
                    <div id ="group" class="required_qualitie">
                        <label for="required_qualitie">Qualités requises: </label>
                        <textarea name="required_qualitie" id="required_qualitie" cols="21" rows="5"></textarea>
                    </div>
                    <div id ="group" class="place_activity">
                        <label for="place_activity">Lieu d'activité: </label>
                        <input type="text" name="place_activity" id="place_activity">
                    </div>
                    <div id ="group" class="profil">
                        <label for="profil">Profil: </label>
                        <input type="text" name="profil" id="profil">
                    </div>
                    <div id ="group" class="experience">
                        <label for="experience">Experience: </label>
                        <input type="text" name="experience" id="experience">
                    </div>

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