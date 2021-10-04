<?php include_once APPROOT . '../views/inc/header.php'; ?>
<!-- <?php var_dump($_SESSION); ?>
<?php var_dump($data1); ?> -->

<main>
    <div class="container p-0 row">
        <div class="vid p-0 col-2"></div>
        <div class="content col-10">
            <h2 class="h2">Offre d'emploi</h2>
            <div class="details">
                <?php if(!empty($data1['success_message'])) { ?><span class="success_message"><?= $data1['success_message']; ?></span><?php } ?>
                <?php if(!empty($data1['error_message'])) { ?><span class="error_message"><?= $data1['error_message']; ?></span><?php } ?>
                
                <?php if(!empty($data->title)) : ?>
                    <div class="title">
                        <span class="value" id="titte"><?= $data->title; ?></span>
                        <form action="<?= URLROOT ?>/UsersController/toApply" method="post">
                            <input type="hidden" name="id_offre" value="<?= $data->id_offre; ?>">
                            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
                            <button type="submit" class="submit">Postuler</button>
                        </form>
                    </div>
                <?php endif; ?>
                
                
                <?php if(!empty($data->date)) : ?>
                    <div class="date" id="groupe">
                        <span class="value"><?= $data->date; ?></span>
                    </div>
                <?php endif; ?>
                
                
                <?php if(!empty($data->city)) : ?>
                    <div class="city" id="groupe">
                        <span>Ville: </span>
                        <span class="value"><?= $data->city; ?></span>
                    </div>
                <?php endif; ?>
                
                
                <?php if(!empty($data->type_contrat)) : ?>
                    <div class="type_contrat" id="groupe">
                        <span>Type de contrat: </span>
                        <span class="value"><?= $data->type_contrat; ?></span>
                    </div>
                <?php endif; ?>
                
                
                <?php if(!empty($data->poste)) : ?>
                    <div class="poste" id="groupe">
                        <span>Poste: </span>
                        <p class="value"><?= $data->poste; ?></p>
                    </div>
                <?php endif; ?>
                
                
                <?php if(!empty($data->mission)) : ?>
                    <div class="mission" id="groupe">
                        <span>Mission: </span>
                        <p class="value"><?= $data->mission; ?></p>
                    </div>
                <?php endif; ?>
                
                
                <?php if(!empty($data->required_profile)) : ?>
                    <div class="required_profile" id="groupe">
                        <span>Profil recherché: </span>
                        <span class="value"><?= $data->required_profile; ?></span>
                    </div>
                <?php endif; ?>
                
                
                <?php if(!empty($data->diploma_formation)) : ?>
                    <div class="diploma_formation" id="groupe">
                        <span>Diplôme/Formation: </span>
                        <span class="value"><?= $data->diploma_formation; ?></span>
                    </div>
                <?php endif; ?>
                
                
                    <?php if(!empty($data->required_qualitie)) : ?>
                    <div class="require_quelitie" id="groupe">
                        <span>Qualités requises: </span>
                        <span class="value"><?= $data->required_qualitie; ?></span>
                    </div>
                <?php endif; ?>
                
                
                <?php if(!empty($data->place_activity)) : ?>
                    <div class="place_activity" id="groupe">
                        <span>Lieu d'activité: </span>
                        <span class="value"><?= $data->place_activity; ?></span>
                    </div>
                <?php endif; ?>
                
                
                <?php if(!empty($data->profil)) : ?>
                    <div class="profil" id="groupe">
                        <span>Profile: </span>
                        <span class="value"><?= $data->profil; ?></span>
                    </div>
                <?php endif; ?>
                
                
                <?php if(!empty($data->experience)) : ?>
                    <div class="experience" id="groupe">
                        <span>Experience: </span>
                        <span class="value"><?= $data->experience; ?></span>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</main>

<?php include_once APPROOT . '../views/inc/footer.php'; ?>

</body>
</html>