<?php include_once APPROOT . '../views/inc/header.php'; ?>
<!-- <?php var_dump($data); ?> -->

<main>
    <div class="container row p-0">
        <div class="vid col-2 p-0"></div>
        <div class="content col-10 p-0">
            <h2 class="h2">offres</h2>
            <div class="addButton">
                <button class="btn" type="submit"><a href="<?= URLROOT ?>/AdminsController/addOffrePage" class="text-light">Ajouter offre</a></button>
            </div>
            <div class="row cards">
                <?php if (!empty($data)) { ?>
                <?php foreach($data as $offre) : ?>
                <div class="card col-5">
                    <?php if(!empty($offre->title)) : ?>
                        <div class="group">
                            <span class="value title"><?= $offre->title; ?></span>
                        </div>
                    <?php endif; ?>
                    <div class="tooGroups">
                        <?php if(!empty($offre->city)) : ?>
                            <div class="group">
                                <span class="T">Ville: </span>
                                <span class="value"><?=     $offre->city; ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($offre->date)) : ?>
                            <div class="group">
                                <span class="T"></span>
                                <span class="value"><?=     $offre->date; ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if(!empty($offre->type_contrat)) : ?>
                        <div class="group">
                            <span class="T">Type de contrat: </span>
                            <span class="value"><?= $offre->type_contrat; ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($offre->poste)) : ?>
                        <div class="group">
                            <span class="T">Poste: </span>
                            <p  class="value"><?= $offre->poste; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($offre->mission)) : ?>
                        <div class="group">
                            <span class="T">Mission: </span>
                            <p  class="value"><?= $offre->mission; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($offre->required_profile)) : ?>
                        <div class="group">
                            <span  class="T">Profil recherché: </span>
                            <span class="value"><?= $offre->required_profile ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($offre->diploma_formation)) : ?>
                        <div class="group">
                            <span  class="T">Diplôme/Formation: </span>
                            <span class="value"><?= $offre->diploma_formation ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($offre->required_qualitie)) : ?>
                        <div class="group">
                            <span  class="T">Qualités requises: </span>
                            <span class="value"><?= $offre->required_qualitie ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($offre->place_activity)) : ?>
                        <div class="group">
                            <span  class="T">Lieu d'activité: </span>
                            <span class="value"><?= $offre->place_activity ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($offre->profil)) : ?>
                        <div class="group">
                            <span class="T">Profile: </span>
                            <span class="value"><?= $offre->profil; ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($offre->experience)) : ?>
                        <div class="group">
                            <span class="T">Experience: </span>
                            <span class="value"><?= $offre->experience; ?></span>
                        </div>
                    <?php endif; ?>
                    <form action="<?= URLROOT ?>/AdminsController/deleteOffre" method="post">
                        <input type="hidden" name="id_offre" value="<?= $offre->id_offre; ?>">
                        <button type="submit" class="btn">Supprimer</button>
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

<?php include_once APPROOT . '../views/inc/footer.php'; ?>
</body>
</html>