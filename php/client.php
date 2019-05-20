<?php require_once("includes/header.php");
$imcRecurrence = imcRecurrence();
if($imcRecurrence == 1){
    header('location: imc.php');
}
?>




<div class="client-principal-container">
    <div class="client-title">
        <h2>Profils Premium</h2>
        <div class="border"></div>
    </div>
    <?php foreach ($listPremium as $key => $value) : ?>

        <div class="client-container">
            <div class="client-infos-container">
                <div class="client-infos-title">
                    <div class="client-surname-title">
                        <h4>Nom</h4>
                    </div>
                    <div class="client-name-title">
                        <h4>Prénom</h4>
                    </div>
                    <div class="client-mail-title">
                        <h4>Mail</h4>
                    </div>
                    <div class="client-tel-title">
                        <h4>N° de Téléphone</h4>
                    </div>
                    <div class="client-date-title">
                        <h4>Date d'Abonnement</h4>
                    </div>
                </div>

                <div class="client-infos">
                    <div class="client-surname">
                        <h5><?= $value['nom_u'] ?></h5>
                    </div>
                    <div class="client-name">
                        <h5><?= $value['prenom_u'] ?></h5>
                    </div>
                    <div class="client-mail">
                        <h5><?= $value['mail_u'] ?></h5>
                    </div>
                    <div class="client-tel">
                        <h5><?= $value['telephone_u'] ?></h5>
                    </div>
                    <div class="client-date">
                        <h5><?= $value['date_abo_debut'] ?></h5>
                    </div>

                </div>

            </div>
            <div class="client-seance">
                <form action=<?= "meeting.php" ?> method="get">
                    <button class="button-create-seance" type="submit" name="id" value=<?= $value['id_premium']; ?>>Créer une séance</button>
                </form>
            </div>
        </div>




    <?php endforeach; ?>
</div>
</main>

</body>

</html>