<?php require_once("includes/header.php") ?>

<<<<<<< HEAD
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Mail</th>
            <th>Téléphone</th>
            <th>Date Abonnement</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listPremium as $key => $value) : ?>
            <tr>
                <td><?= $value['nom_u'] ?></td>
                <td><?= $value['prenom_u'] ?></td>
                <td><?= $value['mail_u'] ?></td>
                <td><?= $value['telephone_u'] ?></td>
                <td><?= $value['date_abo_debut'] ?></td>
                <td>
                    <form action=<?= "meeting.php" ?> method="get">
                        <button type="submit" name="id" value=<?= $value['id_premium']; ?>>Créer une séance</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
=======

<?php foreach ($listPremium as $key => $value) : ?>
<?php endforeach; ?>

<div class="client-principal-container">
    <div class="client-title">
        <h2>Profils Premium</h2>
        <div class="border"></div>
    </div>
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
            <form action=<?= "seance.php" ?> method="get">
                <button class="button-create-seance" type="submit" name="id" value=<?= $value['id_premium']; ?>>Créer une séance</button>
            </form>
        </div>
    </div>

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
            <form action=<?= "seance.php" ?> method="get">
                <button class="button-create-seance" type="submit" name="id" value=<?= $value['id_premium']; ?>>Créer une séance</button>
            </form>
        </div>
        
    </div>


</div>
>>>>>>> 974a12aa7f1fe1bafdd78e8ffb8d601c1a26158d

</main>

</body>

</html>