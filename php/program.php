<?php require_once("includes/header.php");;
$premium = premium();
$imcRecurrence = imcRecurrence();
if ($imcRecurrence == 1) {
    header('location: imc.php');
}
?>
<h1>programme</h1>
<div><img src=<?= "images/" . $statementProgram[0]['images_pro'] ?> alt=""></div>
<div><?= $statementProgram[0]['nom_pro'] ?></div>
<div><?= $statementProgram[0]['niveau'] ?></div>
<div><?= $statementProgram[0]['objectif'] ?></div>
<div><?= $statementProgram[0]['descriptions'] ?></div>

<h1>exercice du programme</h1>
<?php foreach ($statementListExercice as $key => $value) : ?>
    <div><img src=<?= "images/" . $value['images_ex'] ?> alt=""></div>
    <div><?= $value['nom_ex'] ?></div>
    <div><?= $value['machine'] ?></div>
    <div><?= $value['nb_serie'] ?></div>
    <?php if (empty($value['nb_rep'])) : ?>
        <div><?= $value['duree'] ?></div>
    <?php else : ?>
        <div><?= $value['nb_rep'] ?></div>
    <?php endif; ?>
<?php endforeach; ?>

</main>
</body>

</html>