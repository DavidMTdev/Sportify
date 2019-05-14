<?php require_once("includes/header.php") ?>

<?php if (isset($_SESSION["connectedUser"]) &&  $_SESSION["connectedUser"]) : ?>
    <!-- user -->
    <div>
        <h2>info principal</h2>
        <img class="js-button-img" src=<?= "../upload/" . $user[0]['images_u'] ?> alt="">
        <h3>Nom</h3>
        <p><?= $user[0]['nom_u'] ?></p>
        <h3>Prenom</h3>
        <p><?= $user[0]['prenom_u'] ?></p>
        <h3>Age</h3>
        <p><?= $user[0]['age_u'] ?></p>
        <button class="js-button-principal">Modifier</button>
    </div>
    <div>
        <h2>info corp</h2>
        <h3>Poid</h3>
        <p><?= $user[0]['poid_u'] ?></p>
        <h3>Taille</h3>
        <p><?= $user[0]['taille']  ?></p>
        <button class="js-button-body">Modifier</button>
    </div>
    <div>
        <h2>info adresse</h2>
        <h3>Rue</h3>
        <p><?= $user[0]['adresse_u']  ?></p>
        <h3>code postal</h3>
        <p><?= $user[0]['code_postal_u']  ?></p>
        <h3>ville</h3>
        <p><?= $user[0]['ville_u']  ?></p>
        <button class="js-button-adress">Modifier</button>
    </div>
    <div>
        <h2>info contact</h2>
        <h3>telephone</h3>
        <p><?= $user[0]['telephone_u']  ?></p>
        <h3>mail</h3>
        <p><?= $user[0]['mail_u']  ?></p>
        <button class="js-button-contact">Modifier</button>
    </div>
    <div>
        <h2>info mot de passe</h2>
        <button class="js-button-password">Modifier votre mot de passe</button>
    </div>
    <!-- user -->
<?php else : ?>
    <!-- coach -->
    <div>
        <h2>info principal</h2>
        <img class="js-button-img" src=<?= "../upload/" . $profilCoach[0]['images_c'] ?> alt="">
        <h3>Nom</h3>
        <p><?= $profilCoach[0]['nom_c'] ?></p>
        <h3>Prenom</h3>
        <p><?= $profilCoach[0]['prenom_c'] ?></p>
        <h3>Age</h3>
        <p><?= $profilCoach[0]['age_c'] ?></p>
        <button class="js-button-principal">Modifier</button>
    </div>
    <div>
        <h2>info adresse</h2>
        <h3>Rue</h3>
        <p><?= $profilCoach[0]['adresse_c']  ?></p>
        <h3>code postal</h3>
        <p><?= $profilCoach[0]['code_postal_c']  ?></p>
        <h3>ville</h3>
        <p><?= $profilCoach[0]['ville_c']  ?></p>
        <button class="js-button-adress">Modifier</button>
    </div>
    <div>
        <h2>info contact</h2>
        <h3>telephone</h3>
        <p><?= $profilCoach[0]['telephone_c']  ?></p>
        <h3>mail</h3>
        <p><?= $profilCoach[0]['mail_c']  ?></p>
        <button class="js-button-contact">Modifier</button>
    </div>
    <div>
        <h2>info mot de passe</h2>
        <button class="js-button-password">Modifier votre mot de passe</button>
    </div>
    <div>
        <h2>info Spécialité</h2>
        <h3>Spécialité</h3>
        <?= $profilCoach[0]['specialite'] ?>
        <button class="js-button-speciality">Modifier</button>
    </div>
    <!-- coach -->
<?php endif; ?>
</main>
</body>

</html>