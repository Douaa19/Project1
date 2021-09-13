<?php include_once APPROOT . '../views/inc/header.php'; ?>



<main>
    <div class="container">
        <h1 class="text-light p-2" style="background-color: #2273B9;">Diplômes</h1>
        <div class="container row">
            <div class="form">
                <form action="<?php echo URLROOT; ?>/UserController/addDiploma" method="post">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                    <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                                <td>
                                    <label for="diploma" >Diplôme: <span class="text-danger">*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="name_diploma" id="diploma">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="level" >Niveau: <span class="text-danger">*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="level" id="level">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="date_diploma" >Date Diplôme: <span class="text-danger">*</span></label>
                                </td>
                                <td>
                                    <input type="date" name="date_diploma" id="date_diploma">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="etablissement" >Etablissement: <span class="text-danger">*</span></label>
                                </td>
                                <td>
                                    <textarea name="etablissement" id="etablissement" cols="30" rows="5"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="subject" >Sujet: <span class="text-danger">*</span></label>
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
                <div class="diplomas">
                    <?php if(!empty($data->id_diploma)) { ?>
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
                                        <input type="text" name="id_user" value="<?php echo $diploma->id_user; ?>">
                                        <input type="text" name="id_diploma" value="<?php echo $diploma->id_diploma; ?>">
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>