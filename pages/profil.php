<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css2?family=Lexend+Giga&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/css/axentix.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">

	<script src="https://kit.fontawesome.com/3661b65c37.js" crossorigin="anonymous"></script>


</head>

<?php require_once '../includes/admin_functions.php' ?>

<?php delUser() ?>
<?php upload() ?>
<?php logout() ?>
<?php updateUserN() ?>
<?php updateUserP() ?>
<?php updateUserAge() ?>
<?php updateUserAdd() ?>
<?php updateUserMail() ?>
<?php updateUserTel() ?>
<?php updateUserAcc() ?>
<?php updateUserPwd() ?>
<?php updateUserImg() ?>

<body>
	<div class="navbar-fixed">
		<nav class="navbar primary white">
			<a class="navbar-logo centered">
				<img src="../img/logo.png" alt="AirB&B" />
			</a>
			<a class="navbar-brand" href="../index.php"> AIRBNB </a>
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

	<?php users() ?>
	<div id="img_Modify">
		<form action="profil.php" method="post" class="input-group2">
			<input type="file" name="image">
			<br>
			<button type="submit" name="modifierImg" class="submit-btn"> Appliquer</button>
		</form>
	</div>
	<div id="acc_Modify">
		<form action="profil.php" method="post" class="input-group2">
			<input type="text" name="accNom" placeholder="accNom" class="input-field" required>
			<button type="submit" name="modifierAcc" class="submit-btn"> Appliquer</button>
		</form>
	</div>

	<div id="Name_modify">
		<form action="profil.php" method="post" class="input-group2">
			<input type="text" name="nom" placeholder="nom" class="input-field" required>
			<button type="submit" name="modifierN" class="submit-btn"> Appliquer</button>
		</form>
	</div>

	<div id="Lastname_modify">
		<form action="profil.php" method="post" class="input-group2">
			<input type="text" name="prenom" placeholder="Prénom" class="input-field" required>
			<button type="submit" name="modifierP" class="submit-btn"> Appliquer</button>
		</form>
	</div>

	<div id="Age_modify">
		<form action="profil.php" method="post" class="input-group2">
			<input type="date" name="age" placeholder="age" class="input-field" required>
			<button type="submit" name="modifierAge" class="submit-btn"> Appliquer</button>
		</form>
	</div>

	<div id="Email_modify">
		<form action="profil.php" method="post" class="input-group2">
			<input type="text" name="mail" placeholder="Adresse Mail" class="input-field" required>
			<button type="submit" name="modifierMail" class="submit-btn"> Appliquer</button>
		</form>
	</div>

	<div id="City_modify">
		<form action="profil.php" method="post" class="input-group2">
			<input type="text" name="ville" placeholder="Ville" class="input-field" required>
			<input type="number" name="cp" placeholder="Code postal" class="input-field" required>
			<button type="submit" name="modifierAdd" class="submit-btn"> Appliquer</button>
		</form>
	</div>

	<div id="Pwd_modify">
		<form action="profil.php" method="post" class="input-group2">
			<input type="text" name="pwd" placeholder="Mot de passe" class="input-field" required>
			<button type="submit" name="modifierPwd" class="submit-btn"> Appliquer</button>
		</form>
	</div>

	<div id="Tel_modify">
		<form action="profil.php" method="post" class="input-group2">
			<input type="number" name="tel" placeholder="Numéro de téléphone" class="input-field" required>
			<button type="submit" name="modifierTel" class="submit-btn"> Appliquer</button>
		</form>
	</div>
	<div id="Testt">
		<form action="profil.php" method="post" class="input-group2">
			<button type="submit" name="supprimer" class="submit-btn"> Supprimer</button>
		</form>
	</div>



	<footer>
		<?php include "../partials/footer.php" ?>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/js/axentix.min.js"></script>
	<script src="../includes/main.js" type="text/javascript"></script>

</body>

</html>