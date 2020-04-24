<?php require_once '../includes/admin_functions.php' ?>



<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/css/axentix.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.3/dist/css/grix.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- <script>
  $( function() {
    $( "#datepickerS" ).datepicker();
    $( "#datepickerE" ).datepicker();
  } );
  </script> -->
</head>

<body>
  <!-- 
<p>Date de début: <input type="text" id="datepickerS"></p>
<p>Date de fin: <input type="text" id="datepickerE"></p> -->
<h1> Votre réservation </h1>

<?php reqAnnonceResa() ?>
  <form action="" method="get">
    <p>
      <label>Start:</label>
      <input type="date" name="startbooking" required>
    </p>
    <p>
      <label>End:</label>
      <input type="date" name="endbooking" required>
    </p>
    <p>
      <label>Number of People:</label>
      <input type="number" name="nbPersonne" min="1" max=<?= valeurMax() ?><br>
      <p>Calcul du prix :<input type="submit" name="calcul"></p>
    </p>
  </form>
  <p>Prix: <?= affichePrix() ?></p>

  <?php addBooking() ?>

  <form action="reservation.php" method="post">
    <input type="submit" name="boom">
  </form>

</body>

</html>