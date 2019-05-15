<?php require_once("includes/header.php");
    $premium = premium();
?>

<?php if (isset($_SESSION["connectedUser"]) &&  $_SESSION["connectedUser"]) : ?>
    <!-- user -->
    <div class="profil">
        <div class="profil-presentation">
            <div class="profil-image">
                <img class="js-button-img" src=<?= "../upload/" . $user[0]['images_u'] ?> alt="">
            </div>
            <div class="profil-principal">
                <h2><?= $user[0]['nom_u'] . " " . $user[0]['prenom_u'] ?></h2>
                <h3><?= $user[0]['age_u'] ?> ans</h3>
                <?php if(!empty($premium[0]['id_premium'])) :?>
                <h3 class="profil-premium">Profil Premium ( <?= $premium[0]['date_abo_debut'] ?> - <?= $premium[0]['date_abo_fin'] ?> )</h3>
                <?php endif; ?>
                <br>
                <h3>Description</h3>
                <p><?= $user[0]['description_u'] ?></p>
                <button class="presentation-modify js-button-principal">Modifier</button>
            </div>
        </div>
        <div class="profil-contact">
            <div class="contact">
                <h2>Contact</h2>
                <div class="border"></div>
                <ul>
                    <li><img src="icons/icons8-sonnerie-phonelink-24.png" alt=""><?= $user[0]['telephone_u']  ?></li>
                    <li><img src="icons/icons8-email-filled-24.png" alt=""><?= $user[0]['mail_u']  ?></li>
                </ul>
                <button class="contact-modify js-button-contact">Modifier</button>
            </div>
        </div>
        <div class="profil-address">
            <div class="address">
                <h2>Adresse</h2>
                <div class="border"></div>
                <ul>
                    <li><img src="icons/icons8-adresse-24.png" alt=""><?= $user[0]['adresse_u']  ?></li>
                    <li><img src="icons/icons8-epingle-de-carte-24.png" alt=""><?= $user[0]['code_postal_u'] . " " . $user[0]['ville_u'] ?></li>
                </ul>
                <button class="address-modify js-button-adress">Modifier</button>
            </div>
        </div>
        <div class="profil-password">
            <div class="password">
                <h2>Informations confidentialité</h2>
                <div class="border"></div>
                <ul>
                    <li><img src="icons/icons8-mot-de-passe-24.png" alt="">**********</li>
                </ul>
                <button class="password-modify js-button-password">Modifier votre mot de passe</button>
            </div>
        </div>
        <div class="profil-body">
            <div class="body">
                <h2>Informations physique</h2>
                <div class="border"></div>
                <ul>
                    <li><img src="icons/icons8-redimensionner-verticallement-filled-24.png" alt=""><?= $user[0]['taille']  ?></li>
                    <li><img src="icons/icons8-échelle-24.png" alt=""><?= $user[0]['poid_u'] ?></li>
                </ul>
                <button class="body-modify js-button-body">Modifier</button>
            </div>
        </div>
    </div>
    <!-- user -->
<?php else : ?>
    <!-- coach -->
    <div class="profil">
        <div class="profil-presentation">
            <div class="profil-image">
                <img class="js-button-img" src=<?= "../upload/" . $profilCoach[0]['images_c'] ?> alt="">
            </div>
            <div class="profil-principal">
                <h2><?= $profilCoach[0]['nom_c'] . " " . $profilCoach[0]['prenom_c'] ?></h2>
                <h3><?= $profilCoach[0]['age_c'] ?></h3>
                <h3 class="profil-premium">Coach</h3>
                <br>
                <h3>Description</h3>
                <p><?= $profilCoach[0]['description_c'] ?></p>
                <button class="presentation-modify js-button-principal">Modifier</button>
            </div>
        </div>
        <div class="profil-contact">
            <div class="contact">
                <h2>Contact</h2>
                <div class="border"></div>
                <ul>
                    <li><img src="icons/icons8-sonnerie-phonelink-24.png" alt=""><?= $profilCoach[0]['telephone_c']  ?></li>
                    <li><img src="icons/icons8-email-filled-24.png" alt=""><?= $profilCoach[0]['mail_c']  ?></li>
                </ul>
                <button class="contact-modify js-button-contact">Modifier</button>
            </div>
        </div>
        <div class="profil-address">
            <div class="address">
                <h2>Adresse</h2>
                <div class="border"></div>
                <ul>
                    <li><img src="icons/icons8-adresse-24.png" alt=""><?= $profilCoach[0]['adresse_c']  ?></li>
                    <li><img src="icons/icons8-epingle-de-carte-24.png" alt=""><?= $profilCoach[0]['code_postal_c'] . " " . $profilCoach[0]['ville_c'] ?></li>
                </ul>
                <button class="address-modify js-button-adress">Modifier</button>
            </div>
        </div>
        <div class="profil-password">
            <div class="password">
                <h2>Informations confidentialité</h2>
                <div class="border"></div>
                <ul>
                    <li><img src="icons/icons8-mot-de-passe-24.png" alt="">**********</li>
                </ul>
                <button class="password-modify js-button-password">Modifier votre mot de passe</button>
            </div>
        </div>
        <div class="profil-speciality">
            <div class="speciality">
                <h2>Spécialité</h2>
                <div class="border"></div>
                <ul>
                    <li><img src="assets/icons/icons8-collage-spécial-24.png" alt=""><?= $profilCoach[0]['specialite'] ?></li>
                </ul>
                <button class="speciality-modify js-button-speciality">Modifier</button>
            </div>
        </div>
    </div>
    <!-- coach -->
<?php endif; ?>
</main>
</body>

</html>