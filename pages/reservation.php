<?php require_once '../includes/admin_functions.php' ?>
<?php AddUser() ?>
<?php login() ?>
<?php logout() ?>



<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/css/axentix.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.3/dist/css/grix.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

  <div class="navbar-fixed">
    <nav class="navbar primary white">
      <a class="navbar-logo centered">
        <img src="../img/logo.png" alt="AirB&B" />
      </a>
      <a href="../index.php" class="navbar-brand"> AIRBNB </a>
      <?php nav2() ?>
    </nav>
  </div>
  <div id="modal">
    <div class="button-box">
      <div id="btn"></div>
      <button type="button" class="toggle-btn" onclick="login()"> Login</button>
      <button type="button" class="toggle-btn" onclick="register()"> Register</button>
    </div>

    <form action="../index.php" method="post" id="login" class="input-group">
      <input type="text" name="accNom" placeholder="Nom de Compte" class="input-field" required>
      <input type="password" name="pwd" placeholder="Mot De Passe" class="input-field" required>
      <button type="submit" name="co" class="submit-btn"> Se connecter</button>
    </form>

    <form action="../index.php" method="post" id="register" class="input-group">
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

  <h1> Votre réservation </h1>

  <?php
  if (isset($_SESSION['login'])) {
    reqAnnonceResa();
  ?>


    <form action="" class="test2" method="post">
      <p>
        <label>Start:</label>
        <input type="date" name="startbooking">
      </p>
      <p>
        <label>End:</label>
        <input type="date" name="endbooking">
      </p>
      <p>
        <label>Number of People:</label>
        <input type="number" name="nbPersonne" min="1" max=<?= valeurMax() ?>required>
        <p class="bold_p">Calcul du prix : <button type="submit" name="calcul"> Verifier </button></p>
      </p>
      <p class="bold_p">Prix: <?= affichePrix() ?></p>

      <?php addBooking() ?>

      <form action="" method="post">
        <button class="btn small outline  opening txt-orange light-3" id="btn_delAdd" type="submit" name="boom"> Valider </button>
      </form>
    </form>
  <?php
  } else {
    echo '<body onLoad="alert(\'Vous devez etre connecté\')">';
    //echo '<meta  content="0"; URL="../index.php">';
    //header('Location: http://localhost/LeoJas-Airbnb/index.php');
  }
  ?>

  <?php include "../partials/footer.php" ?>


  <script src="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/js/axentix.min.js"></script>
  <script src="../includes/main.js" type="text/javascript"></script>

</body>

</html>