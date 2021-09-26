<?php include_once APPROOT . '../views/inc/header.php'; ?>
<!-- <?php var_dump($_SESSION); ?> -->

<main>
    <div class="container row">
        <div class="vid col-2"></div>
        <div class="content col-10">
            <h1>Hello</h1>
            <form action="<?= URLROOT ?>/UsersController/logoutUser" method="post">
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
                <button class="btn btn-light">Déconnecter</button>
            </form>
        </div>
        
    </div>
</main>

<?php include_once APPROOT . '../views/inc/footer.php'; ?>
</body>
</html>