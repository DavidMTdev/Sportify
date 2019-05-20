<?php require_once("includes/header.php");
$dataTime = new DateTime();
$today = $dataTime->format("Y-m-d");
$premium = premium();
?>



<?php if (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) : ?>
    <div class="principal-meeting-title">
        <h1><?= "Séance " . $sessionPremium[0]['nom_u'] . " " . $sessionPremium[0]['prenom_u'] ?></h1>
        <div class="border"></div>
    </div>


    <form action="listProgram.php" method="get" class="meeting-form">
        <input type="date" name="date" class="meeting-form-input" value=<?= $today ?>>
        <input type="hidden" name="id_coach" value=<?= $idCoach[0]['id_coach']; ?>>
        <button type="submit" name='id' class="meeting-form-submit" value=<?= $sessionPremium[0]['id_premium'] ?>>Créer une séance</button>
    </form>

    <div class="meeting-principal-container">
        <?php foreach ($sessionPremium as $key => $value) : ?>
            <div class="meeting-container">
                <div class="meeting-infos-container">
                    <div class="meeting-infos-title">
                        <div class="meeting-number-title">
                            <h4>Numéro de la Séance</h4>
                        </div>
                        <div class="meeting-date-title">
                            <h4>Date</h4>
                        </div>
                        <div class="meeting-validation-title">
                            <h4>Valider</h4>
                        </div>
                        <div class="meeting-coach-title">
                            <h4>Coach</h4>
                        </div>
                    </div>

                    <div class="meeting-infos">
                        <div class="meeting-number">
                            <h5><?= $key + 1 ?></h5>
                        </div>
                        <div class="meeting-date">
                            <h5><?= $value['dates'] ?></h5>
                        </div>
                        <div class="meeting-validation">
                            <h5><?= $value['validation_s'] ?></h5>
                        </div>
                        <div class="meeting-coach">
                            <h5><?= $value['nom_c'] ?></h5>
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




<?php else : ?>
    <?php if (empty($premium[0]['id_premium'])) : ?>

        <div class="principal-meeting-title">
            <h1><?= "Vos Séances" ?></h1>
            <div class="border"></div>
        </div>


        <form action="listProgram.php" method="get" class="meeting-form">
            <input type="date" name="date" id="" class="meeting-form-input" value=<?= $today ?>>
            <button type="submit" name='id' class="meeting-form-submit" value=<?= $statementUser[0]['id_utilisateur'] ?>>Créer une séance</button>
        </form>



        <div class="meeting-principal-container">

            <div class="meeting-container">
                <div class="meeting-infos-container">
                    <div class="meeting-infos-title">
                        <div class="meeting-number-title">
                            <h4>Numéro de la Séance</h4>
                        </div>
                        <div class="meeting-date-title">
                            <h4>Date</h4>
                        </div>
                        <div class="meeting-validation-title">
                            <h4>Valider</h4>
                        </div>
                        <div class="meeting-weight-title">
                            <h4>Poids</h4>
                        </div>
                    </div>
                    <?php if (!($result)) : ?>

                        <?php foreach ($statementUser as $key => $value) : ?>
                            <div class="meeting-infos">
                                <div class="meeting-number">
                                    <h5><?= $key + 1 ?></h5>
                                </div>
                                <div class="meeting-date">
                                    <h5><?= $value['dates'] ?></h5>
                                </div>
                                <div class="meeting-validation">
                                    <input type="checkbox" name="checked" <?= checkedCheckBox($value['validation_s']); ?>>
                                </div>
                                <div class="meeting-weight">
                                    <input type="number" name="weigth">
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
            <?php endif; ?>

        </div>



    <?php else : ?>
        <div class="principal-meeting-title">
            <h1><?= "Vos Séances" ?></h1>
            <div class="border"></div>
        </div>

        <div class="meeting-form-container">
            <form action="listProgram.php" method="get" class="meeting-form">
                <input type="date" name="date" class="meeting-form-input" value=<?= $today ?>>
                <button type="submit" name='id' class="meeting-form-submit" value=<?= $sessionPremium[0]['id_utilisateur'] ?>>Créer une séance</button>
            </form>
        </div>


        <div class="meeting-principal-container">
            <?php foreach ($sessionPremium as $key => $value) : ?>
                <div class="meeting-container">
                    <div class="meeting-infos-container">
                        <div class="meeting-infos-title">
                            <div class="meeting-number-title">
                                <h4>Séance N°</h4>
                            </div>
                            <div class="meeting-date-title">
                                <h4>Date</h4>
                            </div>
                            <div class="meeting-validation-title">
                                <h4>Valider la séance</h4>
                            </div>
                            <div class="meeting-weight-title">
                                <h4>Poids après séance</h4>
                            </div>
                            <div class="meeting-coach-title">
                                <h4>Coach</h4>
                            </div>
                        </div>

                        <div class="meeting-infos">
                            <div class="meeting-number">
                                <h5><?= $key + 1 ?></h5>
                            </div>
                            <div class="meeting-date">
                                <h5><?= $value['dates'] ?></h5>
                            </div>
                            <div class="meeting-validation">
                                <input type="checkbox" name="checked" <?= checkedCheckBox($value['validation_s']); ?>>
                            </div>
                            <div class="meeting-weight">
                                <input class="weight-input" type="number" name="weigth">
                            </div>
                            <div class="meeting-coach">
                                <h5><?= $value['nom_c'] ?></h5>
                            </div>

                        </div>

                    </div>
                    <div class="meeting-button">
                        <form action=<?= "meeting.php" ?> method="get">
                            <button type="submit" name='id_seance' class="button-create-seance" value=<?= $value['id_seance'] ?>>Valider les informations</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

</main>
</body>

</html>