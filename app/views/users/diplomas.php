<?php include_once APPROOT . '../views/inc/headerSignUp.php'; ?>


<main>
    <div class="container row p-0" id="container">
        <div class="vid col-2 p-0"></div>
        <div class="content col-10 p-0">
            <h2 class="h2" id="h2">Ajoutez un ou plusieurs diplômes</h2>
                <div class="form">
                    <form action="<?php echo URLROOT; ?>/UserController/addDiploma" method="post" id="form">
                        <table class="table" id="table">
                            <tbody>

                                <tr id="error">
                                    <h6 class="text-danger"><?php if(isset($data['error_message'])) { echo '*' . $data['error_message'] . '*'; } ?></h6>
                                </tr>
                                
                                <tr class="light">
                                        <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                                    <td class="row">
                                        <label for="diploma" <?php if(!empty($data['error_name_diploma'])) : ?> class="text-danger" <?php endif; ?>>Diplôme: <span class="text-danger">*</span></label>
                                    </td>
                                    <td class="input">
                                        <input type="text" name="name_diploma" id="diploma">
                                    </td>
                                </tr>
                                <tr class="light">
                                    <td class="row">
                                        <label for="level" <?php if(!empty($data['error_level'])) : ?> class="text-danger" <?php endif; ?>>Niveau: <span class="text-danger">*</span></label>
                                    </td>
                                    <td class="input">
                                        <input type="text" name="level" id="level">
                                    </td>
                                </tr>
                                <tr class="light">
                                    <td class="row">
                                        <label for="date_diploma" <?php if(!empty($data['error_date_diploma'])) : ?> class="text-danger" <?php endif; ?>>Date Diplôme: <span class="text-danger">*</span></label>
                                    </td>
                                    <td class="input">
                                        <input type="date" name="date_diploma" id="date_diploma">
                                    </td>
                                </tr>
                                <tr class="dark">
                                    <td class="row">
                                        <label for="etablissement" <?php if(!empty($data['error_etablissement'])) : ?> class="text-danger" <?php endif; ?>>Etablissement: <span class="text-danger">*</span></label>
                                    </td>
                                    <td class="input">
                                        <textarea name="etablissement" id="etablissement" cols="30" rows="5"></textarea>
                                    </td>
                                </tr>
                                <tr class="light">
                                    <td class="row">
                                        <label for="subject" <?php if(!empty($data['error_subject'])) : ?> class="text-danger" <?php endif; ?>>Sujet: <span class="text-danger">*</span></label>
                                    </td>
                                    <td class="input">
                                        <textarea name="subject" id="subject" cols="30" rows="5"></textarea>
                                    </td>
                                </tr>
                                <tr class="dark">
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
                    <div class="diplomas">
                            <table class="table">
                                <thead>
                                    <tr class="tr" id="tr">
                                        <th>Diplôme</th>
                                        <th>Date diplôme</th>
                                        <th>Niveau</th>
                                        <th>Etablissement</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data as $diploma) : ?>
                                    <tr>
                                        <td><?= $diploma->name_diploma; ?></td>
                                        <td><?= $diploma->date_diploma; ?></td>
                                        <td><?= $diploma->level; ?></td>
                                        <td><?= $diploma->etablissement; ?></td>
                                        <td class="user">
                                            <form action="<?= URLROOT ?>/UsersController/deleteDiploma" method="post">
                                                <input type="hidden" name="id_user" value="<?php echo $diploma->id_user; ?>">
                                                <input type="hidden" name="id_diploma" value="<?php echo $diploma->id_diploma; ?>">
                                                <button type="submit" class="btn" id="submit-delete">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="submit">
                                <button type="submit" class="btn" id="btn"><a class="text-light text-decoration-none" href="<?= URLROOT ?>/UsersController/experiencesPage">Suivant</a>
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