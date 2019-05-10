<div class="nav-header">

    <a href="index.php?page=accueil" class="nav-logo"><img src="images/logo.png" alt=""></a>

    <div class="nav">
        <ul class="nav-menu">
            <li><a href="">Nutrition</a></li>
            <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"]) : ?>
                <li><a href="">Profil</a></li>
                <li><a href="">Coach</a></li>
            <?php endif; ?>
        </ul>

        <ul class="nav-login">
            <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"]) : ?>
                <li><a href="disconnection.php">Deconnexion</a></li>
            <?php else : ?>
                <li><a href="login.php?page=login">Se connecter</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>