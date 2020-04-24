<?php require_once '../includes/admin_functions.php' ?>
<?php reqMyAnnonces() ?>
<?php goToModify() ?>
<?php deleted() ?>
<?php logout() ?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css2?family=Lexend+Giga&display=swap" rel="stylesheet">
	
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.3/dist/css/grix.min.css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/css/axentix.min.css">

	<link rel="stylesheet" href="../assets/css/style.css">

	<script src="https://kit.fontawesome.com/3661b65c37.js" crossorigin="anonymous"></script>

</head>
	<div class="navbar-fixed">
		<nav class="navbar primary white">
			<a class="navbar-logo centered">
				<img src="../img/logo.png" alt="AirB&B" />
			</a>
			<a href="../index.php" class="navbar-brand"> AIRBNB </a>
			<div class="navbar-menu  ml-auto">
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

    <footer>
		<?php include "../partials/footer.php" ?>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/js/axentix.min.js"></script>
	<script src="../includes/main.js" type="text/javascript"></script>

</body>

</html>