<?php include_once APPROOT . '../views/inc/headerSignUp.php'; ?>
<!-- <?php echo '<pre>'; ?>
<?php var_dump($data); ?>
<?php echo '</pre>'; ?>
<?php echo '<pre>'; ?>
<?php var_dump($_SESSION); ?>
<?php echo '</pre>'; ?> -->

<main>
    <div class="container row p-0" id="container">
    <div class="vid col-2 p-0"></div>
        <div class="content col-10 p-0">
            <div class="form">
                <form action="<?php echo URLROOT; ?>/UsersController/completCreationUser" method="post" id="form">
                    <table class="table" id="table">
                        <tbody>

                            <tr id="error">
                                <?php if(!empty($data['error_message'])){ ?><h6 class="text-danger"><?php echo '*' . $data['error_message'] . '*'; ?></h6><?php } ?>
                            </tr>

                            <tr class="light">
                                <td class="row">
                                    <label for="email">Entrer votre adresse Email d'authentification: <span class="text-danger">*</span></label>
                                </td>
                                <td class="input">
                                    <input type="email" name="email" id="email" <?php if(!empty($data1)) { ?> value="<?php echo $data1->email; ?>" <?php }else { ?> value="<?php echo $data['email']->email; ?>" <?php } ?>>
                                </td>
                            </tr>
                            <tr class="dark">
                                <td class="row">
                                    <label for="password" <?php if(!empty($data['error_password'])) : ?> class="text-danger" <?php endif; ?>>Créer Votre mot de passe: <span class="text-danger">*</span></label>
                                </td>
                                <td class="input">
                                    <input type="password" name="password" id="password">
                                </td>
                            </tr>
                            <tr class="light">
                                <td class="row">
                                    <label for="check_password" <?php if(!empty($data['error_check'])) : ?> class="text-danger" <?php endif; ?>>Confirmer votre mot de passe: <span class="text-danger">*</span></label>
                                </td>
                                <td class="input">
                                    <input type="password" name="check_password" id="check_password">
                                </td>
                            </tr>
                            <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                            <tr class="dark">
                                <td></td>
                                <td class="button">
                                    <div class="submit">
                                        <button type="submit" class="btn" id="btn">Envoyer</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include_once APPROOT . '../views/inc/footer.php'; ?>

</body>
</html>