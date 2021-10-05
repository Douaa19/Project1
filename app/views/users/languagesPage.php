<?php include_once APPROOT . '../views/inc/headerSignUp.php'; ?>

<main>
    <div class="container row p-0" id="container">
        <div class="vid col-2 p-0"></div>
        <div class="content col-10 p-0">
            <h2 class="h2" id="h2">Ajoutez une ou plusieurs langues</h2>
            <div class="form">
                <form action="<?php echo URLROOT ?>/UsersController/addLanguage" method="post" id="form">
                    <table class="table" id="table">
                        <tbody>

                            <tr id="error">
                                <?php if(!empty($data['error_message'])){ ?><h6 class="text-danger"><?php echo '*' . $data['error_message'] . '*';} ?></h6>
                            </tr>
                            
                            <tr class="light">
                                <td class="row">
                                    <label for="name_language" <?php if(!empty($data['error_name_language'])) : ?> class="text-danger" <?php endif; ?>>Langue: <span class="text-danger">*</span></label>
                                </td>
                                <td class="input">
                                    <input type="text" name="name_language" id="name_language">
                                </td>
                            </tr>
                            <tr class="dark">
                                <td class="row">
                                    <label for="level" <?php if(!empty($data['error_level'])) : ?> class="text-danger" <?php endif; ?>>Langue/Niveau: <span class="text-danger">*</span></label>
                                </td>
                                <td class="input">
                                    <input type="text" name="level" id="level">
                                </td>
                            </tr>
                            <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                            <tr class="light">
                                <td></td>
                                <td class="button">
                                    <div class="submit">
                                        <button type="ajouter" class="btn" id="btn">Ajouter</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php if(!empty($data1)) : ?>
                <div class="languages">
                    <table class="table">
                        <thead>
                            <tr class="tr" id="tr">
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
                                <td class="user">
                                    <form action="<?= URLROOT ?>/UsersController/deleteLanguage" method="post">
                                        <input type="hidden" name="id_user" value="<?php echo $language->id_user; ?>">
                                        <input type="hidden" name="id_language" value="<?php echo $language->id_language; ?>">
                                        <button type="submit" class="btn" id="submit-delete">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="submit">
                        <button type="submit" class="btn" id="btn"><a class="text-light text-decoration-none" href="<?= URLROOT ?>/UsersController/competencesPage">Suivant</a>
                        </button>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php include_once APPROOT . '../views/inc/footer.php'; ?>

</body>
</html>