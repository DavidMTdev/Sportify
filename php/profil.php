<?php require_once("includes/header.php") ?>
<div>
    <h2>info principal</h2>
    <img class="js-info-img" src=<?= "../upload/" . $user[0]['images_u'] ?> alt="">
    <h3>Nom</h3>
    <p><?= $user[0]['nom_u'] ?></p>
    <h3>Prenom</h3>
    <p><?= $user[0]['prenom_u'] ?></p>
    <h3>Age</h3>
    <p><?= $user[0]['age_u'] ?></p>
    <button class="js-info-principal">Modifier</button>
</div>
<!-- user -->
<div>
    <h2>info corp</h2>
    <h3>Poid</h3>
    <p><?= $user[0]['poid_u'] ?></p>
    <h3>Taille</h3>
    <p><?= $user[0]['taille']  ?></p>
    <button class="js-info-body">Modifier</button>
</div>
<!-- user -->
<div>
    <h2>info adresse</h2>
    <h3>Rue</h3>
    <p><?= $user[0]['adresse_u']  ?></p>
    <h3>code postal</h3>
    <p><?= $user[0]['code_postal_u']  ?></p>
    <h3>ville</h3>
    <p><?= $user[0]['ville_u']  ?></p>
    <button class="js-info-adress">Modifier</button>
</div>
<div>
    <h2>info contact</h2>
    <h3>telephone</h3>
    <p><?= $user[0]['telephone_u']  ?></p>
    <h3>mail</h3>
    <p><?= $user[0]['mail_u']  ?></p>
    <button class="js-info-contact">Modifier</button>
</div>
<div>
    <h2>info mot de passe</h2>
    <button class="js-info-password">Modifier votre mot de passe</button>
</div>
<!-- coach -->
<div>
    <h2>info Spécialité</h2>
    <button class="js-info-speciality">Modifier</button>
</div>
<!-- coach -->

</main>
<script src="js/profil.js"></script>
</body>

</html>