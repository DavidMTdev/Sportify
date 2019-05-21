<?php require_once("includes/header.php");
$imcRecurrence = imcRecurrence();
if($imcRecurrence == 1){
    header('location: imc.php');
}
$listchecked = [];
$listInput = [];
$listPoid = [];


?>

<form action="" name="form" id="form" method="post">
    <?php foreach ($listExercice as $key => $value) : ?>
        <?php if ($listExercice[$key]['id_exercice'] <= 81) : ?>
            <img src="images/<?php echo $listExercice[$key]['images_ex'] ?>" alt="">
            <input type="checkbox" id="checkbox<?= $key ?>" name="exercice<?= $listExercice[$key]['id_exercice'] ?>">
            <label for="checkbox<?= $key ?>"><?= $listExercice[$key]['nom_ex']; ?></label>
            <?php if ($_SESSION['niveau'] == 4 &&  empty($listExercice[$key]['duree'])) : ?>
                <input type="number" id="" name="custom<?= $listExercice[$key]['id_exercice'] ?>" placeholder="nombre repetition">
                <input type="number" id="" name="serie<?= $listExercice[$key]['id_exercice'] ?>" placeholder="nombre de serie">
            <?php elseif ($_SESSION['niveau'] == 4) : ?>
                <input type="time" id="" name="custom<?= $listExercice[$key]['id_exercice'] ?>">
                <input type="number" id="" name="serie<?= $listExercice[$key]['id_exercice'] ?>" placeholder="nombre de serie">
            <?php endif; ?>
            <br>
        <?php endif;
endforeach; ?>
    <button type="submit" name="submit_choiceExercice">valider les exercices</button>

</form>
<script src="js/choiceExercice.js"></script>

<?php require_once("includes/footer.php"); ?>