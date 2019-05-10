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
            $_SESSION["connected"] = true;
            $_SESSION["connectedAt"] = new DateTime();

            echo "vous est co";

            // login for coach
        } elseif ($_POST["login"] == $coach[$key]["mail_c"] && $_POST["password"] == $coach[$key]["mdp_c"]) {

            $_SESSION["login"] = $_POST["login"];
            $_SESSION["connected"] = true;
            $_SESSION["connectedAt"] = new DateTime();

            echo "vous est co";
        } else {
            $error = "Votre identifiant est incorrecte !";
            echo $error;
        }
    }
}

// insere l'inscription dans la base de donnée
if (isset($_POST['mdp']) && isset($_POST['verification']) && isset($_POST['submit'])) {
    if ($_POST['mdp'] == $_POST['verification']) {
        
        $mail = checkMail();
        $PostalCode = lenPostalCode();
        $phone = lenPhone();

        $choice = choice();
        

        if (!($mail == 1) && !($PostalCode == 2) && !($phone == 3) && empty($choice)){
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
            echo $success;
        } elseif($mail == 1){
            echo 'compte deja existant';
        } elseif($PostalCode == 2){
            echo 'code postal pas bon';
        } elseif($phone == 3){
            echo 'numero de telephone incorrect';
        } elseif($choice == 1){
            echo "tu n'a pas rempli ton age";
        }
        elseif($choice == 2){
            echo "tu n'a pas rempli ton poid";
        }
        elseif($choice == 3){
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
    $file = $_FILES['image']['name'];
    $extension = strrchr($file, '.');

    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");

    $stmId = $pdo->query("SELECT id_utilisateur FROM utilisateur ");
    $id = $stmId->fetchAll(PDO::FETCH_ASSOC);

    $a = count($id) - 1;

    if (empty($id)) {
        $var = 1;
    } else {
        $var = intval(end($id[$a])) + 1;
    }

    $file = $var . $extension;

    $folder = '../upload/' . $file;

    if (!in_array($extension, $extensions)) {
        return 1;
    }

    if ($_FILES['image']['size'] < 2 * pow(10, 6)) {
        $file = strtolower($file);
        move_uploaded_file($_FILES['image']['tmp_name'], $folder);

        return $file;
    } else {
        return 2;
    }
}

function checkMail(){
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $stmMail = $pdo->query("SELECT mail_u FROM utilisateur ");
    $mail = $stmMail->fetchAll(PDO::FETCH_ASSOC);
    foreach ($mail as $key => $value) {
        if ($value['mail_u'] === $_POST['email']){
            return 1;
        }
    }
}

function lenPostalCode(){
    $PostalCode = strlen($_POST['code']); 
    if ($PostalCode != 5 ){
        return 2;
    }
}

function lenPhone(){
    $Phone = strlen($_POST['tel']); 
    if ($Phone != 10 ){
        return 3;
    }
}

function choice(){
    if (isset($_POST['age']) && $_POST['age'] == 'Age'){
        return 1;
    }
    elseif (isset($_POST['poid']) && $_POST['poid'] == 'Poid(kg)'){
        return 2;
    }
    elseif (isset($_POST['taille']) && $_POST['taille'] == 'Taille(cm)'){
        return 3;
    }
}
