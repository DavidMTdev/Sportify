 <?php $premium = premium();
    ?>

<div class="nav-header">

    <a href="index.php?page=accueil" class="nav-logo"><img src="images/logo.png" alt=""></a>

    <div class="nav">
        <ul class="nav-menu">
            <li><a href="">Nutrition</a></li>
            <?php if (isset($_SESSION["connectedUser"]) && $_SESSION["connectedUser"]) : 
                        if(empty($premium[0]['id_premium'])) : ?>
                            <li><a href="profil.php">Profil</a></li>
                            <li><a href="premium.php">Premium</a></li>
                        <?php else : ?>
                            <li><a href="profil.php">Profil</a></li>
                            <li><a href="coach.php">Coach</a></li>
                        <?php endif; ?>
                        
                    
                

            <?php elseif (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) : ?>
                <li><a href="profil.php">Profil</a></li>
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