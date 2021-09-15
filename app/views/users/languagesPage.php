<?php include_once APPROOT . '../views/inc/header.php'; ?>

<main>
    <div class="container">
        <h1 class="text-light p-2" style="background-color: #2273B9;">Langues</h1>
        <div class="container row">
            <form action="<?php echo URLROOT ?>/UsersController/addLanguage" method="post">
                <table class="table table-striped">
                    <tbody>
                        <?php if(!empty($data['error_message'])){ ?><h6 class="text-danger"><?php echo '*' . $data['error_message'] . '*';} ?></h6>
                        <tr>
                            <td>
                                <label for="name_language" <?php if(!empty($data['error_name_language'])) : ?> class="text-danger" <?php endif; ?>>Langue: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <input type="text" name="name_language" id="name_language">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="level" <?php if(!empty($data['error_level'])) : ?> class="text-danger" <?php endif; ?>>Langue/Niveau: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <input type="text" name="level" id="level">
                            </td>
                        </tr>
                        <tr>
                            <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        <tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-success text-light">Ajouter</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <?php if(!empty($data1)) : ?>
            <div class="languages">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Langues</th>
                            <th>Niveau</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $language) : ?>
                        <tr>
                            <td><?php echo $language->name_language ?></td>
                            <td><?php echo $language->level ?></td>
                            <td>
                                <form action="<?= URLROOT ?>/UsersController/deleteLanguage" method="post">
                                    <input type="hidden" name="id_user" value="<?php echo $language->id_user; ?>">
                                    <input type="hidden" name="id_language" value="<?php echo $language->id_language; ?>">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary"><a class="text-light text-decoration-none" href="<?= URLROOT ?>/UsersController/competencesPage">Suivant</a></button>
            </div>
            <?php endif; ?>
        </div>
    </div>
</main>

</body>
</html>