<?php include_once APPROOT . '../views/inc/header.php'; ?>
<!-- <?php var_dump($data); ?> -->

<main>
    <div class="container row p-0">
        <div class="vid col-2 p-0"></div>
        <div class="content col-10 p-0">
            <h1>offres</h1>
            <div class="addButton">
                <button class="btn btn-primary" type="submit"><a href="<?= URLROOT ?>/AdminsController/addOffrePage" class="text-light">Ajouter</a></button>
            </div>
            <div class="row cards">
                <?php if (!empty($data)) { ?>
                <?php foreach($data as $offre) : ?>
                <div class="card col-5">
                    <?php if(!empty($offre->title)) : ?>
                        <span class="col-6">Titre: <?= $offre->title; ?></span>
                    <?php endif; ?>
                    <?php if(!empty($offre->date)) : ?>
                        <span class="col-6"><?= $offre->date; ?></span>
                    <?php endif; ?>
                    <?php if(!empty($offre->city)) : ?>
                        <span class="col-12">Ville: <?= $offre->city; ?></span>
                    <?php endif; ?>
                    <?php if(!empty($offre->type_contrat)) : ?>
                        <span class="col-12">Type de contrat: <?= $offre->type_contrat; ?></span>
                    <?php endif; ?>
                    <?php if(!empty($offre->poste)) : ?>
                        <span class="col-12">Poste: </span>
                        <p class="col-12"><?= $offre->poste; ?></p>
                    <?php endif; ?>
                    <?php if(!empty($offre->mission)) : ?>
                        <span class="col-12">Mission: </span>
                        <p class="col-12"><?= $offre->mission; ?></p>
                    <?php endif; ?>
                    <?php if(!empty($offre->required_profile)) : ?>
                        <span  class="col-12">Profil recherché: <?= $offre->required_profile ?></span>
                    <?php endif; ?>
                    <?php if(!empty($offre->diploma_formation)) : ?>
                        <span  class="col-12">Diplôme/Formation: <?= $offre->diploma_formation ?></span>
                    <?php endif; ?>
                    <?php if(!empty($offre->required_qualitie)) : ?>
                        <span  class="col-12">Qualités requises: <?= $offre->required_qualitie ?></span>
                    <?php endif; ?>
                    <?php if(!empty($offre->place_activity)) : ?>
                        <span  class="col-12">Lieu d'activité: <?= $offre->place_activity ?></span>
                    <?php endif; ?>
                    <?php if(!empty($offre->profil)) : ?>
                        <span class="col-12">Profile: <?= $offre->profil; ?></span>
                    <?php endif; ?>
                    <?php if(!empty($offre->experience)) : ?>
                        <span class="col-12">Experience: <?= $offre->experience; ?></span>
                    <?php endif; ?>
                    <form action="<?= URLROOT ?>/AdminsController/deleteOffre" method="post">
                        <input type="hidden" name="id_offre" value="<?= $offre->id_offre; ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
                <?php endforeach; ?>
                <?php }else{ ?>
                    <span>Aucun offre trouvé!</span>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<!-- <?php include_once APPROOT . '../views/inc/footer.php'; ?> -->
</body>
</html>