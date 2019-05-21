<?php require_once("includes/header.php");
$imcRecurrence = imcRecurrence();
if ($imcRecurrence == 1) {
    header('location: imc.php');
}
?>


<!-- user -->
<div class="profil"> 
        <div class="profil-presentation">
            <div class="profil-image">
                <img class="js-button-img" src=<?= "../upload/" . $listePremiumProfil[0]['images_u'] ?> alt="">
            </div>
            <div class="profil-principal">
                <h2><?= $listePremiumProfil[0]['nom_u'] . " " . $listePremiumProfil[0]['prenom_u'] ?></h2>
                <h3><?= $listePremiumProfil[0]['age_u'] ?> ans</h3>
                <?php if (!empty($premium[0]['id_premium'])) : ?>
                    <h3 class="profil-premium">Profil Premium ( <?= $premium[0]['date_abo_debut'] ?> - <?= $premium[0]['date_abo_fin'] ?> )</h3>
                <?php endif; ?>
                <br>
                <h3>Description</h3>
                <p><?= $listePremiumProfil[0]['description_u'] ?></p>
                <div class="modify-principal-button-container">
                    <button class="presentation-modify js-button-principal">Modifier</button>
                </div>
            </div>
        </div>
        <div class="profil-contact">
            <div class="contact">
                <h2>Contact</h2>
                <div class="border"></div>
                <ul>
                    <li><img src="icons/icons8-sonnerie-phonelink-24.png" alt=""><?= $listePremiumProfil[0]['telephone_u']  ?></li>
                    <li><img src="icons/icons8-email-filled-24.png" alt=""><?= $listePremiumProfil[0]['mail_u']  ?></li>
                </ul>

                <div class="modify-information-button-container">
                    <button class="contact-modify js-button-contact">Modifier</button>
                </div>
            </div>

        </div>
    </div>

    <div class="profil-address">
        <div class="address">
            <h2>Adresse</h2>
            <div class="border"></div>
            <ul>
                <li><img src="icons/icons8-adresse-24.png" alt=""><?= $listePremiumProfil[0]['adresse_u']  ?></li>
                <li><img src="icons/icons8-epingle-de-carte-24.png" alt=""><?= $listePremiumProfil[0]['code_postal_u'] . " " . $listePremiumProfil[0]['ville_u'] ?></li>
            </ul>

            <div class="modify-information-button-container">
                <button class="address-modify js-button-adress">Modifier</button>
            </div>

        </div>
    </div>

    <div class="profil-password">
        <div class="password">
            <h2>Informations confidentialité</h2>
            <div class="border"></div>
            <ul>
                <li><img src="icons/icons8-mot-de-passe-24.png" alt="">**********</li>
            </ul>
            <div class="modify-information-button-container">
                <button class="password-modify js-button-password">Modifier votre mot de passe</button>
            </div>
        </div>
    </div>
    <div class="profil-body">
        <div class="body">
            <h2>Informations physique</h2>
            <div class="border"></div>
            <ul>
                <li><img src="icons/icons8-redimensionner-verticallement-filled-24.png" alt=""><?= $listePremiumProfil[0]['taille']  ?></li>
                <li><img src="icons/icons8-échelle-24.png" alt=""><?= $listePremiumProfil[0]['poid_u'] ?></li>
            </ul>
            <div class="modify-information-button-container">
                <button class="body-modify js-button-body">Modifier</button>
            </div>
        </div>
    </div>
    </div>

    <div class="graphic" style="width: 50%; height: 50%;">
    <button class="left">gauche</button>
    <button class="right">droite</button>
    <canvas id="myChart" width="400" height="400"></canvas>
    </div>
    <!-- user -->