<?php include_once APPROOT . '../views/inc/headerSignUp.php'; ?>

<main>
    <div class="container row p-0" id="container">
        <div class="vid col-2 p-0"></div>
        <div class="content col-10 p-0">
            <h2 class="h2" id="h2">Ajoutez une ou plusieurs compétences en informatique</h2>
            <div class="form">
                <form action="<?php echo URLROOT; ?>/UsersController/addCompetence" method="post" id="form">
                    <table class="table" id="table">
                        <tbody>

                        <tr id="error">
                            <?php if(!empty($data['error_message'])){ ?><h6 class="text-danger"><?php echo '*' . $data['error_message'] . '*';} ?></h6>
                        </tr>
                            
                            <tr class="light">
                                <td class="row">
                                    <label for="name_competence" <?php if(!empty($data['error_name_competence'])) : ?> class="text-danger" <?php endif; ?>>Competence: <span class="text-danger">*</span></label>
                                </td>
                                <td class="input">
                                    <input type="text" name="name_competence" id="name_competence">
                                </td>
                            </tr>
                                <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                            <tr class="dark">
                                <td></td>
                                <td class="button">
                                    <div class="submit">
                                        <button type="submit" class="btn" id="btn">Ajouter</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php if(!empty($data1)) : ?>
                <div class="competences">
                    <table class="table">
                        <thead>
                            <tr class="tr" id="tr">
                                <th>Competence</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $competence) : ?>
                            <tr>
                                <td><?php echo $competence->name_competence ?></td>
                                <td class="user">
                                    <form action="<?= URLROOT ?>/UsersController/deleteCompetence" method="post">
                                        <input type="hidden" name="id_user" value="<?php echo $competence->id_user; ?>">
                                        <input type="hidden" name="id_competence" value="<?php echo $competence->id_competence; ?>">
                                        <button type="submit" class="btn" id="submit-delete">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <form action="<?= URLROOT ?>/UsersController/infosLogin" method="post">
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        <div class="submit">
                            <button type="submit" class="btn" id="btn">Suivant</button>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>