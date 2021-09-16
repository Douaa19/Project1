<?php include_once APPROOT . '../views/inc/header.php'; ?>

<main>
    <div class="container">
        <div class="container row">
            <form action="<?php echo URLROOT; ?>/UsersController/infosLogin" method="post">
                <table class="table table-striped">
                    <tbody>
                        <?php if(!empty($data['error_message'])){ ?><h6 class="text-danger"><?php echo '*' . $data['error_message'] . '*';} ?></h6>
                        <tr>
                            <td>
                                <label for="email" <?php if(!empty($data['error_email'])) : ?> class="text-danger" <?php endif; ?>>Entrer votre adresse Email d'authentification: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <input type="email" name="email" id="email">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="password">Créer Votre mot de passe: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <input type="password" name="password" id="password">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="check_password">Confirmer votre mot de passe: <span class="text-danger">*</span></label>
                            </td>
                            <td>
                                <input type="password" name="check_password" id="check_password">
                            </td>
                        </tr>
                        <tr>
                            <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        <tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary text-light">Envoyer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</main>