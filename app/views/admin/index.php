<?php include_once APPROOT . '../views/inc/header.php'; ?>

    <main>
        <div class="container row p-0">
            <div class="vid col-2 p-0"></div>
            <div class="contents col-10">
                <h1 class="h1">se connecter Admin</h1>
                <form action="<?php echo URLROOT; ?>/AdminsController/loginSuperAdmin" method="post">
                    <?php if(!empty($data['error_message'])) ?><h6 class="text-danger"><?php echo $data['error_message']; ?></h6>
                    <div class="email" id="infos">
                        <label for="floatingInput">Email address</label>
                        <input type="email" name="email" class="form-control" id="floatingInput" value="<?php if(empty($data['error_email'])) { echo $data['email']; }?>">
                    </div>
                    <?php if(!empty($data['error_email'])) {?><h6 class="text-danger"><?php echo $data['error_email']; ?></h6><?php }?>
                    <div class="password" id="infos">
                        <label for="floatingPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="floatingPassword">
                    </div>
                    <?php if(!empty($data['error_password'])) {?><h6 class="text-danger"><?php echo $data['error_password']; ?></h6><?php }?>
                    <div class="button">
                        <button class="btn btn-primary" type="submit">se connecter</button>
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