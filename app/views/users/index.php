<?php include_once APPROOT . '../views/inc/header.php'; ?>
<!-- <?php var_dump($data); ?>
<?php var_dump($_SESSION); ?> -->
    <main class="">
        <div class="container row p-0">
            <div class="vid col-2 p-0"></div>
            <div class="contents col-10">
                <h1 class="h1 mb-3 fw-normal">Se connecter</h1>
                <form action="<?php echo URLROOT; ?>/UsersController/login" method="post">
                    <div class="email">
                        <label for="floatingInput" <?php if(!empty($data['error_email'])) { ?>" class="text-danger" <?php } ?> <?php if(!empty($data['existe_email'])) { ?> class="text-success" <?php } ?>>Email address:</label>
                        <input type="email" name="email" class="form-control" id="floatingInput" value="<?php if(!empty($data['email'])) { echo $data['email']; } ?>" >
                        <?php if(!empty($data['error_email'])) { ?><h6 class ="text-danger">*<?php echo $data['error_email']; ?>*</h6><?php } ?>
                        <?php if(!empty($data['existe_email'])) { ?><h6 class ="text-success">*<?php echo $data['existe_email']; ?>*</h6><?php } ?>
                    </div>
                    <div class="password">
                        <label for="floatingPassword" <?php if(!empty($data['error_password'])) { ?> class="text-danger" <?php } ?>>Mot de passe:</label>
                        <input type="password" name="password" class="form-control" id="floatingPassword">
                        <?php if(!empty($data['error_password'])) { ?><h6 class ="text-danger">*<?php echo $data['error_password']; ?>*</h6><?php } ?>
                    </div>
                    <div class="button">
                        <button class="btn btn-primary" type="submit">envoyer</button>
                        <span class="right mt-5 mb-3 text-muted text-uppercase">vous n'avez pas du compte <a href="<?php echo URLROOT; ?>/UsersController/signUp">inscivez-vous!</a></span>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="../assets/dist/js/bootstrap.bundle.min.js">
    </script>
    <?php include_once APPROOT . '../views/inc/footer.php'; ?>

</body>
</html>
