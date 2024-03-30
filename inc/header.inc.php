<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link for google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <!-- link for Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link for Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Link for CSS -->
    <link rel="stylesheet" href="./assets/style/style.css">
    <title><?= $title ?></title>
</head>

<body>
    <header class="container-fluid">
        <section class="en-tete row">
            <!-- Navbar --> <!-- Logo -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand col-sm-12 col-md-1 p-2 mx-auto" href="#">
                        <img src="./assets/img/logo_livres.png" alt="Logo" height="100">
                    </a>
                    <!-- Menu Navigation -->
                    <ul class="navbar-nav col-sm-12 d-flex col-md-10 mx-auto">
                        <li class="nav-item p-2">
                            <a class="nav-link text-white" href="index.php">ACCUEIL</a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="nav-link text-white" href="#">LES LIVRES</a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="nav-link text-white" href="#">A PROPOS</a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="nav-link text-white" href="payment.php">PAIEMENT SECURISE</a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="nav-link text-white" href="#">EXPEDITION ET RETOUR</a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="nav-link text-white" href="contactez_nous.php">CONTACT NOUS</a>
                        </li>

                        <!-- Login -->
                        <div class="mx-auto">
                            <a class="nav-link" href="#" id="dropdownIcon">
                                <i class="bi bi-person-circle text-white display-6 col-sm-12 col-md-3"></i>
                            </a>

                            <div id="dropdownMenu" class="dropdown-menu col-sm-12 col-md-1 text-center">
                                <a class="enregistrement choice text-center" href="#">Enregistrement</a>
                                <a class="login choice text-center" href="#">Commencer la session</a>
                            </div>
                        </div>


                        <!-- Cart -->
                        <a class="nav-link mx-auto" href="#">
                            <i class="bi bi-cart-fill text-white col-sm-12 col-md-3 display-6"></i>
                        </a>
                    </ul>
                </div>
        </section>
        <!-- title -->
    </header>