<?php require_once("includes/header.php"); ?>
<?php if (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) : ?>
    <h1><?= "Séance " . $sessionPremium[0]['nom_u'] . " " . $sessionPremium[0]['prenom_u'] ?></h1>
    <table>
        <thead>
            <tr>
                <th>Numéro séance</th>
                <th>date séance</th>
                <th>valider</th>
                <th>Coach</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sessionPremium as $key => $value) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value['dates'] ?></td>
                    <td><?= $value['seance'] ?></td>
                    <td><?= $value['nom_c'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <h1><?= "Vos Séance" ?></h1>
    <table>
        <thead>
            <tr>
                <th>Numéro séance</th>
                <th>date séance</th>
                <th>valider</th>
                <th>Coach</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sessionPremium as $key => $value) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value['dates'] ?></td>
                    <td><?= $value['seance'] ?></td>
                    <td><?= $value['nom_c'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

</main>

</body>

</html>