<?php require_once("includes/function.php") ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Inscription</title>
</head>

<body>
    <header>
        <div class="nav-header">

            <a href="" class="nav-logo"><img src="../Logo/logo_fond_noir2x.png" alt=""></a>

            <div class="nav">
                <ul class="nav-menu">
                    <li><a href="">Nutrition</a></li>
                    <li><a href="">Profil</a></li>
                    <li><a href="">Coach</a></li>
                </ul>

                <ul class="nav-login">
                    <li><a href="">Se connecter</a></li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        <form action="" method="POST" class="signup-box">
            <h1>Signup</h1>
            <div class="signup">
                <div class="user-name">
                    <input class="signup-info" type="text" name="nom" placeholder="Nom">
                    <input class="signup-info" type="text" name="prenom" placeholder="Prénom">
                </div>

                <div class="user-adress">
                    <input class="signup-info" type="text" name="adresse" placeholder="Rue">
                    <input class="signup-info" type="text" name="ville" placeholder="Ville">
                    <input class="signup-info" type="text" name="code" placeholder="Code postal">
                </div>

                <div class="user-infos">
                    <input class="signup-info" type="number" name="age" placeholder="Age">
                    <input class="signup-info" type="number" name="poid" placeholder="Poids">
                    <input class="signup-info" type="number" name="taille" placeholder="Taille(cm)">
                </div>

                <div class="user-contact">
                    <input class="signup-info" type="text" name="email" placeholder="Mail">
                    <input class="signup-info" type="text" name="tel" placeholder="N° de Téléphone">
                </div>

                <div class="user-password">
                    <input class="signup-password" type="password" name="mdp" placeholder="Password">
                    <input class="signup-password" type="password" name="" placeholder="Confirmer le password">
                </div>

                <input class="signup-submit" type="submit" value="Signup">
            </div>
        </form>

    </main>

</body>

</html>