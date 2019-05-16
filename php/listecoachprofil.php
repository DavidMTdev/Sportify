<?php require_once("includes/header.php");
    $premium = premium();
    if(empty($premium[0]['id_premium'])){
        header('location: premium.php');
    }
    else{
        $listeCoachProfil = $pdo->query('SELECT * FROM coach WHERE id_coach = "' . $_GET['id_coach'] . '"');
        $listeCoachProfil = $listeCoachProfil->fetchAll(PDO::FETCH_ASSOC);
    }
?>


    <!-- coach -->
    <div class="profil">
        <div class="profil-presentation">
            <div class="profil-image">
                <img class="js-button-img" src=<?= "../upload/" . $listeCoachProfil[0]['images_c'] ?> alt="">
            </div>
            <div class="profil-principal">
                <h2><?= $listeCoachProfil[0]['nom_c'] . " " . $listeCoachProfil[0]['prenom_c'] ?></h2>
                <h3><?= $listeCoachProfil[0]['age_c'] ?></h3>
                <h3 class="profil-premium">Coach</h3>
                <br>
                <h3>Description</h3>
                <p><?= $listeCoachProfil[0]['description_c'] ?></p>
                <button class="presentation-modify js-button-principal">Modifier</button>
            </div>
        </div>
        <div class="profil-contact">
            <div class="contact">
                <h2>Contact</h2>
                <div class="border"></div>
                <ul>
                    <li><img src="icons/icons8-sonnerie-phonelink-24.png" alt=""><?= $listeCoachProfil[0]['telephone_c']  ?></li>
                    <li><img src="icons/icons8-email-filled-24.png" alt=""><?= $listeCoachProfil[0]['mail_c']  ?></li>
                </ul>
                <button class="contact-modify js-button-contact">Modifier</button>
            </div>
        </div>
        <div class="profil-address">
            <div class="address">
                <h2>Adresse</h2>
                <div class="border"></div>
                <ul>
                    <li><img src="icons/icons8-adresse-24.png" alt=""><?= $listeCoachProfil[0]['adresse_c']  ?></li>
                    <li><img src="icons/icons8-epingle-de-carte-24.png" alt=""><?= $listeCoachProfil[0]['code_postal_c'] . " " . $listeCoachProfil[0]['ville_c'] ?></li>
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
                    <li><img src="assets/icons/icons8-collage-spécial-24.png" alt=""><?= $listeCoachProfil[0]['specialite'] ?></li>
                </ul>
                <button class="speciality-modify js-button-speciality">Modifier</button>
            </div>
        </div>
    </div>
    <!-- coach -->
</main>
</body>

</html>