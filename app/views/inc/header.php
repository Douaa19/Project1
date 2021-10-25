<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo URLROOT ?>/js/navbar.js"></script>
    <title>Login Page</title>
    <link rel="stylesheet" href="<?= URLROOT?>/css/header.css">
    <link rel="stylesheet" href="<?= URLROOT?>/css/footer.css">
    <?php if(!isset($_SESSION['id_user']) && !isset($_SESSION['id_admin'])) { ?>
    <link rel="stylesheet" href="<?= URLROOT?>/css/login.css">
    <?php } ?>
    <?php if(isset($_SESSION['id_user'])) { ?>
        <link rel="stylesheet" href="<?= URLROOT?>/css/main.css"> 
    <?php } ?>
    <?php if(isset($_SESSION['id_admin']) || isset($_SESSION['id_company'])) { ?>
        <link rel="stylesheet" href="<?= URLROOT?>/css/mainAdmin.css"> 
    <?php } ?>

</head>
<body>
    <header class="header">
        <div class="container row m-0">
            <div class="vid col-2"></div>
            <div class="nav-logo col-2 p-0">
                <div class="logo text-center">
                    <span class="">logo</span>
                </div>
            </div>
            <ul class="nav p-0 justify-content-end col-8">
                <li class="nav-item m-0">
                    <a class="nav-link" href="#">condidat</a>
                </li>
                <li class="nav-item m-0">
                    <a class="nav-link" href="#">entreprise</a>
                </li>
                <li class="nav-item m-0">
                    <a class="nav-link" href="#">tout sur tectra</a>
                </li>
                <li class="nav-item m-0">
                    <a class="nav-link" href="#">nos agences</a>
                </li>
                <li class="nav-item m-0">
                    <a class="nav-link" href="#">actualités</a>
                </li>
                <?php
                if(isset($_SESSION['id_admin'])) { ?>
                <li class="nav-item m-0">
                    <a href="#">Dashboard</a>
                    <ul>
                        <li><a href="<?= URLROOT ?>/AdminsController/dashboard">Condidats</a></li>
                        <li><a href="<?= URLROOT ?>/AdminsController/companys">Entreprises</a></li>
                    </ul>
                </li>
                <li class="nav-item m-0">
                    <a class="nav-link" href="<?= URLROOT ?>/AdminsController/logout">Déconnexion</a>
                </li>
                <?php } ?>
                <?php
                if(isset($_SESSION['id_user'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/UsersController/logoutUser">Déconnexion</a>
                </li>
                <?php } ?>
                <?php
                if(isset($_SESSION['id_company'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/CompanyController/logoutCompany">Déconnexion</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </header>

