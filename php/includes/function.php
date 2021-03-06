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

            header('Location: home.php');

            break;

            // login for coach
        } elseif ($_POST["login"] != $user[$key]["mail_u"] && $_POST["password"] != $user[$key]["mdp_u"]) {
            foreach ($coach as $k => $v) {

                if ($_POST["login"] == $coach[$k]["mail_c"] && $_POST["password"] == $coach[$k]["mdp_c"]) {

                    $_SESSION["login"] = $_POST["login"];
                    $_SESSION["connectedCoach"] = true;
                    $_SESSION["connecte dAt"] = new DateTime();

                    header('Location: home.php');

                    break;
                }
            }
        } else {
            $error = "Votre identifiant est incorrecte !";
        }
    }
    if (isset($error)) {
        return $error;
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
                "INSERT INTO utilisateur ( nom_u, prenom_u, mdp_u, age_u, adresse_u, ville_u, code_postal_u, mail_u, telephone_u, poid_u, taille, validation_imc) 
                VALUES (:nom_u , :prenom_u, :mdp_u, :age_u, :adresse_u, :ville_u, :code_postal_u, :mail_u, :telephone_u, :poid_u, :taille, :validation_imc)"
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
                'validation_imc' => 1
            ));

            $_SESSION["login"] = $_POST['email'];
            $_SESSION["connectedUser"] = true;
            $_SESSION["connectedAt"] = new DateTime();

            $statementUser = $pdo->query('SELECT * FROM utilisateur WHERE mail_u = "' . $_SESSION["login"] . '"');
            $statementUser = $statementUser->fetchAll(PDO::FETCH_ASSOC);


            $Imc = Imc();
            $statementDay = $pdo->prepare(
                "INSERT INTO imc (imc, date_imc, id_utilisateur) 
                VALUES (:imc, :date_imc, :id_utilisateur)"
            );

            $statementDay->execute(array(
                ':imc' => $Imc,
                ':date_imc' => date('Y-m-d'),
                ':id_utilisateur' => $statementUser[0]['id_utilisateur'],
            ));

            // $success = "Vous etes inscrit !";
            header('Location: profil.php');

            // header('Location: profil.php');
        } elseif ($mail == 1) {
            $error = 'compte deja existant';
            return $error;
        } elseif ($PostalCode == 2) {
            $error = 'code postal pas bon';
            return $error;
        } elseif ($phone == 3) {
            $error = 'numero de telephone incorrect';
            return $error;
        } elseif ($choice == 1) {
            $error = "tu n'a pas rempli ton age";
            return $error;
        } elseif ($choice == 2) {
            $error = "tu n'a pas rempli ton poid";
            return $error;
        } elseif ($choice == 3) {
            $error = "tu n'a pas rempli ta taille";
            return $error;
        }
    } else {
        $error = 'les deux mot de passe ne sont pas pareil';
        return $error;
    }
}


// stocker une image, donner nom defini a une image, ainsi que le type et la taille
function upload()
{
    $extensions = array('.png', '.jpg', '.jpeg');
    $file = $_FILES['img']['name'];
    $extension = strrchr($file, '.');

    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    if (isset($_POST['submit_create_program'])) {
        $stmId = $pdo->query('SELECT id_programme FROM programme');
        $id = $stmId->fetchAll(PDO::FETCH_ASSOC);
        $var = $id[count($id) - 1]['id_programme'];
        $file = $var . "P" . $extension;
        $stmprogram = $pdo->prepare(
            ('UPDATE programme SET images_pro = :images_pro WHERE id_programme = "' . $var . '"')
        );
        $stmprogram->execute(array(
            ':images_pro' => $file
        ));
    } elseif (isset($_SESSION["connectedCoach"])) {
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
    if ($file == "") {
        $imgPro = '0.png';
    } else {
        $imgPro = $var . "P" . $extension;
    }

    if (!isset($error)) {
        if ($file != $imgPro) {
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
        }

        $file = strtolower($file);
        move_uploaded_file($_FILES['img']['tmp_name'], $folder);
        // echo 'ton image a bien été modifer';
        return $file;
    } elseif ($_FILES['img']['size'] == 0) {
        $error = "tu n'a pas ajouté d'image";
        return $error;
    } elseif ($error == 1) {
        $error = "l'extension n'est pas bonne";
        return $error;
    } elseif ($error == 2) {
        $error = "l'image est trop lourde";
        return $error;
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
    return $imc;
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
        ('UPDATE coach SET nom_c = :nom_c, prenom_c = :prenom_c, age_c = :age_c, description_c = :description_c WHERE mail_c = "' . $_SESSION["login"] . '"')
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
    if ($_POST['description_c'] == "") {
        $_POST['description_c'] = $profilCoach[0]['description_c'];
    }
    $lenDescription = strlen($_POST['description_c']);
    if ($_POST['age_c'] == $profilCoach[0]['age_c'] && $_POST['prenom_c'] == $profilCoach[0]['prenom_c'] && $_POST['nom_c'] == $profilCoach[0]['nom_c'] && $_POST['description_c'] == $profilCoach[0]['description_c']) {
        echo  "rien n'a été modifié";
    } elseif ($lenDescription > 250) {
        echo 'ta description fais plus de 250 caracteres';
    } else {
        $statement->execute(array(
            ':nom_c' => $_POST['nom_c'],
            ':prenom_c' => $_POST['prenom_c'],
            ':age_c' => $_POST['age_c'],
            'description_c' => $_POST['description_c']
        ));
        echo 'tes infos ont bien été modifier';
    }
    header('location: profil.php');
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
    header('location: profil.php');
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
    header('location: profil.php');
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
    header('location: profil.php');
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
    header('location: profil.php');
}

// modifie le nom,prenom et age de l'utilisateur
if (isset($_POST['submit-info_u'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->prepare(
        ('UPDATE utilisateur SET nom_u = :nom_u, prenom_u = :prenom_u, age_u = :age_u, description_u = :description_u WHERE mail_u = "' . $_SESSION["login"] . '"')
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
    if ($_POST['description_u'] == "") {
        $_POST['description_u'] = $user[0]['description_u'];
    }
    $lenDescription = strlen($_POST['description_u']);
    if ($_POST['age_u'] == $user[0]['age_u'] && $_POST['prenom_u'] == $user[0]['prenom_u'] && $_POST['nom_u'] == $user[0]['nom_u'] && $_POST['description_u'] == $user[0]['description_u']) {
        echo  "rien n'a été modifié";
    } elseif ($lenDescription > 250) {
        echo 'ta description fais plus de 250 caracteres';
    } else {
        echo 'tes infos ont bien été modifier';
        $statement->execute(array(
            ':nom_u' => $_POST['nom_u'],
            ':prenom_u' => $_POST['prenom_u'],
            ':age_u' => $_POST['age_u'],
            ':description_u' => $_POST['description_u']
        ));
    }
    header('location: profil.php');
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
    header('location: profil.php');
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
    header('location: profil.php');
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
    header('location: profil.php');
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
    header('location: profil.php');
}

// modifie l'image de l'utilisateur
if (isset($_POST['submit-image_u'])) {
    upload();
    header('location: profil.php');
}

//pour devenir premium
if (isset($_SESSION['connectedUser']) && $_SESSION['connectedUser'] && isset($_POST['submitPremium'])) {
    if (isset($_POST['submitPremium'])) {
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
        $dateFin = date('Y-m-d', strtotime("+1 year"));
        $statementPremiumDate->execute(array(
            ':id_premium' => $premium[0]['id_utilisateur'],
            ':date_abo_debut' => $date,
            ':date_abo_fin' => $dateFin
        ));

        header('location: profil.php');
    }
}

// pour savoir si l'utilisateur est premium ou pas
function premium()
{
    if (isset($_SESSION["connectedUser"])) {
        $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
        $premium = $pdo->query('SELECT u.id_premium, date_abo_debut, date_abo_fin FROM utilisateur u JOIN premium ON u.id_premium = premium.id_premium WHERE mail_u = "' . $_SESSION["login"] . '"');
        $premium = $premium->fetchAll(PDO::FETCH_ASSOC);
        return $premium;
    }
}

// permet de recuperer les infos pour la liste des coachs
$pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
$afficherCoach = $pdo->query('SELECT c.id_coach, images_c, nom_c, prenom_c, note, specialite, description_c FROM coach c JOIN donner ON donner.id_coach = c.id_coach');
$afficherCoach = $afficherCoach->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id_coach'])) {
    $listeCoachProfil = $pdo->query('SELECT * FROM coach WHERE id_coach = "' . $_GET['id_coach'] . '"');
    $listeCoachProfil = $listeCoachProfil->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['id_coach'] = $listeCoachProfil[0]['id_coach'];
}

if (isset($_GET['id_premium'])) {
    $listePremiumProfil = $pdo->query('SELECT * FROM utilisateur WHERE id_premium = "' . $_GET['id_premium'] . '"');
    $listePremiumProfil = $listePremiumProfil->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['id_premium'] = $listePremiumProfil[0]['id_premium'];
}


// Afficher la liste des user premium
if (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) {
    if (isset($_GET["page"]) && $_GET["page"] === "client" || $_SERVER["REQUEST_URI"] === "/Sportify/php/client.php") {
        $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");

        $statementPremium = $pdo->query('SELECT u.id_premium, nom_u, prenom_u, mail_u, telephone_u, p.date_abo_debut FROM utilisateur u JOIN premium  p ON u.id_premium = p.id_premium where u.id_premium is not null');
        $listPremium = $statementPremium->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($listPremium);
    }
}

//  Afficher la liste des programme enregistrer
if ((isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) || (isset($_SESSION["connectedUser"]) && $_SESSION["connectedUser"])) {
    if (isset($_GET['id'])) {
        $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");

        $statementProgram = $pdo->query('SELECT * FROM programme WHERE id_programme <= 15');
        $listProgram = $statementProgram->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($listProgram);
    }
}

// creer un programme
if (isset($_POST['submit_create_program'])) {

    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement_create_program = $pdo->prepare(
        "INSERT INTO programme ( nom_pro, descriptions, niveau, objectif) 
        VALUES (:nom_pro , :descriptions, :niveau, :objectif)"
    );
    if ($_POST['niveau'] == "Niveau") {
        echo "tu n'a pas choisis de niveau";
    } else {
        switch ($_POST['niveau']) {
            case 'Débutant':
                $niveau = 1;
                break;
            case 'Intermédiaire':
                $niveau = 2;
                break;
            case 'Difficile':
                $niveau = 3;
                break;
            case 'Custom':
                $niveau = 4;
                break;
        }
        $statement_create_program->execute(array(
            ':nom_pro' => $_POST['nom_pro'],
            ':descriptions' => $_POST['descriptions'],
            ':niveau' => $niveau,
            ':objectif' => $_POST['objectif']
        ));
        upload();
        // echo 'tu as creer ton programme';
    }
    $_SESSION['niveau'] = $niveau;

    // créer une séance avec un programme créer 
    if (isset($_POST['date']) && isset($_POST['id'])) {
        $statementProgram = $pdo->query('SELECT max(id_programme) FROM programme');
        $statementProgram = $statementProgram->fetchAll(PDO::FETCH_ASSOC);

        $statementMeeting = $pdo->prepare(
            "INSERT INTO seance(dates, id_programme) 
            VALUES (:dates, :id_programme)"
        );

        $statementMeeting->execute(array(
            ':dates' => $_POST['date'],
            ':id_programme' => intVal($statementProgram[0]['max(id_programme)'])
        ));

        $statementMeeting = $pdo->query('SELECT max(id_seance) FROM seance ');
        $idMeeting = $statementMeeting->fetchAll(PDO::FETCH_ASSOC);

        if ((isset($_SESSION["connectedUser"]) && $_SESSION["connectedUser"])) {
            $statementCreateMeeting = $pdo->prepare(
                "INSERT INTO creer(id_utilisateur, id_seance) 
            VALUES (:id_utilisateur, :id_seance)"
            );

            $statementCreateMeeting->execute(array(
                ':id_utilisateur' => $_POST['id'],
                ':id_seance' => $idMeeting[0]['max(id_seance)']
            ));
        } else {
            $statementCreateMeeting = $pdo->prepare(
                "INSERT INTO programmer(id_premium, id_coach, id_seance) 
                VALUES (:id_premium, :id_coach, :id_seance)"
            );

            $statementCreateMeeting->execute(array(
                ':id_premium' => $_POST['id'],
                ':id_coach' => $_POST['id_coach'],
                ':id_seance' => $idMeeting[0]['max(id_seance)']
            ));
        }
    }
}


//recupere les exercices pour les checkbox
$pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
$statementExercice = $pdo->query('SELECT * FROM exercice 
    JOIN repete ON repete.id_repete = exercice.id_repete
    order by id_exercice');
$statementExercice = $statementExercice->fetchAll(PDO::FETCH_ASSOC);

if (empty($_SESSION['niveau'])) {
    $_SESSION['niveau'] = 0;
}
switch ($_SESSION['niveau']) {
    case 1:
    case 4:
        for ($i = 0; $i < count($statementExercice); $i += 3) {
            $listExercice[] = $statementExercice[$i];
        }
        break;

    case 2:
        for ($i = 1; $i < count($statementExercice); $i += 3) {
            $listExercice[] = $statementExercice[$i];
        }
        break;
    case 3:
        for ($i = 2; $i < count($statementExercice); $i += 3) {
            $listExercice[] = $statementExercice[$i];
        }
        break;
}

// creer le programme et  les exercices
if (isset($_POST['submit_choiceExercice'])) {
    $listDuree = [];
    $listNbrepete = [];
    $listeNbserie = [];

    $statement_recupProgram = $pdo->query('SELECT id_programme FROM programme ');
    $statement_recupProgram = $statement_recupProgram->fetchAll(PDO::FETCH_ASSOC);

    $stmAllRepete = $pdo->query('SELECT * FROM repete');
    $stmAllRepete = $stmAllRepete->fetchAll(PDO::FETCH_ASSOC);

    $DernierProgrammeCreer = $statement_recupProgram[count($statement_recupProgram) - 1];
    if ($_SESSION['niveau'] == 4) {
        $count = 0;
        foreach ($statementExercice as $key => $value) {
            var_dump($key);
            if (isset($_POST['exercice' . $key])) {

                $listchecked[] = [
                    "id_exercice" => ($key),
                    "nom_ex" => $statementExercice[$key]['nom_ex'],
                    'images_ex' => $statementExercice[$key]['images_ex'],
                    "machine" => $statementExercice[$key]['machine'],
                    "id_repete" => (count($stmAllRepete) + 1 + $count),
                    "nb_serie" => $_POST['serie' . $key]
                ];
                $listInput[] = ($_POST['custom' . $key]);

                $count += 1;
            }
            // var_dump($_POST['exercice' . $key]);
        }
        var_dump($listchecked);
    } else {
        foreach ($statementExercice as $key => $value) {
            if (isset($_POST['exercice' . $key])) {
                $listchecked[] = [
                    "id_exercice" => ($key + 1),
                ];
            }
        }
    }

    if ($_SESSION['niveau'] == 4 && !empty($listInput)) {
        foreach ($listchecked as $key => $value) {
            if ($listInput[$key] == "" || empty($listchecked[$key]["nb_serie"])) {
                $error = "il y'a un exercice que tu as coché ou tu n'a pas mis le nombre de repete ou le nombre de serie que tu veux faire que tu vas faire";
            }
        }
        if (isset($error)) {
            echo $error;
        } else {
            foreach ($listInput as $key => $value) {
                $choice = strlen($listInput[$key]);
                if ($choice == 5) {
                    $listDuree[] = $listInput[$key];
                } else {
                    $listNbrepete[] = $listInput[$key];
                }
            }
            $stmNewRepete = $pdo->prepare(
                "INSERT INTO repete (poid_rep, nb_rep, duree)  VALUES (:poid_rep, :nb_rep, :duree)"
            );
            foreach ($listDuree as $key => $value) {
                $stmNewRepete->execute(array(
                    'poid_rep' => NULL,
                    ":nb_rep" => NULL,
                    ':duree' => $listDuree[$key]
                ));
            }
            $stmNewRepete = $pdo->prepare(
                "INSERT INTO repete ( nb_rep, poid_rep, duree) VALUES (:nb_rep, :poid_rep, :duree)"
            );
            foreach ($listNbrepete as $key => $value) {
                $stmNewRepete->execute(array(
                    'poid_rep' => NULL,
                    ":nb_rep" => $listNbrepete[$key],
                    ':duree' => NULL
                ));
            }
            $stmExercice = $pdo->prepare(
                "INSERT INTO exercice ( nom_ex, machine, images_ex, id_repete) 
                VALUES (:nom_ex, :machine, :images_ex, :id_repete)"
            );
            foreach ($listchecked as $key => $value) {
                $stmExercice->execute(array(
                    ':nom_ex' => $listchecked[$key]['nom_ex'],
                    ':machine' => $listchecked[$key]['machine'],
                    'images_ex' => $listchecked[$key]['images_ex'],
                    'id_repete' => $listchecked[$key]['id_repete']
                ));
            }


            $stmPossede = $pdo->prepare(
                "INSERT INTO possede ( id_exercice, id_programme, nb_serie) 
                    VALUES (:id_exercice, :id_programme, :nb_serie)"
            );
            foreach ($listchecked as $key => $value) {

                $stmPossede->execute(array(
                    ':id_exercice' => $listchecked[$key]['id_exercice'],
                    ':id_programme' => $DernierProgrammeCreer['id_programme'],
                    ':nb_serie' => $listchecked[$key]['nb_serie'],
                ));
            }
 
        }
    } elseif ($_SESSION['niveau'] == 4 && empty($listInput)) {
        echo "tu as rempli un input sans cocher l'exercice";
    } else {
        if (!empty($listchecked)) {
            if (count($listchecked) > 1) {
                $stmPossede = $pdo->prepare(
                    "INSERT INTO possede ( id_exercice, id_programme, nb_serie) 
                VALUES (:id_exercice, :id_programme, :nb_serie)"
                );
                foreach ($listchecked as $key => $value) {
                    $stmPossede->execute(array(
                        ':id_exercice' => $listchecked[$key]['id_exercice'],
                        ':id_programme' => $DernierProgrammeCreer['id_programme'],
                        ':nb_serie' => ($_SESSION['niveau'] + 2)
                    ));
                }
            } else {
                echo 'il faut minimum 2 exercices a ton programme';
            }
        } else {
            echo 'il faut minimum 2 exercices a ton programme';
        }
    }
}


// Afficher la seance du user premium pour le coach
if ((isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"])) {
    if (isset($_GET['id'])) {
        $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");

        $statementPremium = $pdo->query('SELECT u.id_premium, s.id_seance, nom_u, prenom_u, dates, validation_s, nom_c, s.id_programme
        FROM utilisateur u
        join premium prem on u.id_premium = prem.id_premium
        join programmer prog on prog.id_premium = prem.id_premium
        join seance s on s.id_seance = prog.id_seance
        join coach c on c.id_coach = prog.id_coach
        where u.id_premium = 1
        UNION
        SELECT u.id_premium, s.id_seance, nom_u, prenom_u, dates, validation_s, nom_c, s.id_programme
        FROM utilisateur u
   		LEFT join creer cr ON cr.id_utilisateur = u.id_utilisateur
        LEFT join seance s on cr.id_seance = s.id_seance
        LEFT JOIN programmer prog on prog.id_seance = s.id_seance
        LEFT join coach c on c.id_coach = prog.id_coach
        where u.id_premium = "' . $_GET['id'] . '"');

        $sessionPremium = $statementPremium->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($sessionPremium);
    }
}

// Afficher la seance du user premium
if (isset($_GET["page"]) && $_GET["page"] === "meeting" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/meeting.php") {

    if ((isset($_SESSION["connectedUser"]) && $_SESSION["connectedUser"])) {
        $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
        $premium = premium();

        if (empty($premium[0]['id_premium'])) {
            $statementUser = $pdo->query(
                'SELECT u.id_utilisateur, s.id_seance, dates, validation_s, s.id_programme
        FROM utilisateur u
        join creer cr on cr.id_utilisateur = u.id_utilisateur
        join seance s on s.id_seance = cr.id_seance
        WHERE mail_u = "' . $_SESSION["login"] . '"'
            );
            $statementUser = $statementUser->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($statementUser);

            if (empty($statementUser)) {
                $statementUser = $pdo->query(
                    'SELECT * FROM utilisateur WHERE mail_u = "' . $_SESSION["login"] . '"'
                );
                $statementUser = $statementUser->fetchAll(PDO::FETCH_ASSOC);

                $result = true;
                return 0;
            }
            $result = false;
        } else {
            $statementPremium = $pdo->query('SELECT u.id_utilisateur, s.id_seance, dates, validation_s, nom_c, s.id_programme
        FROM utilisateur u
        left join creer cr on cr.id_utilisateur = u.id_utilisateur
        left join seance s on s.id_seance = cr.id_seance
        left join programmer prog on prog.id_seance = s.id_seance
        left join coach c on c.id_coach = prog.id_coach
        WHERE mail_u = "' . $_SESSION["login"] . '"');
            $sessionPremium = $statementPremium->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($sessionPremium);

            if (empty($sessionPremium)) {
                $statementPremium = $pdo->query(
                    'SELECT * FROM utilisateur WHERE mail_u = "' . $_SESSION["login"] . '"'
                );
                $sessionPremium = $statementPremium->fetchAll(PDO::FETCH_ASSOC);

                $result = true;
                return 0;
            }

            $result = false;
        }
    }
}

function checkedCheckBox($checkBox)
{
    if ($checkBox == 1) {
        return 'checked';
    }
}

// valider la séance de user
if (isset($_GET['id_seance'])) {

    if (isset($_GET['checked'])) {
        $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
        $statement = $pdo->prepare(
            ('UPDATE seance SET validation_s = :validation_s WHERE id_seance = "' . $_GET['id_seance'] . '"')
        );
        $statement->execute(array(
            ':validation_s' => 1
        ));

        // $statement = $pdo->prepare(
        //     ('UPDATE seance SET poid_s = :poid_s WHERE id_seance = "' . $_GET['id_seance'] . '"')
        // );
        // $statement->execute(array(
        //     ':poid_s' => $_GET['weigth']
        // ));
    } else {
        $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
        $statement = $pdo->prepare(
            ('UPDATE seance SET validation_s = :validation_s WHERE id_seance = "' . $_GET['id_seance'] . '"')
        );
        $statement->execute(array(
            ':validation_s' => 0
        ));

        // if (isset($_GET['weigth'])) {
        //     $statement = $pdo->prepare(
        //         ('UPDATE seance SET poid_s = :poid_s WHERE id_seance = "' . $_GET['id_seance'] . '"')
        //     );
        //     $statement->execute(array(
        //         ':poid_s' => NULL
        //     ));
        // }
    }
}
// var_dump($_SERVER);
if ((isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"])) {
    $statementIdCoach = $pdo->query('SELECT * FROM coach where mail_c = "' . $_SESSION['login'] . '"');
    $idCoach = $statementIdCoach->fetchAll(PDO::FETCH_ASSOC);
}

// créer une séance avec un programme déjà créer 
if (isset($_POST['date']) && isset($_POST['id_prog']) && isset($_POST['id'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");

    $statementMeeting = $pdo->prepare(
        "INSERT INTO seance(dates, id_programme) 
        VALUES (:dates, :id_programme)"
    );

    $statementMeeting->execute(array(
        ':dates' => $_POST['date'],
        ':id_programme' => $_POST['id_prog'],
    ));

    $statementMeeting = $pdo->query('SELECT max(id_seance) FROM seance ');
    $idMeeting = $statementMeeting->fetchAll(PDO::FETCH_ASSOC);

    if ((isset($_SESSION["connectedUser"]) && $_SESSION["connectedUser"])) {
        $statementCreateMeeting = $pdo->prepare(
            "INSERT INTO creer(id_utilisateur, id_seance) 
            VALUES (:id_utilisateur, :id_seance)"
        );

        $statementCreateMeeting->execute(array(
            ':id_utilisateur' => $_POST['id'],
            ':id_seance' => $idMeeting[0]['max(id_seance)']
        ));
    } else {
        $statementCreateMeeting = $pdo->prepare(
            "INSERT INTO programmer(id_premium, id_coach, id_seance) 
            VALUES (:id_premium, :id_coach, :id_seance)"
        );

        $statementCreateMeeting->execute(array(
            ':id_premium' => $_POST['id'],
            ':id_coach' => $_POST['id_coach'],
            ':id_seance' => $idMeeting[0]['max(id_seance)']
        ));
    }
}

if (!(isset($_SESSION["connectedCoach"])) && !(isset($_SESSION["connectedUser"]))) {
    if ((isset($_GET["page"]) && $_GET["page"] === "profil" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/profil.php") || (isset($_GET["page"]) && $_GET["page"] === "list-coach-profil" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/listecoachprofil.php")  || (isset($_GET["page"]) && $_GET["page"] === "coach" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/coach.php") || (isset($_GET["page"]) && $_GET["page"] === "client" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/client.php") || (isset($_GET["page"]) && $_GET["page"] === "list-Exercice" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/choiceExercice.php") || (isset($_GET["page"]) && $_GET["page"] === "meeting" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/meeting.php") || (isset($_GET["page"]) && $_GET["page"] === "list-program" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/listProgram.php")) {
        header('Location: login.php');
    }
}

// redirection quand le User est connecté
if (isset($_SESSION["connectedUser"]) && $_SESSION["connectedUser"]) {
    if (isset($_GET["page"]) && $_GET["page"] === "login" || $_SERVER["REQUEST_URI"] === "/Sportify/php/login.php") {
        header('Location: home.php');
    } elseif (isset($_GET["page"]) && $_GET["page"] === "signup" || $_SERVER["REQUEST_URI"] === "/Sportify/php/signup.php") {
        header('Location: profil.php');
    } elseif (isset($_GET["page"]) && $_GET["page"] === "list-coach-profil" || $_SERVER["REQUEST_URI"] === "/Sportify/php/listecoachprofil.php") {
        header('Location: coach.php');
    } elseif (isset($_GET["page"]) && $_GET["page"] === "list-program" || $_SERVER["REQUEST_URI"] === "/Sportify/php/listProgram.php") {
        header('Location: meeting.php');
    }
}

// redirection quand le Coach est connecté
if (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) {
    if ((isset($_GET["page"]) && $_GET["page"] === "login" || $_SERVER["REQUEST_URI"] === "/Sportify/php/login.php") || (isset($_GET["page"]) && $_GET["page"] === "signup" || $_SERVER["REQUEST_URI"] === "/Sportify/php/signup.php")) {
        header('Location: home.php');
    }
}
// si l'utilisateur est connecter on recupere ces infos
if (isset($_SESSION["connectedUser"])) {
    $statementAllUser = $pdo->query('SELECT * FROM utilisateur WHERE mail_u = "' . $_SESSION["login"] . '"');
    $statementAllUser = $statementAllUser->fetchAll(PDO::FETCH_ASSOC);
}

// valide l'imc sur la page imc et ajoute une ligne dans la table imc
if (isset($_POST['valide_imc'])) {
    $Imc = Imc();
    $statementDay = $pdo->prepare(
        "INSERT INTO imc (imc, date_imc, id_utilisateur) 
        VALUES (:imc, :date_imc, :id_utilisateur)"
    );

    $statementDay->execute(array(
        ':imc' => $Imc,
        ':date_imc' => date('Y-m-d'),
        ':id_utilisateur' => $statementAllUser[0]['id_utilisateur'],
    ));

    $statementValidation_imc = $pdo->prepare(
        ('UPDATE utilisateur SET validation_imc = :validation_imc WHERE mail_u = "' . $_SESSION["login"] . '"')
    );
    $statementValidation_imc->execute(array(
        ':validation_imc' => 1
    ));
}

// la variable $stmImc est transferer vers graphic.js pour le graphique. on recupere les infos imc de l'utilisateur connecter
if (isset($_SESSION["connectedUser"])) {
    $stmImc = $pdo->query(
        'SELECT imc, date_imc FROM imc WHERE id_utilisateur = "' . $statementAllUser[0]['id_utilisateur'] . '"'
    );
    $stmImc = $stmImc->fetchAll(PDO::FETCH_ASSOC);
}


// function pour que l'imc soit demander toute les 2 semaines
function imcRecurrence()
{
    if (isset($_SESSION["connectedUser"])) {
        $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");

        $statementAllUser = $pdo->query('SELECT * FROM utilisateur WHERE mail_u = "' . $_SESSION["login"] . '"');
        $statementAllUser = $statementAllUser->fetchAll(PDO::FETCH_ASSOC);

        $statementDate_imc = $pdo->query('SELECT date_imc FROM imc WHERE id_utilisateur = "' . $statementAllUser[0]['id_utilisateur'] . '"');
        $statementDate_imc = $statementDate_imc->fetchAll(PDO::FETCH_ASSOC);

        $lastDate = $statementDate_imc[count($statementDate_imc) - 1]['date_imc'];
        $lastDate = strtotime(date("Y-m-d", strtotime($lastDate)) . " +1 day");

        $day = strtotime(date('Y-m-d'));
        if ($day == $lastDate) {
            $statementValidation_imc = $pdo->prepare(
                ('UPDATE utilisateur SET validation_imc = :validation_imc WHERE mail_u = "' . $_SESSION["login"] . '"')
            );
            $statementValidation_imc->execute(array(
                ':validation_imc' => 0
            ));
        }

        $statementAllUser = $pdo->query('SELECT * FROM utilisateur WHERE mail_u = "' . $_SESSION["login"] . '"');
        $statementAllUser = $statementAllUser->fetchAll(PDO::FETCH_ASSOC);

        if ($statementAllUser[0]['validation_imc'] == 0) {
            return 1;
        } else {
            return 0;
        }
    }
}

if (isset($_GET['id_program'])) {
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");

    $statementProgram = $pdo->query('SELECT * FROM programme WHERE id_programme = "' . $_GET["id_program"] . '"');
    $statementProgram = $statementProgram->fetchAll(PDO::FETCH_ASSOC);

    $statementListExercice = $pdo->query('SELECT * FROM exercice ex 
    JOIN possede p ON ex.id_exercice = p.id_exercice
    JOIN repete r ON  r.id_repete = ex.id_repete
    WHERE id_programme = "' . $_GET["id_program"] . '"');
    $statementListExercice = $statementListExercice->fetchAll(PDO::FETCH_ASSOC);
}
