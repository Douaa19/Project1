<?php include_once APPROOT . '../views/inc/header.php'; ?>

<main>
    <div class="container">
        <h1 class="text-light p-2" style="background-color: #2273B9;">Competences</h1>
        <div class="container row">
            <form action="<?php echo URLROOT; ?>/UsersController/addCompetence" method="post">
                <table class="table table-striped">
                    <tbody>
                        <?php if(!empty($data['error_message'])){ ?><h6 class="text-danger"><?php echo '*' . $data['error_message'] . '*';} ?></h6>
                        <tr>
                            <td>
                                <label for="name_competence" <?php if(!empty($data['error_name_competence'])) : ?> class="text-danger" <?php endif; ?>>Langue: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <input type="text" name="name_competence" id="name_competence">
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
        </div>
    </div>
</main>