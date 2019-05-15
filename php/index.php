<?php require_once("includes/header.php");

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
        case 'accueil':
            require_once("accueil.php");
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

</main>
<footer></footer>

</body>

</html>