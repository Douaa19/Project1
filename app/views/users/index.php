<?php include_once APPROOT . '../views/inc/header.php'; ?>

    <main class="">
        <div class="container">
            <form action="<?php echo URLROOT; ?>/UsersController/login" method="post">
            <h1 class="h3 mb-3 fw-normal">se connecter</h1>
            <div class="email">
                <label for="floatingInput" <?php if(!empty($data['error_email'])) { ?>" class="text-danger" <?php } ?> <?php if(!empty($data['existe_email'])) { ?> class="text-success" <?php } ?>>Email address</label>
                <input type="email" name="email" class="form-control" id="floatingInput" value="<?php if(!empty($data['email'])) { echo $data['email']; } ?>" >
                <?php if(!empty($data['error_email'])) { ?><h6 class ="text-danger">*<?php echo $data['error_email']; ?>*</h6><?php } ?>
                <?php if(!empty($data['existe_email'])) { ?><h6 class ="text-success">*<?php echo $data['existe_email']; ?>*</h6><?php } ?>
            </div>
            <div class="password">
                <label for="floatingPassword" <?php if(!empty($data['error_password'])) { ?> class="text-danger" <?php } ?>>Password</label>
                <input type="password" name="password" class="form-control" id="floatingPassword">
                <?php if(!empty($data['error_password'])) { ?><h6 class ="text-danger">*<?php echo $data['error_password']; ?>*</h6><?php } ?>
            </div>
                <div class="button">
                    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">envoyer</button>
                    <span class="mt-5 mb-3 text-muted text-uppercase">vous n'avez pas du compte <a href="<?php echo URLROOT; ?>/UsersController/signUp">inscivez-vous!</a></span>
                </div>
            </form>
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="text-muted">
                
            </span>
        </div>
    </footer>

    <script src="../assets/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>
