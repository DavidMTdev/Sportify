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

<<<<<<< HEAD
        <div class="user-infos">
            <input class="signup-info" type="number" name="age" placeholder="Age">
            <input class="signup-info" type="number" name="poid" placeholder="Poids">
            <input class="signup-info" type="number" name="taille" placeholder="Taille(cm)">
        </div>
=======
                <div class="user-infos">
                    <!-- <input class="signup-info" type="number" name="age" placeholder="Age"> -->
                    <!-- <input class="signup-info" type="number" name="poid" placeholder="Poids">
                    <input class="signup-info" type="number" name="taille" placeholder="Taille(cm)"> -->
                    
                    <SELECT class="signup-info" name="age" size="1" >
                        <OPTION> Age
                        <?php for($i = 16; $i <= 100; $i++): ?>
                        <OPTION> <?= $i;
                        endfor?>
                    </SELECT>

                    <SELECT class="signup-info" name="poid" size="1">
                        <OPTION> Poid(kg)
                        <?php for($i = 40; $i <= 150; $i++): ?>
                        <OPTION> <?= $i;
                        endfor?>
                    </SELECT>

                    <SELECT class="signup-info" name="taille" size="1">
                        <OPTION> Taille(cm)
                        <?php for($i = 100; $i <= 230; $i++): ?>
                        <OPTION> <?= $i;
                        endfor?>
                    </SELECT>

                    
                </div>
>>>>>>> 445d6c0a7f1f760a1cbcc160e9c971d2305aaf3d

        <div class="user-contact">
            <input class="signup-info" type="text" name="email" placeholder="Mail">
            <input class="signup-info" type="text" name="tel" placeholder="N° de Téléphone">
        </div>

<<<<<<< HEAD
        <div class="user-password">
            <input class="signup-password" type="password" name="mdp" placeholder="Password">
            <input class="signup-password" type="password" name="verification" placeholder="Confirmer le password">
            <input class="signup-password" type="file" name="image" placeholder="Confirmer le password">
        </div>
=======
                <div class="user-password">
                    <input class="signup-password" type="password" name="mdp" placeholder="Password">
                    <input class="signup-password" type="password" name="verification" placeholder="Confirmer le password">
                </div>
>>>>>>> 445d6c0a7f1f760a1cbcc160e9c971d2305aaf3d

        <input class="signup-submit" type="submit" value="Signup" name="submit">
    </div>
</form>

</main>

</body>

</html>