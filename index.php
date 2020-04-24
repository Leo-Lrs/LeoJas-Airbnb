<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/css/axentix.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    
</head>

<?php require_once 'includes/admin_functions.php' ?>
<?php AddUser() ?>
<?php login() ?>
<?php logout() ?>

<body class="layout with-sidenav fixed-sidenav under-navbar">
    <header>
        <div class="navbar-fixed">
            <nav class="navbar primary white">
                <a class="navbar-logo hide-sm-down centered">
                    <img src="img/logo.png" alt="AirB&B" />
                </a>
                <a class="navbar-brand hide-sm-down"> AIRBNB </a>
                <button data-target="example-sidenav" class="sidenav-trigger btn small black hide-md-up hide-sx shadow-0">
                    <i class="fas fa-bars"></i>
                    Menu
                </button>
                <?php nav() ?>
            </nav>
        </div>
    </header>

    <div id="example-sidenav" class="sidenav white">
        <div class="sidenav-header hide-md-up">
            <button data-target="example-sidenav" class="sidenav-trigger btn small white hide-md-up hide-xs shadow-0">
                <i class="fas fa-times"></i>
                <img class="logo1" src="img/logo1.png">
            </button>
        </div>
        <div class="hide-md-up">
            <a class="sidenav-link" href="pages/annonces.php">Annonces</a>
            <a class="sidenav-link" href="pages/add_annonce.php">Publier une annonce</a>
            <div class="divider"></div>
        </div>
        <button class="collapsible-trigger sidenav-link active" data-target="example-collapsible"> Profil</button>
        <div>
            <div class="collapsible" id="example-collapsible" style="transition-duration: 300ms; display: block; max-height: 192px;">
                <a href="page/profil.php" class="sidenav-link"> Mon compte </a>
                <a href="page/mes_annonces.php" class="sidenav-link"> Mes annonces </a>
                <button id="btn_signout" type="submit" name="deco" class="sidenav-link"> Se deconnecter </button>
            </div>
        </div>
    </div>

    <img src="img/background_index.jpg" class="background_img1">
    <h3> Bienvenue sur AIRBNB </h3>

    <form action="pages/annonces.php" method="post" class="form-field">
        <div class="search_div">
            <div class="select_option">
                <label class="search_title1"> Nombre de voyageurs </label>

                <div class="grix pos-xs2">
                    <div class="grix xs6">
                        <div class="form-field">
                            <select name="places" id="type-select">
                                <option value="">--Please choose an option--</option>
                                <option value="1">1 voyageur</option>
                                <option value="2">2 voyageurs</option>
                                <option value="3">3 voyageurs</option>
                                <option value="4">4 voyageurs</option>
                                <option value="5">5 voyageurs</option>
                            </select>
                        </div>
                    </div>
                </div>

                <label class="search_title2"> Type de bien</label>

                <div class="grix pos-xs2">
                    <div class="grix xs6">
                        <div class="form-field">
                            <select name="types" id="type-select">
                                <option value="">--Please choose an option--</option>
                                <option value="appartement">Appartement</option>
                                <option value="maison">Maison</option>
                                <option value="autre">Chambre d'hôtes</option>
                            </select>
                        </div>
                    </div>
                </div>

                <label class="search_title4"> Prix </label>

                <div class="grix pos-xs2">
                    <div class="grix xs6">
                        <div class="form-field">
                            <select name="prix" id="type-select">
                                <option value="0">--Please choose an option--</option>
                                <option value="1"> moins 50€/jour</option>
                                <option value="2"> entre 50€ et 100€ /jour</option>
                                <option value="3"> plus de 100€/jour</option>
                            </select>
                        </div>
                    </div>
                </div>

                <label class="search_title5"> Ville </label>
                <div class="grix pos-xs2">
                    <div class="grix xs6">
                        <div class="form-field">
                            <select name="villes" id="type-select">
                                <option value="">--Please choose an option--</option>
                                <?= choixVille() ?>
                            </select>
                        </div>
                    </div>
                </div>

                <input type="submit" name="search" class="btn blue press" id="btn_search">

                <?php search() ?>

            </div>
        </div>
    </form>

    <div id="modal">
        <div class="button-box">
            <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()"> Login</button>
            <button type="button" class="toggle-btn" onclick="register()"> Register</button>
        </div>

        <form action="index.php" method="post" id="login" class="input-group">
            <input type="text" name="accNom" placeholder="Nom de Compte" class="input-field" required>
            <input type="password" name="pwd" placeholder="Mot De Passe" class="input-field" required>
            <button type="submit" name="co" class="submit-btn"> Se connecter</button>
        </form>

        <form action="index.php" method="post" id="register" class="input-group">
            <input type="text" name="accNom" placeholder="Nom de compte" class="input-field" required>
            <input type="text" name="pwd" placeholder="Mot de passe" class="input-field" required>
            <input type="text" name="nom" placeholder="Nom de famille" class="input-field" required>
            <input type="text" name="prenom" placeholder="Prénom" class="input-field" required>
            <input type="date" name="age" placeholder="Age" class="input-field" required>
            <input type="text" name="mail" placeholder="Adresse Mail" class="input-field" required>
            <input type="text" name="tel" placeholder="Téléphone" class="input-field" required>
            <input type="text" name="ville" placeholder="Ville" class="input-field" required>
            <input type="text" name="cp" placeholder="Code Postal" class="input-field" required>
            <button type="submit" name="ajout" class="submit-btn"> S'inscrire</button>
        </form>
    </div>

    <?php include "partials/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/js/axentix.min.js"></script>
    <script src="includes/main.js" type="text/javascript"></script>

</body>

</html>