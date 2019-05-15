<?php
session_start();
$pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
// function login 
if (isset($_POST["login"]) && isset($_POST["password"])) {

    $statementU = $pdo->query(
        "SELECT mail_u, mdp_u FROM utilisateur"
    );

    $statementC = $pdo->query(
        "SELECT mail_c, mdp_c FROM coach"
    );

    $user = $statementU->fetchAll(PDO::FETCH_ASSOC);
    $coach = $statementC->fetchAll(PDO::FETCH_ASSOC);

    foreach ($user as $key => $value) {
        // login for user
        if ($_POST["login"] == $user[$key]["mail_u"] && $_POST["password"] == $user[$key]["mdp_u"]) {

            $_SESSION["login"] = $_POST["login"];
            $_SESSION["connectedUser"] = true;
            $_SESSION["connectedAt"] = new DateTime();

            header('Location: accueil.php');

            break;

            // login for coach
        } elseif ($_POST["login"] != $user[$key]["mail_u"] && $_POST["password"] != $user[$key]["mdp_u"]) {
            foreach ($coach as $k => $v) {

                if ($_POST["login"] == $coach[$k]["mail_c"] && $_POST["password"] == $coach[$k]["mdp_c"]) {

                    $_SESSION["login"] = $_POST["login"];
                    $_SESSION["connectedCoach"] = true;
                    $_SESSION["connecte dAt"] = new DateTime();

                    header('Location: accueil.php');

                    break;
                }
            }
            if (isset($success)) {
                break;
            }
        } else {
            $error = "Votre identifiant est incorrecte !";
        }
    }
    if (isset($error)) {
        echo $error;
    }
}

// insere l'inscription dans la base de donnée
if (isset($_POST['mdp']) && isset($_POST['verification']) && isset($_POST['submit'])) {
    if ($_POST['mdp'] == $_POST['verification']) {

        $mail = checkMail();
        $PostalCode = lenPostalCode();
        $phone = lenPhone();

        $choice = choice();


        if (!($mail == 1) && !($PostalCode == 2) && !($phone == 3) && empty($choice)) {
            $statement = $pdo->prepare(
                "INSERT INTO utilisateur ( nom_u, prenom_u, mdp_u, age_u, adresse_u, ville_u, code_postal_u, mail_u, telephone_u, poid_u, taille) 
                VALUES (:nom_u , :prenom_u, :mdp_u, :age_u, :adresse_u, :ville_u, :code_postal_u, :mail_u, :telephone_u, :poid_u, :taille)"
            );
            $statement->execute(array(
                ':nom_u' => $_POST['nom'],
                ':prenom_u' => $_POST['prenom'],
                ':mdp_u' => $_POST['mdp'],
                ':age_u' => $_POST['age'],
                ':adresse_u' => $_POST['adresse'],
                ':ville_u' => $_POST['ville'],
                ':code_postal_u' => $_POST['code'],
                ':mail_u' => $_POST['email'],
                ':telephone_u' => $_POST['tel'],
                ':poid_u' => $_POST['poid'],
                ':taille' => $_POST['taille'],
            ));

            $success = "Vous etes inscrit !";
            echo Imc() . $success;

            $_SESSION["login"] = $_POST['email'];
            $_SESSION["connectedUser"] = true;
            $_SESSION["connectedAt"] = new DateTime();

            header('Location: profil.php');
        } elseif ($mail == 1) {
            echo 'compte deja existant';
        } elseif ($PostalCode == 2) {
            echo 'code postal pas bon';
        } elseif ($phone == 3) {
            echo 'numero de telephone incorrect';
        } elseif ($choice == 1) {
            echo "tu n'a pas rempli ton age";
        } elseif ($choice == 2) {
            echo "tu n'a pas rempli ton poid";
        } elseif ($choice == 3) {
            echo "tu n'a pas rempli ta taille";
        }
    } else {
        $error = 'les deux mot de passe ne sont pas pareil';
        echo $error;
    }
}


// stocker une image, donner nom defini a une image, ainsi que le type et la taille
function upload()
{
    $extensions = array('.png', '.jpg', '.jpeg');
    $file = $_FILES['img']['name'];
    $extension = strrchr($file, '.');
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");

    if (isset($_SESSION["connectedCoach"])) {
        $stmId = $pdo->query('SELECT id_coach FROM coach WHERE mail_c = "' . $_SESSION["login"] . '"');
        $id = $stmId->fetchAll(PDO::FETCH_ASSOC);
        $var = $id[0]['id_coach'];
        $file = $var . "C" . $extension;
    } elseif (isset($_SESSION["connectedUser"])) {
        $stmId = $pdo->query('SELECT id_utilisateur FROM utilisateur WHERE mail_u = "' . $_SESSION["login"] . '"');
        $id = $stmId->fetchAll(PDO::FETCH_ASSOC);
        $var = $id[0]['id_utilisateur'];
        $file = $var . "U" . $extension;
    }



    $folder = '../upload/' . $file;

    if (!in_array($extension, $extensions)) {
        $error = 1;
    }

    if ($_FILES['img']['size'] > 1 * pow(10, 6)) {
        $error = 2;
    }



    if (!isset($error)) {
        if (isset($_SESSION["connectedCoach"])) {
            $statement = $pdo->prepare(
                ('UPDATE coach SET images_c = :images_c WHERE mail_c = "' . $_SESSION["login"] . '"')
            );
            $statement->execute(array(
                ':images_c' => $file
            ));
        } elseif (isset($_SESSION["connectedUser"])) {
            $statement = $pdo->prepare(
                ('UPDATE utilisateur SET images_u = :images_u WHERE mail_u = "' . $_SESSION["login"] . '"')
            );
            $statement->execute(array(
                ':images_u' => $file
            ));
        }

        $file = strtolower($file);
        move_uploaded_file($_FILES['img']['tmp_name'], $folder);
        echo 'ton image a bien été modifer';
        return $file;
    } elseif ($_FILES['img']['size'] == 0) {
        echo "tu n'a pas ajouté d'image";
    } elseif ($error == 1) {
        echo "l'extension n'est pas bonne";
    } elseif ($error == 2) {
        echo "l'image est trop lourde";
    }
}
// retourne un message d'erreur si le mail existe deja
function checkMail()
{
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $stmMail = $pdo->query("SELECT mail_u FROM utilisateur ");
    $mail = $stmMail->fetchAll(PDO::FETCH_ASSOC);
    foreach ($mail as $key => $value) {
        if ($value['mail_u'] === $_POST['email']) {
            return 1;
        }
    }
}
// retourne un message d'erreur si le code postal n'a pas 5 chiffres
function lenPostalCode()
{
    $PostalCode = strlen($_POST['code']);
    if ($PostalCode != 5 && $PostalCode != '') {
        return 2;
    }
}
// retourne un message d'erreur si le numero de telephone a + de 10 chiffres
function lenPhone()
{
    $Phone = strlen($_POST['tel']);
    if ($Phone != 10) {
        return 3;
    }
}
// oblige a l'inscription a choisir un age,un poid et une taille
function choice()
{
    if (isset($_POST['age']) && $_POST['age'] == 'Age') {
        return 1;
    } elseif (isset($_POST['poid']) && $_POST['poid'] == 'Poid(kg)') {
        return 2;
    } elseif (isset($_POST['taille']) && $_POST['taille'] == 'Taille(cm)') {
        return 3;
    }
}
// calcul l'imc ainsi que le poid ideal par rapport a la taille
function Imc()
{
    $imc = ($_POST['poid'] / pow($_POST['taille'], 2)) * 10000;
    $poidIdeal = pow(($_POST['taille'] / 100), 2) * 21.75;
    echo 'Ton IMC est de : ' . round($imc, 2) . "<br>" . "le poid ideal pour " . $_POST['taille'][0] . "m" . $_POST['taille'][1] . $_POST['taille'][2] . " est de : " . round($poidIdeal) . "kg <br>";
}

// permet de recuperer toute les infos du coach si il est connecter
if (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->query(
        'SELECT * FROM coach WHERE mail_c = "' . $_SESSION["login"] . '"'
    );
    $profilCoach = $statement->fetchAll(PDO::FETCH_ASSOC);
}

// si utilisateur connecter alors on voit toute ses informations
if (isset($_SESSION["connectedUser"]) &&  $_SESSION["connectedUser"]) {
    $statementU = $pdo->query(
        'SELECT * FROM utilisateur where mail_u = "' . $_SESSION["login"] . '"'
    );

    $user = $statementU->fetchAll(PDO::FETCH_ASSOC);
}

// modifie le nom,prenom et age du coach
if (isset($_POST['submit-info_c'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->prepare(
        ('UPDATE coach SET nom_c = :nom_c, prenom_c = :prenom_c, age_c = :age_c WHERE mail_c = "' . $_SESSION["login"] . '"')
    );
    if ($_POST['nom_c'] == "") {
        $_POST['nom_c'] = $profilCoach[0]['nom_c'];
    }
    if ($_POST['prenom_c'] == "") {
        $_POST['prenom_c'] = $profilCoach[0]['prenom_c'];
    }
    if ($_POST['age_c'] == "") {
        $_POST['age_c'] = $profilCoach[0]['age_c'];
    }
    if ($_POST['age_c'] == $profilCoach[0]['age_c'] && $_POST['prenom_c'] == $profilCoach[0]['prenom_c'] && $_POST['nom_c'] == $profilCoach[0]['nom_c']) {
        echo  "rien n'a été modifié";
    } else {
        $statement->execute(array(
            ':nom_c' => $_POST['nom_c'],
            ':prenom_c' => $_POST['prenom_c'],
            ':age_c' => $_POST['age_c']
        ));
        echo 'tes infos ont bien été modifier';
    }
}

// modifie l'adresse,la ville et le code postal du coach'
if (isset($_POST['submit-adress_c'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->prepare(
        ('UPDATE coach SET adresse_c = :adresse_c, ville_c = :ville_c, code_postal_c = :code_postal_c WHERE mail_c = "' . $_SESSION["login"] . '"')
    );
    if ($_POST['adresse_c'] == "") {
        $_POST['adresse_c'] = $profilCoach[0]['adresse_c'];
    }
    if ($_POST['ville_c'] == "") {
        $_POST['ville_c'] = $profilCoach[0]['ville_c'];
    }
    if ($_POST['code_postal_c'] == "") {
        $_POST['code_postal_c'] = $profilCoach[0]['code_postal_c'];
    }

    $PostalCode = strlen($_POST['code_postal_c']);
    if ($_POST['adresse_c'] == $profilCoach[0]['adresse_c'] && $_POST['ville_c'] == $profilCoach[0]['ville_c'] && $_POST['code_postal_c'] == $profilCoach[0]['code_postal_c']) {
        echo  "rien n'a été modifié";
    } elseif ($PostalCode == 5) {
        echo 'tes infos ont bien été modifier';
        $statement->execute(array(
            ':adresse_c' => $_POST['adresse_c'],
            ':ville_c' => $_POST['ville_c'],
            'code_postal_c' => $_POST['code_postal_c']
        ));
    } elseif ($PostalCode != 5) {
        echo 'ton code postal est invalide';
    }
}

// modifie le telephone du coach
if (isset($_POST['submit-contact_c'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->prepare(
        ('UPDATE coach SET telephone_c = :telephone_c WHERE mail_c = "' . $_SESSION["login"] . '"')
    );
    if ($_POST['telephone_c'] == "") {
        $_POST['telephone_c'] = $profilCoach[0]['telephone_c'];
    }

    $lentelephone = strlen($_POST['telephone_c']);
    if ($_POST['telephone_c'] == $profilCoach[0]['telephone_c']) {
        echo  "rien n'a été modifié";
    } elseif ($lentelephone == 10) {
        echo 'tes infos ont bien été modifier';
        $statement->execute(array(
            ':telephone_c' => $_POST['telephone_c']
        ));
    } elseif ($lentelephone != 10) {
        echo 'ton numero de telephone est invalide';
    }
}
// modifie la specialite du coach
if (isset($_POST['submit-speciality'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->prepare(
        ('UPDATE coach SET specialite = :specialite WHERE mail_c = "' . $_SESSION["login"] . '"')
    );
    if ($_POST['specialite'] == "") {
        $_POST['specialite'] = $profilCoach[0]['specialite'];
    }
    if ($_POST['specialite'] == $profilCoach[0]['specialite']) {
        echo  "rien n'a été modifié";
    } else {
        $statement->execute(array(
            ':specialite' => $_POST['specialite']
        ));
        echo 'ta specialite a bien été modifié';
    }
}

// modifie le mot de passe du coach
if (isset($_POST['submit-password_c'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $mdp = $pdo->query(
        'SELECT mdp_c FROM coach WHERE mail_c = "' . $_SESSION["login"] . '"'
    );
    $mdp = $mdp->fetchAll(PDO::FETCH_ASSOC);

    if ($mdp[0]['mdp_c'] === $_POST['ancient-password'] && $_POST['new-password'] == $_POST['confirm-password']) {
        $statement = $pdo->prepare(
            ('UPDATE coach SET mdp_c = :mdp_c WHERE mail_c = "' . $_SESSION["login"] . '"')
        );
        $statement->execute(array(
            ':mdp_c' => $_POST['new-password']
        ));
        echo 'ton nouveau mot de passe est creer';
    } elseif ($mdp[0]['mdp_c'] != $_POST['ancient-password']) {
        echo "ce n'est pas ton ancien mot de passe";
    } elseif ($_POST['new-password'] != $_POST['confirm-password']) {
        echo "ton nouveau de mot de passe n'est pas confirmer";
    }
}
// modifie l'image du coach
if (isset($_POST['submit-image_c'])) {
    upload();
}




// modifie le nom,prenom et age de l'utilisateur
if (isset($_POST['submit-info_u'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->prepare(
        ('UPDATE utilisateur SET nom_u = :nom_u, prenom_u = :prenom_u, age_u = :age_u WHERE mail_u = "' . $_SESSION["login"] . '"')
    );
    if ($_POST['nom_u'] == "") {
        $_POST['nom_u'] = $user[0]['nom_u'];
    }
    if ($_POST['prenom_u'] == "") {
        $_POST['prenom_u'] = $user[0]['prenom_u'];
    }
    if ($_POST['age_u'] == "") {
        $_POST['age_u'] = $user[0]['age_u'];
    }
    if ($_POST['age_u'] == $user[0]['age_u'] && $_POST['prenom_u'] == $user[0]['prenom_u'] && $_POST['nom_u'] == $user[0]['nom_u']) {
        echo  "rien n'a été modifié";
    } else {
        echo 'tes infos ont bien été modifier';
        $statement->execute(array(
            ':nom_u' => $_POST['nom_u'],
            ':prenom_u' => $_POST['prenom_u'],
            ':age_u' => $_POST['age_u']
        ));
    }
}

// modifie l'adresse,la ville et le code postal de l'utilisateur
if (isset($_POST['submit-adress_u'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->prepare(
        ('UPDATE utilisateur SET adresse_u = :adresse_u, ville_u = :ville_u, code_postal_u = :code_postal_u WHERE mail_u = "' . $_SESSION["login"] . '"')
    );
    if ($_POST['adresse_u'] == "") {
        $_POST['adresse_u'] = $user[0]['adresse_u'];
    }
    if ($_POST['ville_u'] == "") {
        $_POST['ville_u'] = $user[0]['ville_u'];
    }
    if ($_POST['code_postal_u'] == "") {
        $_POST['code_postal_u'] = $user[0]['code_postal_u'];
    }

    $PostalCode = strlen($_POST['code_postal_u']);
    if ($_POST['adresse_u'] == $user[0]['adresse_u'] && $_POST['ville_u'] == $user[0]['ville_u'] && $_POST['code_postal_u'] == $user[0]['code_postal_u']) {
        echo  "rien n'a été modifié";
    } elseif ($PostalCode == 5) {
        echo 'tes infos ont bien été modifier';
        $statement->execute(array(
            ':adresse_u' => $_POST['adresse_u'],
            ':ville_u' => $_POST['ville_u'],
            'code_postal_u' => $_POST['code_postal_u']
        ));
    } elseif ($PostalCode != 5) {
        echo 'ton code postal est invalide';
    }
}




// modifie le telephone de l'utilisateur
if (isset($_POST['submit-contact_u'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->prepare(
        ('UPDATE utilisateur SET telephone_u = :telephone_u WHERE mail_u = "' . $_SESSION["login"] . '"')
    );
    if ($_POST['telephone_u'] == "") {
        $_POST['telephone_u'] = $user[0]['telephone_u'];
    }
    $lentelephone = strlen($_POST['telephone_u']);
    if ($_POST['telephone_u'] == $user[0]['telephone_u']) {
        echo  "rien n'a été modifié";
    } elseif ($lentelephone == 10) {
        echo 'tes infos ont bien été modifier';
        $statement->execute(array(
            ':telephone_u' => $_POST['telephone_u']
        ));
    } elseif ($lentelephone != 10) {
        echo 'ton numero de telephone est invalide';
    }
}

// modifie les mensurations de l'utilisateur
if (isset($_POST['submit-body'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->prepare(
        ('UPDATE utilisateur SET taille = :taille, poid_u = :poid_u WHERE mail_u = "' . $_SESSION["login"] . '"')
    );
    if ($_POST['taille'] == "") {
        $_POST['taille'] = $user[0]['taille'];
    }
    if ($_POST['poid_u'] == "") {
        $_POST['poid_u'] = $user[0]['poid_u'];
    }
    if ($_POST['taille'] == $user[0]['taille'] && $_POST['poid_u'] == $user[0]['poid_u']) {
        echo  "rien n'a été modifié";
    } else {
        echo 'tes mensurations ont bien été modifié';
        $statement->execute(array(
            ':taille' => $_POST['taille'],
            'poid_u' => $_POST['poid_u']
        ));
    }
}


// modifie le mot de passe de l'utilisateur
if (isset($_POST['submit-password_u'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $mdp = $pdo->query(
        'SELECT mdp_u FROM utilisateur WHERE mail_u = "' . $_SESSION["login"] . '"'
    );
    $mdp = $mdp->fetchAll(PDO::FETCH_ASSOC);

    if ($mdp[0]['mdp_u'] === $_POST['ancient-password'] && $_POST['new-password'] == $_POST['confirm-password']) {
        $statement = $pdo->prepare(
            ('UPDATE utilisateur SET mdp_u = :mdp_u WHERE mail_u = "' . $_SESSION["login"] . '"')
        );
        $statement->execute(array(
            ':mdp_u' => $_POST['new-password']
        ));
        echo 'ton nouveau mot de passe est creer';
    } elseif ($mdp[0]['mdp_u'] != $_POST['ancient-password']) {
        echo "ce n'est pas ton ancien mot de passe";
    } elseif ($_POST['new-password'] != $_POST['confirm-password']) {
        echo "ton nouveau de mot de passe n'est pas confirmer";
    }
}

// modifie l'image de l'utilisateur
if (isset($_POST['submit-image_u'])) {
    upload();
}

// modifie la description du coach
if (isset($_POST['submit-info_c'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->prepare(
        ('UPDATE coach SET description_c = :description_c WHERE mail_c = "' . $_SESSION["login"] . '"')
    );
    if ($_POST['description_c'] == "") {
        $_POST['description_c'] = $profilCoach[0]['description_c'];
    }
    if ($_POST['description_c'] == $profilCoach[0]['description_c']) {
        echo  "rien n'a été modifié";
    } elseif(strlen($_POST['description_c'] > 250)){
        echo "il y a 250 caractere maximum dans ta description !!!!!!";
    } else {
        $statement->execute(array(
            ':description_c' => $_POST['description_c']
        ));
        echo 'ta description a bien été modifié';
    }
}

// modifie la description du coach
if (isset($_POST['submit-info_u'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->prepare(
        ('UPDATE coach SET description_u = :description_u WHERE mail_u = "' . $_SESSION["login"] . '"')
    );
    if ($_POST['description_u'] == "") {
        $_POST['description_u'] = $profilCoach[0]['description_u'];
    }
    if ($_POST['description_u'] == $profilCoach[0]['description_u']) {
        echo  "rien n'a été modifié";
    } elseif(strlen($_POST['description_u'] > 250)){
        echo "il y a 250 caractere maximum dans ta description !!!!!!";
    } else {
        $statement->execute(array(
            ':description_u' => $_POST['description_u']
        ));
        echo 'ta description a bien été modifié';
    }
}

//pour devenir premium
if(isset($_POST['submitPremium'])){
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $premium = $pdo->query(
        'SELECT id_utilisateur FROM utilisateur WHERE mail_u = "' . $_SESSION["login"] . '"'
    );
    $premium = $premium->fetchAll(PDO::FETCH_ASSOC);
    
    $statementPremium = $pdo->prepare(
        ('UPDATE utilisateur SET id_premium = :id_premium WHERE mail_u = "' . $_SESSION["login"] . '"')
    );
    $statementPremium->execute(array(
        ':id_premium' => $premium[0]['id_utilisateur']
    ));
    $statementPremiumDate = $pdo->prepare(
        "INSERT INTO premium(id_premium, date_abo_debut,date_abo_fin) 
        VALUES (:id_premium, :date_abo_debut, :date_abo_fin)"
    );
    $date = date('Y-m-d');
    $dateFin = date('Y-m-d',strtotime("+1 year"));
    $statementPremiumDate->execute(array(
        ':id_premium' => $premium[0]['id_utilisateur'],
        ':date_abo_debut' => $date,
        ':date_abo_fin' => $dateFin
    ));
    
    header('location: profil.php');
}

// pour savoir si l'utilisateur est premium ou pas
function premium(){
    if(isset($_SESSION["connectedUser"])){
        $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
        $premium = $pdo->query('SELECT u.id_premium, date_abo_debut, date_abo_fin FROM utilisateur u JOIN premium ON u.id_premium = premium.id_premium WHERE mail_u = "' . $_SESSION["login"] . '"');
        $premium = $premium->fetchAll(PDO::FETCH_ASSOC);
        return $premium;
       }
}


// redirection quand le User est connecté
if (isset($_SESSION["connectedUser"]) && $_SESSION["connectedUser"]) {
    if (isset($_GET["page"]) && $_GET["page"] === "login" || $_SERVER["REQUEST_URI"] === "/Sportify/php/login.php") {
        header('Location: accueil.php');
    } elseif (isset($_GET["page"]) && $_GET["page"] === "signup" || $_SERVER["REQUEST_URI"] === "/Sportify/php/signup.php") {
        header('Location: profil.php');
    }
}

// redirection quand le Coach est connecté
if (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) {
    if ((isset($_GET["page"]) && $_GET["page"] === "login" || $_SERVER["REQUEST_URI"] === "/Sportify/php/login.php") || (isset($_GET["page"]) && $_GET["page"] === "signup" || $_SERVER["REQUEST_URI"] === "/Sportify/php/signup.php")) {
        header('Location: accueil.php');
    }
}
