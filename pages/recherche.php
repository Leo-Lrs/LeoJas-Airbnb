<?php require_once '../includes/admin_functions.php' ?>
<form action="recherche.php" method="post" class="form-field">

    <label for="nbPlace-select">Choose a place:</label>

    <select name="places" id="nbPlace-select">
        <option value="">--Please choose an option--</option>
        <option value="1">1 voyageur</option>
        <option value="2">2 voyageurs</option>
        <option value="3">3 voyageurs</option>
        <option value="4">4 voyageurs</option>
        <option value="5">5 voyageurs</option>
    </select>

    <label for="type-select">Choose a PRIX:</label>

    <select name="types" id="type-select">
        <option value="">--Please choose an option--</option>
        <option value="appartement">appartement</option>
        <option value="maison">maison</option>
        <option value="autre">autre</option>
    </select>

    <label for="bain-select">Choose a DATE:</label>

    <p>
        <label>Start:</label>
        <input type="date" name="startbooking" required>
    </p>
    <p>
        <label>End:</label>
        <input type="date" name="endbooking" required>
    </p>

    <label for="ville-select">Choose a ville:</label>

    <select name="villes" id="ville-select">
        <option value="">--Please choose an option--</option>
        <?= choixVille() ?>
    </select>

    <input type="submit" name="search" class="btn small grey uppercase">
</form>

<?php search() ?>