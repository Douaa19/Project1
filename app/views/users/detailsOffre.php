<?php include_once APPROOT . '../views/inc/header.php'; ?>

<main>
    <div class="container p-0 row">
        <div class="vid p-0 col-2"></div>
        <div class="content col-10">
            <h2>Offre d'emploi</h2>
            <div class="details">
                <div class="title">
                    <?php if(!empty($data->title)) : ?>
                        <span class="value" id="titte"><?= $data->title; ?></span>
                        <form action="<?= URLROOT ?>/UsersController/toApply" method="post">
                            <input type="hidden" name="id_offre" value="<?= $data->id_offre; ?>">
                            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">
                            <button type="submit" class="btn btn-success">Postuler</button>
                        </form>
                    <?php endif; ?>
                </div>
                <div class="date">
                    <?php if(!empty($data->date)) : ?>
                        <span class="value"><?= $data->date; ?></span>
                    <?php endif; ?>
                </div>
                <div class="city">
                    <?php if(!empty($data->city)) : ?>
                        <span>Ville: </span>
                        <span class="value"><?= $data->city; ?></span>
                    <?php endif; ?>
                </div>
                <div class="type_contrat">
                    <?php if(!empty($data->type_contrat)) : ?>
                        <span>Type de contrat: </span>
                        <span class="value"><?= $data->type_contrat; ?></span>
                    <?php endif; ?>
                </div>
                <div class="poste">
                    <?php if(!empty($data->poste)) : ?>
                        <span>Poste: </span>
                        <p class="value"><?= $data->poste; ?></p>
                    <?php endif; ?>
                </div>
                <div class="mission">
                    <?php if(!empty($data->mission)) : ?>
                        <span>Mission: </span>
                        <p class="value"><?= $data->mission; ?></p>
                    <?php endif; ?>
                </div>
                <div class="required_profile">
                    <?php if(!empty($data->required_profile)) : ?>
                        <span>Profil recherché: </span>
                        <span class="value"><?= $data->required_profile; ?></span>
                    <?php endif; ?>
                </div>
                <div class="diploma_formation">
                    <?php if(!empty($data->diploma_formation)) : ?>
                        <span>Diplôme/Formation: </span>
                        <span class="value"><?= $data->diploma_formation; ?></span>
                    <?php endif; ?>
                </div>
                <div class="require_quelitie">
                    <?php if(!empty($data->required_qualitie)) : ?>
                        <span>Qualités requises: </span>
                        <span class="value"><?= $data->required_qualitie; ?></span>
                    <?php endif; ?>
                </div>
                <div class="place_activity">
                    <?php if(!empty($data->place_activity)) : ?>
                        <span>Lieu d'activité: </span>
                        <span class="value"><?= $data->place_activity; ?></span>
                    <?php endif; ?>
                </div>
                <div class="profil">
                    <?php if(!empty($data->profil)) : ?>
                        <span>Profile: </span>
                        <span class="value"><?= $data->profil; ?></span>
                    <?php endif; ?>
                </div>
                <div class="experience">
                    <?php if(!empty($data->experience)) : ?>
                        <span>Experience: </span>
                        <span class="value"><?= $data->experience; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>