<?php include_once APPROOT . '../views/inc/header.php'; ?>

    <main>
        <div class="container">
            <form action="<?php echo URLROOT; ?>/AdminsController/loginSuperAdmin" method="post">
                <h1 class="h3 mb-3 fw-normal">se connecter Admin</h1>
                <?php if(!empty($data['error_message'])) ?><h6 class="text-danger"><?php echo $data['error_message']; ?></h6>
                <div class="email">
                    <label for="floatingInput">Email address</label>
                    <input type="email" name="email" class="form-control" id="floatingInput" value="<?php if(empty($data['error_email'])) { echo $data['email']; }?>">
                    <?php if(!empty($data['error_email'])) {?><h6 class="text-danger"><?php echo $data['error_email']; ?></h6><?php }?>
                </div>
                <div class="password">
                    <label for="floatingPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="floatingPassword">
                    <?php if(!empty($data['error_password'])) {?><h6 class="text-danger"><?php echo $data['error_password']; ?></h6><?php }?>
                </div>
                    <div class="button">
                    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">se connecter</button>
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