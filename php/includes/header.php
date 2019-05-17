<?php require_once("includes/function.php");
if(empty($_SESSION['id_coach'])){
    $_SESSION['id_coach'] = 0;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/premium.css">
    <?php if (isset($_GET["page"]) && $_GET["page"] === "login" || $_SERVER["REQUEST_URI"] === "/Sportify/php/login.php") : ?>
        <link rel="stylesheet" href="css/login.css">
    <?php elseif (isset($_GET["page"]) && $_GET["page"] === "signup" || $_SERVER["REQUEST_URI"] === "/Sportify/php/signup.php") : ?>
        <link rel="stylesheet" href="css/signup.css">
    <?php elseif ((isset($_GET["page"]) && $_GET["page"] === "profil" || $_SERVER["REQUEST_URI"] === "/Sportify/php/profil.php") || ($_SERVER["REQUEST_URI"] === "/Sportify/php/listecoachprofil.php?id_coach=" . $_SESSION['id_coach']))  : ?>
        <link rel="stylesheet" href="css/profil.css">
        <link rel="stylesheet" href="css/modification-window.css">
    <?php elseif (isset($_GET["page"]) && $_GET["page"] === "coach" || $_SERVER["REQUEST_URI"] === "/Sportify/php/coach.php") : ?>
        <link rel="stylesheet" href="css/coach.css">
    <?php endif; ?>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Inscription</title>
    <?php if (isset($_GET["page"]) && $_GET["page"] === "profil" || $_SERVER["REQUEST_URI"] === "/Sportify/php/profil.php") : ?>
        <?php if (isset($_SESSION["connectedUser"]) &&  $_SESSION["connectedUser"]) : ?>
            <script src="js/profilUser.js" async></script>
        <?php else : ?>
            <script src="js/profilCoach.js" async></script>
        <?php endif; ?>
    <?php endif; ?>

</head>

<body>
    <header>
        <?php require_once("includes/nav.php") ?>
    </header>

    <main>