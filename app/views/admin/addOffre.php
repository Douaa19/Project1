<?php include_once APPROOT . '../views/inc/header.php'; ?>

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
                <div class="profil">
                    <label for="profil">Profil: </label>
                    <input type="text" name="profil" id="profil">
                </div>
                <div class="experience">
                    <label for="experience">Experience: </label>
                    <input type="text" name="experience" id="experience">
                </div>
                <button type="submit">Ajouter</button>
            </form>
        </div>
    </div>
</main>

<?php include_once APPROOT . '../views/inc/footer.php'; ?>

</body>
</html>