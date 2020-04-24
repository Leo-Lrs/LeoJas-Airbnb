<link rel="stylesheet" href="../assets/css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.0/dist/css/axentix.min.css">

<?php include "../partials/navbar_3.php" ?>
<?php require_once '../includes/admin_functions.php' ?>
<?php delAnnonces() ?>


<h4> Supprimer mon annonce </h4>
<form action="del_annonce.php" method="post" class="form-example">
<div class="col">
    <input type="text" class="form-control" name="id" placeholder="Id" required> <br>
  </div>
  <input type="submit" name="delete">
</form>


