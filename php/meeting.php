<?php require_once("includes/header.php");
$dataTime = new DateTime();
$today = $dataTime->format("Y-m-d");
$premium = premium();
?>
<?php if (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) : ?>
    <h1><?= "Séance " . $sessionPremium[0]['nom_u'] . " " . $sessionPremium[0]['prenom_u'] ?></h1>
    <form action="listProgram.php" method="get">
        <input type="date" name="date" value=<?= $today ?>>
        <input type="hidden" name="id_coach" value=<?= $idCoach[0]['id_coach']; ?>>
        <button type="submit" name='id' value=<?= $sessionPremium[0]['id_premium'] ?>>Créer une séance</button>
    </form>
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
                    <td><?= $value['validation_s'] ?></td>
                    <td><?= $value['nom_c'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <?php if (empty($premium[0]['id_premium'])) : ?>
        <h1><?= "Vos Séance" ?></h1>
        <form action="listProgram.php" method="get">
            <input type="date" name="date" id="" value=<?= $today ?>>
            <button type="submit" name='id' value=<?= $statementUser[0]['id_utilisateur'] ?>>Créer une séance</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Numéro séance</th>
                    <th>date séance</th>
                    <th>valider</th>
                    <th>Poid</th>


                </tr>
            </thead>
            <tbody>
                <?php if (!($result)) : ?>
                    <?php foreach ($statementUser as $key => $value) : ?>
                        <form action="" method="get">
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value['dates'] ?></td>
                                <td>
                                    <input type="checkbox" name="checked" <?= checkedCheckBox($value['validation_s']); ?>>
                                </td>
                                <td>
                                    <input type="number" name="weigth">
                                </td>
                                <td>
                                    <button type="submit" name='id_seance' value=<?= $value['id_seance'] ?>>valider</button>
                                </td>
                            </tr>
                        </form>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    <?php else : ?>
        <h1><?= "Vos Séance" ?></h1>
        <form action="listProgram.php" method="get">
            <input type="date" name="date" id="" value=<?= $today ?>>
            <button type="submit" name='id' value=<?= $sessionPremium[0]['id_utilisateur'] ?>>Créer une séance</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Numéro séance</th>
                    <th>date séance</th>
                    <th>valider</th>
                    <th>Poid</th>
                    <th>Coach</th>

                </tr>
            </thead>
            <tbody>
                <?php if (!($result)) : ?>
                    <?php foreach ($sessionPremium as $key => $value) : ?>
                        <form action="" method="get">
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value['dates'] ?></td>
                                <td>
                                    <input type="checkbox" name="checked" <?= checkedCheckBox($value['validation_s']); ?>>
                                </td>
                                <td>
                                    <input type="number" name="weigth">
                                </td>
                                <td><?= $value['nom_c'] ?></td>
                                <td>
                                    <button type="submit" name='id_seance' value=<?= $value['id_seance'] ?>>valider</button>
                                </td>
                            </tr>
                        </form>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php endif; ?>

<?php require_once("includes/footer.php"); ?>