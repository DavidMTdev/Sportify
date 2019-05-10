<div class="nav-header">

    <a href="index.php?page=accueil" class="nav-logo"><img src="images/logo.png" alt=""></a>

    <div class="nav">
        <ul class="nav-menu">
            <li><a href="">Nutrition</a></li>
            <?php if (isset($_SESSION["connectedUser"]) && $_SESSION["connectedUser"]) : ?>
                <li><a href="">Profil</a></li>
                <li><a href="">Coach</a></li>
            <?php elseif (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) : ?>
                <li><a href="">Profil</a></li>
            <?php endif; ?>
        </ul>

        <ul class="nav-login">
            <?php if (isset($_SESSION["connectedUser"]) && $_SESSION["connectedUser"] || isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) : ?>
                <li><a href="disconnection.php">Deconnexion</a></li>
            <?php else : ?>
                <li><a href="login.php">Se connecter</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>