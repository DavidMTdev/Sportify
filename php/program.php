<?php require_once("includes/header.php");;
$premium = premium();
$imcRecurrence = imcRecurrence();
if ($imcRecurrence == 1) {
    header('location: imc.php');
}
?>

<div class="program-title-container">
    <div class="program-title">
        <h1>Programme</h1>
        <div class="border"></div>
    </div>
</div>


<div class="program-infos"><img src=<?= "images/" . $statementProgram[0]['images_pro'] ?> alt=""></div>
<div class="program-infos"><?= $statementProgram[0]['nom_pro'] ?></div>
<div class="program-infos"><?= $statementProgram[0]['niveau'] ?></div>
<div class="program-infos"><?= $statementProgram[0]['objectif'] ?></div>
<div class="program-infos"><?= $statementProgram[0]['descriptions'] ?></div>


<div class="program-exercice-title-container">
    <div class="program-exercice-title">
        <h1>Exercice du programme</h1>
        <div class="border"></div>
    </div>
</div>

<div class="program-allexercice-infos-container">
    <?php foreach ($statementListExercice as $key => $value) : ?>


        <div class="program-exercice-infos-container">
            <div class="exercice-infos-container">
                <div class="infos-container">
                    <div class="program-exercice-infos-title">
                        <h2><?= $value['nom_ex'] ?></h2>
                        <div class="border"></div>
                    </div>
                    <div class="program-exercice-infos-img">
                        <img src=<?= "images/" . $value['images_ex'] ?> alt="">
                    </div>
                    <div class="program-exercice-infos">
                        <h3>Machine :</h3>
                        <?= $value['machine'] ?>
                    </div>
                    <div class="program-exercice-infos">
                        <h3>Nombre de Séries :</h3>
                        <?= $value['nb_serie'] ?>
                    </div>
                    <?php if (empty($value['nb_rep'])) : ?>
                        <div class="program-exercice-infos">
                            <h3>Durée :</h3>
                            <?= $value['duree'] ?>
                        </div>
                    <?php else : ?>
                        <div class="program-exercice-infos">
                        <h3>Nombre de répétitions/série :</h3>
                            <?= $value['nb_rep'] ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>
</main>
</body>

</html>