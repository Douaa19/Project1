<?php include_once APPROOT . '../views/inc/header.php'; ?>

    <main>
        <div class="container">
            <form action="<?php echo URLROOT; ?>/AdminsController/loginSuperAdmin" method="post">
                <h1 class="h3 mb-3 fw-normal">se connecter</h1>
                <div class="email">
                    <label for="floatingInput">Email address</label>
                    <input type="email" name="email" class="form-control" id="floatingInput"">
                </div>
                <div class="password">
                    <label for="floatingPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="floatingPassword">
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