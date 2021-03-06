<?php require_once("includes/header.php");
$imcRecurrence = imcRecurrence();
if ($imcRecurrence == 1) {
    header('location: imc.php');
}
?>

<div class="list-program-title">
    <h1>Liste des programmes enregistrés</h1>
    <div class="border"></div>
</div>


<?php if (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) : ?>
    <div class="create-program-container">
        <form action="createProgram.php" method="get" class="create-program-form">
            <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
            <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
            <input type="hidden" name="id_coach" value=<?= $_GET['id_coach']; ?>>
            <button type="submit" class="create-program-submit">Créer un programme</button>
        </form>
    </div>
    <div class="list-program-container">
        <div class="list-program">
            <?php foreach ($listProgram as $key => $value) : ?>
                <div class="program-container">
                    <div class="list-line">
                        <div class="program-information-container">
                            <?php if ($key < 3) : ?>
                                <div class="program-name">
                                    <h2>Performance</h2>
                                    <div class="border"></div>
                                </div>
                            <?php elseif ($key < 6 && $key >= 3) : ?>
                                <div class="program-name">
                                    <h2>Tonification</h2>
                                    <div class="border"></div>
                                </div>
                            <?php elseif ($key < 9 && $key >= 6) : ?>
                                <div class="program-name">
                                    <h2>Prise De Masse</h2>
                                    <div class="border"></div>
                                </div>
                            <?php elseif ($key < 12 && $key >= 9) : ?>
                                <div class="program-name">
                                    <h2>Perte de poids</h2>
                                    <div class="border"></div>
                                </div>
                            <?php else : ?>
                                <div class="program-name">
                                    <h2>Remise En Forme</h2>
                                    <div class="border"></div>
                                </div>
                            <?php endif; ?>

                            <form action=<?= "meeting.php?id=" . $_GET['id'] ?> method="post">
                                <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
                                <input type="hidden" name="id_prog" value=<?= $value['id_programme']; ?>>
                                <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
                                <input type="hidden" name="id_coach" value=<?= $_GET['id_coach']; ?>>

                                <div class="program_img"><img src=<?= "images/" . $value['images_pro'] ?>></div>
                                <div class="program-description">
                                    <h2>Description</h2>
                                    <div><?= $value['descriptions'] ?></div>
                                </div>
                                <div class="program-level">
                                    <h2>Niveau</h2>
                                    <div><?= $value['niveau'] ?></div>
                                </div>
                                <div class="program-goal">
                                    <h2>Objectif</h2>
                                    <div><?= $value['objectif'] ?></div>
                                </div>
                                <button type="submit" class="choice-program-submit">Choisir le programme</button>

                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php else : ?>
    <div class="create-program-container">
        <form action="createProgram.php" method="get" class="create-program-form">
            <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
            <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
            <button type="submit" class="create-program-submit">Créer un programme</button>
        </form>
    </div>
    <div class="list-program-container">
        <div class="list-program">
            <?php foreach ($listProgram as $key => $value) : ?>
                <div class="program-container">
                    <div class="list-line">
                        <div class="program-information-container">
                            <?php if ($key < 3) : ?>
                                <div class="program-name">
                                    <h2>Performance</h2>
                                    <div class="border"></div>
                                </div>
                            <?php elseif ($key < 6 && $key >= 3) : ?>
                                <div class="program-name">
                                    <h2>Tonification</h2>
                                    <div class="border"></div>
                                </div>
                            <?php elseif ($key < 9 && $key >= 6) : ?>
                                <div class="program-name">
                                    <h2>Prise De Masse</h2>
                                    <div class="border"></div>
                                </div>
                            <?php elseif ($key < 12 && $key >= 9) : ?>
                                <div class="program-name">
                                    <h2>Perte de poids</h2>
                                    <div class="border"></div>
                                </div>
                            <?php else : ?>
                                <div class="program-name">
                                    <h2>Remise En Forme</h2>
                                    <div class="border"></div>
                                </div>
                            <?php endif; ?>

                            <form action="meeting.php" method="post">
                                <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
                                <input type="hidden" name="id_prog" value=<?= $value['id_programme']; ?>>
                                <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
                                <div class="program_img"><img src=<?= "images/" . $value['images_pro'] ?>></div>
                                <div class="program-description">
                                    <h2>Description</h2>
                                    <div><?= $value['descriptions'] ?></div>
                                </div>
                                <div class="program-level">
                                    <h2>Niveau</h2>
                                    <div><?= $value['niveau'] ?></div>
                                </div>
                                <div class="program-goal">
                                    <h2>Objectif</h2>
                                    <div><?= $value['objectif'] ?></div>
                                </div>
                                <button type="submit" class="choice-program-submit">Choisir le programme</button>

                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php endif; ?>
<?php require_once("includes/footer.php"); ?>