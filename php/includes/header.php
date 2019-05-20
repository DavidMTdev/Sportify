<?php require_once("includes/function.php");
if (empty($_SESSION['id_coach'])) {
    $_SESSION['id_coach'] = 0;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
    <?php if (isset($_GET["page"]) && $_GET["page"] === "login" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/login.php") : ?>
        <link rel="stylesheet" href="css/login.css">
    <?php elseif (isset($_GET["page"]) && $_GET["page"] === "signup" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/signup.php") : ?>
        <link rel="stylesheet" href="css/signup.css">
    <?php elseif ((isset($_GET["page"]) && $_GET["page"] === "profil" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/profil.php") || (isset($_GET["page"]) && $_GET["page"] === "listecoachprofil" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/listecoachprofil.php")) : ?>
        <?php if (!(isset($_GET["page"]) && $_GET["page"] === "listecoachprofil" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/listecoachprofil.php")) : ?>
            <link rel="stylesheet" href="css/modification-window.css">
        <?php endif; ?>
        <link rel="stylesheet" href="css/profil.css">
    <?php elseif (isset($_GET["page"]) && $_GET["page"] === "coach" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/coach.php") : ?>
        <link rel="stylesheet" href="css/coach.css">
    <?php elseif ((isset($_GET["page"]) && $_GET["page"] === "premium" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/premium.php") && empty($premium[0]['id_premium'])) : ?>
        <link rel="stylesheet" href="css/premium.css">
    <?php elseif (isset($_GET["page"]) && $_GET["page"] === "client" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/client.php") : ?>
        <link rel="stylesheet" href="css/client.css">
    <?php elseif (isset($_GET["page"]) && $_GET["page"] === "client" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/meeting.php") : ?>
        <link rel="stylesheet" href="css/meeting.css">
    <?php endif; ?>

    <?php if (isset($_GET["page"]) && $_GET["page"] === "profil" || $_SERVER["SCRIPT_NAME"] === "/Sportify/php/profil.php") : ?>
        <?php if (isset($_SESSION["connectedUser"]) &&  $_SESSION["connectedUser"]) : ?>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
            <script src="js/profilUser.js" async></script>
            <script src="js/graphic.js" async></script>
            <script>var imc = <?php echo json_encode($stmImc); ?>;</script>
            
        <?php else : ?>
            <script src="js/profilCoach.js" async></script>
        <?php endif; ?>
    <?php endif; ?>
    <script src="js/burger.js" async></script>
    <title>Inscription</title>
    <link rel="stylesheet" href="css/listProgram.css">
</head>

<body>
    <header>
        <?php require_once("includes/nav.php") ?>
    </header>

    <main>