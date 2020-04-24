<?php require_once '../includes/admin_functions.php' ?>
<?php addAnnonces() ?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.3/dist/css/grix.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/css/axentix.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">

    <script src="https://kit.fontawesome.com/3661b65c37.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>

<body class="layout with-sidenav fixed-sidenav under-navbar">
    <div class="background">
        <header>
            <div class="navbar-fixed">
                <nav class="navbar primary white">
                    <a class="navbar-logo hide-sm-down centered">
                        <img src="../img/logo.png" alt="AirB&B" />
                    </a>
                    <a href="../index.php" class="navbar-brand hide-sm-down"> AIRBNB </a>
                    <button data-target="example-sidenav" class="sidenav-trigger btn small black hide-md-up hide-sx shadow-0">
                        <i class="fas fa-bars"></i>
                        Menu
                    </button>
                    <div class="navbar-menu hide-sm-down ml-auto">
                        <a class="navbar-link" href="annonces.php">Annonces</a>
                        <a class="navbar-link" href="add_annonce.php">Publier une annonce</a>
                        <div class="dropdown" id="example-dropdown">
                            <div class="navbar-link  dropdown-trigger">
                                Profil
                            </div>
                            <div class="dropdown-content right-aligned white">
                                <a class="dropdown-item" href="profil.php"> Mon compte</a>
                                <a class="dropdown-item" href="mes_annonces.php"> Mes annonces</a>
                                <form method="post" class="form-example">
                                    <button id="btn_signout" type="submit" name="deco" class="dropdown-item"> Se deconnecter </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

        </header>

        <div id="example-sidenav" class="sidenav white">
            <div class="sidenav-header hide-md-up">
                <button data-target="example-sidenav" class="sidenav-trigger btn small white hide-md-up hide-xs shadow-0">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="hide-md-up">
                <a class="sidenav-link" href="annonces.php">Annonces</a>
                <a class="sidenav-link" href="add_annonce.php">Publier une annonce</a>
                <div class="divider"></div>
            </div>
            <button class="collapsible-trigger sidenav-link active" data-target="example-collapsible"> Profil</button>
            <div>
                <div class="collapsible" id="example-collapsible" style="transition-duration: 300ms; display: block; max-height: 192px;">
                    <a href="profil.php" class="sidenav-link"> Mon compte </a>
                    <a href="mes_annonces.php" class="sidenav-link"> Mes annonces </a>
                    <button id="btn_signout" type="submit" name="deco" class="sidenav-link"> Se deconnecter </button>
                </div>
            </div>
        </div>

        <h4> Ajouter une annonce </h4>
        <form action="add_annonce.php" method="post" id="form_addAnnonce" class="form-example" enctype="multipart/form-data">
            <div class="grix pos-xs2">
                <div class="grix xs6">
                    <div class="form-field" id="form_Annonce">
                        <label class="txt-center" for="select">Nom de l'annonce</label>
                        <input type="text" class="form-control" name="nom" required> <br>
                    </div>
                </div>

                <div class="grix xs6">
                    <div class="form-field" id="form_Annonce">
                        <label class="txt-center" for="select">Nombre de voyageurs</label>
                        <select class="form-control" id="select" name="voyageurs">
                            <option> 1 </option>
                            <option> 2 </option>
                            <option> 3 </option>
                            <option> 4 </option>
                            <option> 5 </option>
                        </select>
                    </div>
                </div>

                <div class="grix xs6">
                    <div class="form-field" id="form_Annonce">
                        <label class="txt-center" for="select">Type de logement</label>
                        <select class="form-control" id="select" name="typlogement">
                            <option> Appartement </option>
                            <option> Maison </option>
                            <option> Chambre d'hôtes </option>
                        </select>
                    </div>
                </div>

                <div class="grix xs6">
                    <div class="form-field" id="form_Annonce">
                        <label class="txt-center" for="select">Prix par nuit</label>
                        <input type="text" class="form-control" name="prix" placeholder="25 € / Nuit" required> <br>
                    </div>
                </div>

                <div class="grix xs6">
                    <div class="form-field" id="form_Annonce">
                        <label class="txt-center" for="select">Ville</label>
                        <input type="text" class="form-control" name="ville" placeholder="Ex. Paris" required> <br>
                    </div>
                </div>

                <div class="grix xs6">
                    <div class="form-field" id="form_Annonce">
                        <label class="txt-center" for="select">Adresse postale </label>
                        <input type="text" class="form-control" name="addresse" placeholder="Ex. 27 rue Juanito" required> <br>
                    </div>
                </div>

                <div class="grix xs6">
                    <div class="form-field" id="form_Annonce">
                        <label class="txt-center" for="select">Code postal </label>
                        <input type="text" class="form-control" name="codepostal" placeholder="Ex. 94000" required> <br>
                    </div>
                </div>

                <div class="grix xs6">
                    <div class="form-field" id="form_Annonce">
                        <label class="txt-center" for="select"> Description </label>
                        <input type="text" class="form-control" name="description" placeholder="Description de votre bien.." required> <br>
                    </div>
                </div>

                <input type="file" name="image">
                <br>
            </div>
            <button id="btn_addAnn" type="submit" name="ajout" class="btn primary outline opening txt-orange light-2"><span class="outline-text"> Ajouter </span></button>
        </form>
    </div>


    <?php include "../partials/footer.php" ?>


    <script src="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/js/axentix.min.js"></script>
    <script src="../includes/main.js" type="text/javascript"></script>

</body>