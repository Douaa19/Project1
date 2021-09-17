<?php include_once APPROOT . '../views/inc/header.php'; ?>
<?php var_dump($_SESSION); ?>

    <main class="">
        <div class="container">
            <form action="<?php echo URLROOT; ?>/UsersController/login" method="post">
            <h1 class="h3 mb-3 fw-normal">se connecter</h1>

            <div class="form-floating">
                <label for="floatingInput">Email address</label>
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            </div>
            <div class="form-floating">
                <label for="floatingPassword">Password</label>
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            </div>
                <div class="button">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">envoyer</button>
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
