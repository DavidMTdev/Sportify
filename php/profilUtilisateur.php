<?php require_once("includes/header.php");
require_once("includes/function.php"); ?>

<?php 
if (isset($_SESSION["connectedUser"]) && $_SESSION["connectedUser"]) { 
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");
    $statement = $pdo->query(
    'SELECT * FROM utilisateur WHERE mail_u = "' . $_SESSION["login"] . '"'
);
    $profilUser = $statement->fetchAll(PDO::FETCH_ASSOC);
}

?>

<img src=<?= '../upload/' . $profilUser[0]['images_u'] ?> alt="">
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="img">
    <input type="submit" name="submit-image_u">
    </form>

    <form action="" method="post" class="js-infoPrincipal">
        <input type="text" name="nom_u" placeholder="Nom">
        <input type="text" name="prenom_u" placeholder="Prenom">
        <input type="text" name="age_u" placeholder="Age">
        <input type="submit" name="submit-info_u">
    </form>

    <form action="" method="post" class="js-infoRural">
        <input type="text" name="adresse_u" placeholder="Adresse">
        <input type="text" name="ville_u" placeholder="Ville">
        <input type="text" name="code_postal_u" placeholder="Code Postal">
        <input type="submit" name="submit-rural_u">
    </form>

    <form action="" method="post" class="js-contact">
        <input type="text" name="telephone_u" placeholder="Telephone">
        <input type="submit" name="submit-contact_u">
    </form>

    <form action="" method="post" class="js-password">
        <label for="">Ancien Mot de passe</label>
        <input type="password" name="ancient-password">
        <label for="">Nouveau Mot de passe</label>
        <input type="password" name="new-password">
        <label for="">Confirmer Mot de passe</label>
        <input type="password" name="confirm-password">
        <input type="submit" name="submit-password_u">
    </form>

    <form action="" method="post" >
        <input type="text" name="taille" placeholder="Taille">
        <input type="text" name="poid_u" placeholder="Poid">
        <input type="submit" name="submit-mensuration">
    </form>

