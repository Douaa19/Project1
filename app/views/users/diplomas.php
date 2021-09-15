<?php include_once APPROOT . '../views/inc/header.php'; ?>



<main>
    <div class="container">
        <h1 class="text-light p-2" style="background-color: #2273B9;">Diplômes</h1>
        <div class="container row">
            <div class="form">
                <form action="<?php echo URLROOT; ?>/UserController/addDiploma" method="post">
                    <table class="table table-striped">
                        <tbody>
                            <h6 class="text-danger"><?php if(isset($data['error_message'])) { echo '*' . $data['error_message'] . '*'; } ?></h6>
                            <tr>
                                    <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                                <td>
                                    <label for="diploma" <?php if(!empty($data['error_name_diploma'])) : ?> class="text-danger" <?php endif; ?>>Diplôme: <span class="text-danger">*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="name_diploma" id="diploma">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="level" <?php if(!empty($data['error_level'])) : ?> class="text-danger" <?php endif; ?>>Niveau: <span class="text-danger">*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="level" id="level">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="date_diploma" <?php if(!empty($data['error_date_diploma'])) : ?> class="text-danger" <?php endif; ?>>Date Diplôme: <span class="text-danger">*</span></label>
                                </td>
                                <td>
                                    <input type="date" name="date_diploma" id="date_diploma">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="etablissement" <?php if(!empty($data['error_etablissement'])) : ?> class="text-danger" <?php endif; ?>>Etablissement: <span class="text-danger">*</span></label>
                                </td>
                                <td>
                                    <textarea name="etablissement" id="etablissement" cols="30" rows="5"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="subject" <?php if(!empty($data['error_subject'])) : ?> class="text-danger" <?php endif; ?>>Sujet: <span class="text-danger">*</span></label>
                                </td>
                                <td>
                                    <textarea name="subject" id="subject" cols="30" rows="5"></textarea>
                                </td>
                            </tr>
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
                <div class="diplomas mb-5 mt-3">
                        <table class="table">
                            <thead>
                                <tr>
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
                                    <td>
                                        <form action="<?= URLROOT ?>/UsersController/deleteDiploma" method="post">
                                            <input type="hidden" name="id_user" value="<?php echo $diploma->id_user; ?>">
                                            <input type="hidden" name="id_diploma" value="<?php echo $diploma->id_diploma; ?>">
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary"><a class="text-light text-decoration-none" href="<?= URLROOT ?>/UsersController/experiencesPage">Suivant</a></button>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

</body>
</html>