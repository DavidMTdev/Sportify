<?php require_once("includes/header.php") ?>

<form action="" method="POST" class="signup-box" enctype="multipart/form-data">
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
            <input class="signup-password" type="password" name="verification" placeholder="Confirmer le password">
            <input class="signup-password" type="file" name="image" placeholder="Confirmer le password">
        </div>

        <input class="signup-submit" type="submit" value="Signup" name="submit">
    </div>
</form>

</main>

</body>

</html>