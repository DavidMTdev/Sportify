<?php require_once("includes/header.php");

if ($_SERVER["SCRIPT_NAME"] === "/Sportify/php/index.php") {
    header('Location: home.php');
}

if (isset($_GET["page"])) {
    $variable = $_GET["page"];
    switch ($variable) {
        case 'login':
            require_once("login.php");
            break;
        case 'signup':
            require_once("signup.php");
            break;
        case 'profil':
            require_once("profil.php");
            break;
        case 'home':
            require_once("home.php");
            break;
        case 'coach':
            require_once("coach.php");
            break;
        default:
            echo "page non trouvée";
            break;
    }
}
?>
<form action="" method="get" name="page"></form>

<?php require_once("includes/footer.php"); ?>