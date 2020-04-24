<?php session_start() ?>

<?php

// Ajouter une annonce 

function addAnnonce()
{
    if (isset($_FILES['image']) and !empty($_FILES['image']['name'])) {

        $image = $_FILES['image']['name'];

        $target = "../img/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }
    }

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $req = $bdd->prepare("INSERT INTO annonce SET idhote=:idhote, nom=:nom, voyageurs=:voyageurs, typlogement=:typlogement, 
    prix=:prix, ville=:ville, addresse=:addresse, codepostal=:codepostal, description=:description, image=:image");
    $req->execute([
        'idhote' => $_SESSION['id'],
        'nom' => $_POST['nom'],
        'voyageurs' => $_POST['voyageurs'],
        'typlogement' => $_POST['typlogement'],
        'prix' => $_POST['prix'],
        'ville' => $_POST['ville'],
        'addresse' => $_POST['addresse'],
        'codepostal' => $_POST['codepostal'],
        'description' => $_POST['description'],
        'image' => $image
    ]);
    $req->closeCursor();
}

function addAnnonces()
{
    if (isset($_POST['ajout'])) {
        addAnnonce();
    }
}


// Modifier une annonce 

function modAnnonce()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $idannonce = $_SESSION['idannonce'];

    $req = $bdd->prepare("UPDATE annonce SET nom=:nom, logement=:logement, 
    voyageurs=:voyageurs, typlogement=:typlogement, nbbain=:nbbain, 
    ville=:ville, addresse=:addresse, codepostal=:codepostal WHERE id = $idannonce");
    $req->execute([
        'nom' => $_POST['nom'],
        'logement' => $_POST['logement'],
        'voyageurs' => $_POST['voyageurs'],
        'typlogement' => $_POST['typlogement'],
        'nbbain' => $_POST['nbbain'],
        'ville' => $_POST['ville'],
        'addresse' => $_POST['addresse'],
        'codepostal' => $_POST['codepostal'],
        'id' => $_POST['id']
    ]);
    $req->closeCursor();
}

function modAnnonces()
{
    if (isset($_POST['modify'])) {
        modAnnonce();
    }
}

// Supprimer une annonce 

function delAnnonce()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("DELETE FROM annonce WHERE id=:id");
    $req->execute(['id' => $_POST['id']]);
    $req->closeCursor();
}

function delAnnonces()
{
    if (isset($_POST['delete'])) {
        delAnnonce();
    }
}

function users()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $id = $_SESSION['id'];

    $req = $bdd->query("SELECT nom, prenom, age, mail, ville, cp, accNom, pwd, tel FROM users WHERE id LIKE $id");

    while ($donnees = $req->fetch()) {
        echo
            '<div> '
                . '<h6> Nom de compte </h6><button id="btn_modifyUser"class="btn small circle red light-4" onclick="openacc_Modify()"><i class="far fa-edit"></i></button>'
                . '<div class="A">' . $donnees['accNom'] . '</div>'
                . "<hr>"
                . '<h6> Nom de famille </h6><button id="btn_modifyUser"class="btn small circle red light-4" onclick="openName_modify()"><i class="far fa-edit"></i></button>'

                . "<br />" . '<div class="A">' . $donnees['nom'] . '</div>'
                . "<hr>"
                . '<h6> Prénom </h6></h6><button id="btn_modifyUser"class="btn small circle red light-4" onclick="openLastname_modify()"><i class="far fa-edit"></i></button>'

                . "<br />" . '<div class="A">' . $donnees['prenom'] . '</div>'
                . "<hr>"
                . '<h6> Âge </h6></h6><button id="btn_modifyUser"class="btn small circle red light-4" onclick="openAge_modify()"><i class="far fa-edit"></i></button>'

                . "<br />" . '<div class="A">' . $donnees['age'] . '</div>'
                . "<hr>"
                . '<h6> Adresse Mail </h6></h6><button id="btn_modifyUser"class="btn small circle red light-4" onclick="openEmail_modify()"><i class="far fa-edit"></i></button>'

                . "<br />" . '<div class="A">' . $donnees['mail'] . '</div>'
                . "<hr>"
                . '<h6> Ville </h6></h6><button id="btn_modifyUser"class="btn small circle red light-4" onclick="openCity_modify()"><i class="far fa-edit"></i></button>'

                . "<br />" . '<div class="A">' . $donnees['ville'] . "," . " " . $donnees['cp'] . '</div>'
                . "<hr>"
                . '<h6> Mot de passe </h6></h6><button id="btn_modifyUser"class="btn small circle red light-4" onclick="openPwd_modify()"><i class="far fa-edit"></i></button>'

                . "<br />" . '<div class="A">' . $donnees['pwd'] . '</div>'
                . "<hr>"
                . '<h6> Téléphone </h6></h6><button id="btn_modifyUser"class="btn small circle red light-4" onclick="openTel_modify()"><i class="far fa-edit"></i></button>'

                . "<br />" . '<div class="A">' . $donnees['tel'] . '</div>'
                . "<hr>"
                . '<br />' . '</p>'
                . '</div>';
    }

    $req->closeCursor();
}

function reqAddUser()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("INSERT INTO users SET nom=:nom, prenom=:prenom, age=:age, mail=:mail, ville=:ville, cp=:cp, accNom=:accNom, pwd=:pwd, tel=:tel");
    $req->execute([
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'age' => $_POST['age'],
        'mail' => $_POST['mail'],
        'ville' => $_POST['ville'],
        'cp' => $_POST['cp'],
        'accNom' => $_POST['accNom'],
        'pwd' => $_POST['pwd'],
        'tel' => $_POST['tel']
    ]);
    $req->closeCursor();
}

function AddUser()
{
    if (isset($_POST['ajout'])) {
        reqAddUser();
    }
}

function reqDelUser()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("DELETE FROM users WHERE id=:id ");
    $req->execute(['id' => $_SESSION['id']]);
    $req->closeCursor();
}

function delUser()
{
    if (isset($_POST['supprimer'])) {
        reqDelUser();
    }
}

function upload()
{
    if (isset($_FILES['monfichier']) and $_FILES['monfichier']['error'] == 0) {
        if ($_FILES['monfichier']['size'] <= 1000000) {
            $infosfichier = pathinfo($_FILES['monfichier']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees)) {
                move_uploaded_file($_FILES['monfichier']['tmp_name'], '001.jpg');
                echo "L'envoi a bien été effectué ! <br>";
            }
        }
    }
}

function login()
{
    if (isset($_POST['co'])) {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $req = $bdd->prepare("SELECT * FROM users");
        $req->execute();
        while ($donnees = $req->fetch()) {
            if ($_POST['accNom'] == $donnees['accNom'] && ($_POST['pwd']) == $donnees['pwd']) {
                header('Location: http://localhost/LeoJas-Airbnb/');
                $_SESSION['login'] = 'yes';
                $_SESSION['id'] = $donnees['id'];
                $_SESSION['mailUser'] = $donnees['mail'];
            }
            echo '<body onLoad="alert(\'Mauvais MDP ou NDC \')">';
        }
        $req->closeCursor();
    }
}

function logout()
{
    if (isset($_POST['deco']) && $_SESSION['login'] == 'yes') {
        session_destroy();
        echo '<body onLoad="alert(\'Vous êtes déconnecté\')">';
        header('Location: http://localhost/LeoJas-Airbnb/');
    }
}

function reqUpDateUserN()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("UPDATE users SET nom=:nom WHERE id=:id ");
    $req->execute([
        'nom' => $_POST['nom'], 'id' => $_SESSION['id']
    ]);
    $req->closeCursor();
}

function reqUpDateUserP()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("UPDATE users SET prenom=:prenom WHERE id=:id ");
    $req->execute([
        'prenom' => $_POST['prenom'], 'id' => $_SESSION['id']
    ]);
    $req->closeCursor();
}

function updateUserN()
{
    if (isset($_POST['modifierN'])) {
        reqUpDateUserN();
    }
}
function updateUserP()
{
    if (isset($_POST['modifierP'])) {
        reqUpDateUserP();
    }
}

function reqUpDateUserAge()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("UPDATE users SET age=:age WHERE id=:id ");
    $req->execute([
        'age' => $_POST['age'], 'id' => $_SESSION['id']
    ]);
    $req->closeCursor();
}

function updateUserAge()
{
    if (isset($_POST['modifierAge'])) {
        reqUpDateUserAge();
    }
}

function reqUpDateUserAdd()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("UPDATE users SET ville=:ville, cp=:cp WHERE id=:id ");
    $req->execute([
        'ville' => $_POST['ville'], 'cp' => $_POST['cp'], 'id' => $_SESSION['id']
    ]);
    $req->closeCursor();
}

function updateUserAdd()
{
    if (isset($_POST['modifierAdd'])) {
        reqUpDateUserAdd();
    }
}

function reqUpDateUserMail()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("UPDATE users SET mail=:mail WHERE id=:id ");
    $req->execute([
        'mail' => $_POST['mail'], 'id' => $_SESSION['id']
    ]);
    $req->closeCursor();
}

function updateUserMail()
{
    if (isset($_POST['modifierMail'])) {
        reqUpDateUserMail();
    }
}

function reqUpDateUserTel()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("UPDATE users SET tel=:tel WHERE id=:id ");
    $req->execute([
        'tel' => $_POST['tel'], 'id' => $_SESSION['id']
    ]);
    $req->closeCursor();
}


function updateUserTel()
{
    if (isset($_POST['modifierTel'])) {
        reqUpDateUserTel();
    }
}

function reqUpDateUserAcc()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("UPDATE users SET accNom=:accNom WHERE id=:id ");
    $req->execute([
        'accNom' => $_POST['accNom'], 'id' => $_SESSION['id']
    ]);
    $req->closeCursor();
}

function reqUpDateUserPwd()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("UPDATE users SET pwd=:pwd WHERE id=:id ");
    $req->execute([
        'pwd' => $_POST['pwd'], 'id' => $_SESSION['id']
    ]);
    $req->closeCursor();
}

function updateUserAcc()
{
    if (isset($_POST['modifierAcc'])) {
        reqUpDateUserAcc();
    }
}

function updateUserPwd()
{
    if (isset($_POST['modifierPwd'])) {
        reqUpDateUserPwd();
    }
}

function nav()
{
    if (isset($_SESSION['login']) == 'yes') {
        echo
            '<div class="navbar-menu hide-sm-down ml-auto">
            <a class="navbar-link" href="pages/annonces.php">Annonces</a>
            <a class="navbar-link" href="pages/add_annonce.php">Publier une annonce</a>
            <div class="dropdown" id="example-dropdown">
                <div class="navbar-link  dropdown-trigger">
                    Profil
                </div>
                <div class="dropdown-content right-aligned white">
                    <a class="dropdown-item" href="pages/profil.php"> Mon compte</a>
                    <a class="dropdown-item" href="pages/mes_annonces.php"> Mes annonces</a>
                    <form method="post" class="form-example">
                    <button id="btn_signout" type="submit" name="deco" class="dropdown-item"> Se deconnecter </button>
                    </form>
                </div>
            </div>
        </div>';
    } else echo
        '<div class="navbar-menu hide-sm-down ml-auto">
            <a class="navbar-link" href="pages/annonces.php">Annonces</a>
            <button class="navbar-link" href="pages/connection.php" onclick="openModal()" >Sign In/Sign Up</button>
        </div>';
}

function nav2()
{
    if (isset($_SESSION['login']) == 'yes') {
        echo
            '<div class="navbar-menu  ml-auto">
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
        </div>';
    } else echo
        '<div class="navbar-menu  ml-auto">
            <a class="navbar-link" href="../index.php">Home</a>
            <button class="navbar-link" href="../index.php" onclick="openModal()" >Sign In/Sign Up</button>
        </div>';
}

function annonces_All()
{
    $_SESSION['search'];
    if ($_SESSION['search'] != "oui") {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $req = $bdd->query("SELECT * FROM annonce");

        while ($donnees = $req->fetch()) {
            echo
                '<div class="container_add"> '
                    . '<img class="image_annonce" src="../img/' . $donnees['image'] . '">'
                    . '<div class="text_add">
                    <p class="blabla">' . $donnees['nom'] . '</p>'
                    . $donnees['typlogement'] . " - " . $donnees['voyageurs'] . " " . 'Voyageurs'

                    .  '<p class="bloublou">' . $donnees['prix'] . " " . '€ / nuit' . '</p>'
                    . '<p class="bleble">' . $donnees['addresse'] . "<br />" . $donnees['ville'] . "," . " " . $donnees['codepostal']
                    . '</p>'
                    . "<br />" . 'Description : ' . " " . $donnees['description']
                    . '<br />' . '</div>'
                    . '<a href="http://localhost/LeoJas-Airbnb/pages/reservation.php">
                        <div class="add_reservation">
                            <form action="annonces.php" method="get">
                                <button class="btn primary outline opening txt-orange light-2" id="btn_reserve" type="submit" name="reserver" value="' . $donnees['id'] . '"><span class="outline-text"> Reserver </span>
                                </button>
                            </form>
                        </div>
                    </a>
            </div>';
        }
        $req->closeCursor();
    }
}

function annonces_Client()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $id = $_SESSION['id'];

    $req = $bdd->query("SELECT * FROM annonce WHERE idhote LIKE $id");
    $_SESSION['idannonce'] = "";
    while ($donnees = $req->fetch()) {
        echo
        '<div class="container_add"> '
        . '<img class="image_annonce" src="../img/' . $donnees['image'] . '">'
        . '<div class="text_add">
            <p class="blabla">' . $donnees['nom'] . '</p>'
        . $donnees['typlogement'] . " - " . $donnees['voyageurs'] . " " . 'Voyageurs'

        .  '<p class="bloublou">' . $donnees['prix'] . " " . '€ / nuit' . '</p>'
        . '<p class="bleble">' . $donnees['addresse'] . "<br />" . $donnees['ville'] . "," . " " . $donnees['codepostal']
        . '</p>'
        . "<br />" . 'Description : ' . " " . $donnees['description']
        . '<br />' . '</div></div>'
                . '<a href="http://localhost/LeoJas-Airbnb/pages/reservation.php"> <form action="annonces.php" method="get"> <button type="submit" name="reserver" value="'. $donnees['id'] . '" class="btn primary outline opening txt-orange light-2"><span class="outline-text"> Rechercher </span></button></a> </form> </div> ';
    }
    $req->closeCursor();
}

function choixVille()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $variable = "";
    $reponse = $bdd->query('SELECT DISTINCT ville FROM annonce');
    while ($donnees = $reponse->fetchObject()) {
        $variable .= '<option value = "' . $donnees->ville . '">';
        $variable .= $donnees->ville . "</option>";
    }
    $reponse->closeCursor();
    return $variable;
}

function reqSearch()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $_SESSION['search'] = "oui";
    $ville = $_POST['villes'];
    $place = $_POST['places'];
    $type = $_POST['types'];
    $_SESSION['search'] = "oui";

    $_POST['prix'];
    if ($_POST['prix'] == 0) {
        $prixS = '';
    } elseif ($_POST['prix'] == 1) {
        $prixS = ' AND prix <= 50';
    } elseif ($_POST['prix'] == 2) {
        $prixS = ' AND prix >= 50 AND prix <= 100';
    } elseif ($_POST['prix'] == 3) {
        $prixS = ' AND prix >= 100';
    }
    $req = $bdd->query("SELECT * 
    FROM annonce WHERE ville LIKE '%$ville%'AND typlogement LIKE '%$type%' AND voyageurs LIKE '%$place%' $prixS");
    while ($donnees = $req->fetch()) {
        echo "<br>".
        '<div class="container_add"> '
        . '<img class="image_annonce" src="../img/' . $donnees['image'] . '">'
        . '<div class="text_add">
            <p class="blabla">' . $donnees['nom'] . '</p>'
        . $donnees['typlogement'] . " - " . $donnees['voyageurs'] . " " . 'Voyageurs'
        .  '<p class="bloublou">' . $donnees['prix'] . " " . '€ / nuit' . '</p>'
        . '<p class="bleble">' . $donnees['addresse'] . "<br />" . $donnees['ville'] . "," . " " . $donnees['codepostal']
        . '</p>'
        . "<br />" . 'Description : ' . " " . $donnees['description']
        . '<br />' . '</div>'
        . '<a href="http://localhost/LeoJas-Airbnb/pages/reservation.php"> <form  action="reservation.php" method="get"> <button id="btn_reservation" type="submit" name="reserver" value="'
        . $donnees['id'] . '" class="btn primary outline opening txt-orange light-2"><span class="outline-text"> Reserver </span></button></a></form> </div> ';
        $_SESSION['idhote'] = $donnees['idhote'];
        $_SESSION['nomAnnonce'] = $donnees['nom'];
    }

    $req->closeCursor();
}

function reqMyAnnonces()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $id = $_SESSION["id"];

    $req = $bdd->query("SELECT * FROM annonce WHERE idhote LIKE $id");

    while ($donnees = $req->fetch()) {
        echo
        '<div class="container_add"> '
        . '<img class="image_annonce" src="../img/' . $donnees['image'] . '">'
        . '<div class="text_add">
            <p class="blabla">' . $donnees['nom'] . '</p>'
        . $donnees['typlogement'] . " - " . $donnees['voyageurs'] . " " . 'Voyageurs'

        .  '<p class="bloublou">' . $donnees['prix'] . " " . '€ / nuit' . '</p>'
        . '<p class="bleble">' . $donnees['addresse'] . "<br />" . $donnees['ville'] . "," . " " . $donnees['codepostal']
        . '</p>'
        . "<br />" . 'Description : ' . " " . $donnees['description']
        . '<br />' . '</div>'
                . '<a href="http://localhost/LeoJas-Airbnb/pages/mod_annonce.php">
        <form action="" method="get"><button class="btn small outline  opening txt-orange light-3" id="btn_modAdd" type="submit" name="modify" value="' . $donnees['id'] . '"><span class="outline-text">Modifier</span></button></form>'
                . '<form action="" method="get"><button class="btn small outline  opening txt-orange light-3" id="btn_delAdd" type="submit" name="delete" value="' . $donnees['id'] . '"><span class="outline-text">Supprimer</span></button></form> </a></div>';
    }

    $req->closeCursor();
}

function search()
{
    if (isset($_POST['search'])) {
        reqSearch();
        $_SESSION['search'] = "oui";
    }
}

function reqReservation()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("INSERT INTO booking SET startbooking=:startbooking, endbooking=:endbooking, prix=:prix, idannonce=:idannonce, idreserveur=:idreserveur, idhote=:idhote");
    $req->execute([
        'startbooking' => $_SESSION['startbooking'],
        'endbooking' => $_SESSION['endbooking'],
        'prix' => $_SESSION['prix'],
        'idannonce' => $_SESSION['idannonce'],
        'idreserveur' => $_SESSION['id'],
        'idhote' => $_SESSION['idhote']
    ]);
    $req->closeCursor();
}

function goToReserver()
{
    if (isset($_GET['reserver']) && $_SESSION['login'] == 'yes') {
        $_SESSION['idannonce'] = $_GET['reserver'];
        selectMailHote();
        header('Location: http://localhost/LeoJas-Airbnb/pages/reservation.php');
    }
}

function selectMailHote()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $idhote = $_SESSION['idhote'];
    $req = $bdd->query("SELECT mail FROM users WHERE id=$idhote");
    $donnees = $req->fetch();
    $_SESSION['mailHote'] = $donnees['mail'];
    $req->closeCursor();
}

function goToModify()
{
    if (isset($_GET['modify'])) {
        $_SESSION['idannonce'] = $_GET['modify'];
        header('Location: http://localhost/LeoJas-Airbnb/pages/mod_annonce.php');
    }
}

function delete()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $id = $_SESSION["idannonce"];

    $req = $bdd->prepare("DELETE FROM annonce WHERE id LIKE $id");
    $req->execute(['idannonce' => $_SESSION['idannonce']]);
    $req->closeCursor();
}

function deleted()
{
    if (isset($_GET['delete'])) {
        $_SESSION['idannonce'] = $_GET['delete'];
        delete();
    }
}

function calculPrix()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $idannonce = $_SESSION['idannonce'];
    $nbPersonne = $_GET['nbPersonne'];
    $date1 = strtotime($_GET['endbooking']);
    $date2 = strtotime($_GET['startbooking']);
    $nbJoursSec = $date1 - $date2;
    $nbJour = $nbJoursSec / 86400;
    $req = $bdd->query("SELECT prix FROM annonce WHERE id LIKE $idannonce");
    while ($donnees = $req->fetch()) {
        $prix = $donnees['prix'];
    }
    $req->closeCursor();
    $_SESSION['prix'] = $prix;
    if ($_GET['endbooking'] > $_GET['startbooking']) {
        $prix = $prix * $nbPersonne * $nbJour;
        $_SESSION['valide'] = "oui";
        $_SESSION['prix'] = $prix;
    } else {
        $prix = "";
        echo '<body onLoad="alert(\'ATTENTION Date de début et fin de séjour inversée\')">';
        $_SESSION['valide'] = "non";
    }
    return $prix;
}

function reqSelecSolde()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $id = $_SESSION['id'];
    $req = $bdd->query("SELECT solde FROM users WHERE id=$id");
    while ($donnees = $req->fetch()) {
        $_SESSION['soldeClient'] = $donnees['solde'];
    }
    $req->closeCursor();

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $id = $_SESSION['idhote'];
    $id = $_SESSION['id'];
    $req = $bdd->query("SELECT solde FROM users WHERE id=$id");
    while ($donnees = $req->fetch()) {
        $_SESSION['soldeHote'] = $donnees['solde'];
    }
    $req->closeCursor();
}

function updateSolde()
{
    $_SESSION['soldeHote'] = $_SESSION['soldeHote'] + $_SESSION['prix'];
    $_SESSION['soldeClient'] = $_SESSION['soldeClient'] - $_SESSION['prix'];
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("UPDATE users SET solde=:solde WHERE id=:id ");
    $req->execute([
        'solde' => $_SESSION['soldeClient'],
        'id' => $_SESSION['id']
    ]);
    $req->closeCursor();
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("UPDATE users SET solde=:solde WHERE id=:id ");
    $req->execute([
        'solde' => $_SESSION['soldeHote'],
        'id' => $_SESSION['idhote']
    ]);
    $req->closeCursor();
}

function valeurMax()
{
    $max = $_SESSION['voyageurs'];
    return $max;
}

function affichePrix()
{
    if (isset($_GET['calcul']) && $_SESSION['valide'] = "oui") {
        echo calculPrix();
        echo getPossibleReservation();
    }
    //else echo "Choisissez des dates valides";   
}

function addBooking()
{
    if (isset($_POST['boom']) && $_SESSION['valide'] = "oui") {
        reqSelecSolde();
        updateSolde();
        reqReservation();
        mailConfirmationHote();
        mailConfirmationReserveur();
    } else echo "Choisissez des dates valides";
}

function getPossibleReservation()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare("SELECT * FROM booking WHERE idannonce=?
    HAVING endbooking > ? AND startbooking < ?");
    $req->execute(array($_SESSION['idannonce'], $_GET['startbooking'], $_GET['endbooking']));
    $donnees = $req->fetch();

    if ($donnees['idannonce']) {
        echo '<br><br> Le bien que vous avez choisis à cette date est indisponible.';
    } else {
        echo '<br> La période de séjour choisis est disponible';
        $_SESSION['startbooking'] = $_GET['startbooking'];
        $_SESSION['endbooking'] = $_GET['endbooking'];
    }
}

function mailConfirmationHote()
{
    $nom = $_SESSION['nomAnnonce'];
    $from = $_SESSION['mailUser'];
    $to = $_SESSION['mailHote'];
    $subject = "Confirmation Reservation";
    $message = "Votre annonce " . $nom . " a été réservée";
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);
}

function mailConfirmationReserveur()
{
    $nom = $_SESSION['nomAnnonce'];
    $from = $_SESSION['mailHote'];
    $to = $_SESSION['mailUser'];
    $subject = "Vérification PHP mail";
    $message = "Vous avez bien réservé l'annonce   " . $nom;
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);
}

function reqAnnonceResa()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=airbnb;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $id = $_SESSION['idannonce'];

    $req = $bdd->query("SELECT * FROM annonce WHERE id=$id");
    while ($donnees = $req->fetch()) {
        echo
            '<div class="container_add"> '
                . '<img class="image_annonce" src="../img/' . $donnees['image'] . '">'
                . '<div class="text_add">
                    <p class="blabla">' . $donnees['nom'] . '</p>'
                . $donnees['typlogement'] . " - " . $donnees['voyageurs'] . " " . 'Voyageurs'

                .  '<p class="bloublou">' . $donnees['prix'] . " " . '€ / nuit' . '</p>'
                . '<p class="bleble">' . $donnees['addresse'] . "<br />" . $donnees['ville'] . "," . " " . $donnees['codepostal']
                . '</p>'
                . "<br />" . 'Description : ' . " " . $donnees['description']
                . '<br />' . '</div></div>';
                $_SESSION['voyageurs'] = $donnees['voyageurs'];
    }
    $req->closeCursor();
}