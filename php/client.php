<?php require_once("includes/header.php") ?>

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
                    <form action=<?= "seance.php" ?> method="get">
                        <button type="submit" name="id" value=<?= $value['id_premium']; ?>>Créer une séance</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</main>

</body>

</html>