<?php
require_once("includes/header.php");
require_once("includes/function.php");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>

    <img src=<?= '../upload/' . $profilCoach[0]['images_c'] ?> alt="">
    <h2>Nom</h2>
    <?= $profilCoach[0]['nom_c'] ?>
    <h2>Prénom</h2>
    <?= $profilCoach[0]['prenom_c'] ?>
    <h2>Age</h2>
    <?= $profilCoach[0]['age_c'] ?>
    <button type="submit" class="js-submit-infoPrincipal">changer info principal</button>
    <h2>adresse </h2>
    <?= $profilCoach[0]['adresse_c'] ?>
    <h2>ville</h2>
    <?= $profilCoach[0]['ville_c'] ?>
    <h2>Code postal</h2>
    <?= $profilCoach[0]['code_postal_c'] ?>
    <h2> Mail </h2>
    <?= $profilCoach[0]['mail_c'] ?>
    <h2>telephone</h2>
    <?= $profilCoach[0]['telephone_c'] ?>
    <h2>Spécialité</h2>
    <?= $profilCoach[0]['specialite'] ?>

    
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="img">
    <input type="submit" name="submit-image_c">
    </form>

    <form action="" method="post" class="js-infoPrincipal">
        <input type="text" name="nom_c" placeholder="Nom">
        <input type="text" name="prenom_c" placeholder="Prenom">
        <input type="text" name="age_c" placeholder="Age">
        <input type="submit" name="submit-info_c">
    </form>

    <form action="" method="post" class="js-infoRural">
        <input type="text" name="adresse_c" placeholder="Adresse">
        <input type="text" name="ville_c" placeholder="Ville">
        <input type="text" name="code_postal_c" placeholder="Code Postal">
        <input type="submit" name="submit-rural_c">
    </form>

    <form action="" method="post" class="js-contact">
        <input type="text" name="telephone_c" placeholder="Telephone">
        <input type="submit" name="submit-contact_c">
    </form>

    <form action="" method="post" class="js-password">
        <label for="">Ancien Mot de passe</label>
        <input type="password" name="ancient-password">
        <label for="">Nouveau Mot de passe</label>
        <input type="password" name="new-password">
        <label for="">Confirmer Mot de passe</label>
        <input type="password" name="confirm-password">
        <input type="submit" name="submit-password_c">
    </form>

    <form action="" method="post" class="specialite">
        <input type="text" name="specialite" placeholder="specialite">
        <input type="submit" name="submit-specialite">
    </form>

    







</body>

</html>