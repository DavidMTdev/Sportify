<?php require_once("includes/function.php") ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Accueil</title>
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
        <form action="" method="POST" class="login-box">
            <h1>Login</h1>
            <input class="login-name" type="mail" name="login" placeholder="Username">
            <input class="login-password" type="password" name="password" placeholder="Password">
            <input class="login-submit" type="submit" value="Login">

            <a href="">Vous n'avez pas de compte créez en un !<br></a>
            <a href="">Mot de passe oublié ?<br> </a>
        </form>

    </main>

</body>

</html>