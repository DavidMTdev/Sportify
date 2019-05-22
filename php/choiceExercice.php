<?php require_once("includes/header.php");
$imcRecurrence = imcRecurrence();
if ($imcRecurrence == 1) {
    header('location: imc.php');
}
$listchecked = [];
$listInput = [];
$listPoid = [];


?>

<form action="" name="form" id="form" method="post">
    <div class="choiceexercice-container">
        <?php foreach ($listExercice as $key => $value) : ?>
            <?php if ($listExercice[$key]['id_exercice'] <= 81) : ?>
                <div class="choiceexercice-infos-container">
                    <div class="choiceexercice-infos">

                        <div class="choiceexercice-infos-title-container">
                            <div class="choiceexercice-infos-title">
                                <label for="checkbox<?= $key ?>"><?= $listExercice[$key]['nom_ex']; ?></label>
                                <div class="border"></div>
                            </div>
                        </div>

                        <div class="choiceexercice-infos-img">
                            <img src="images/<?php echo $listExercice[$key]['images_ex'] ?>" alt="">
                        </div>

                        <div class="choiceexercice-infos-input">
                            <input type="checkbox" class="choiceexercice-checkbox" id="checkbox<?= $key ?>" name="exercice<?= $listExercice[$key]['id_exercice'] ?>">
                        </div>


                        <?php if ($_SESSION['niveau'] == 4 &&  empty($listExercice[$key]['duree'])) : ?>
                            <div class="choiceexercice-custom-input-container">
                                <div class="choiceexercice-custom-input">
                                    <input type="number" id="" name="custom<?= $listExercice[$key]['id_exercice'] ?>" placeholder="Nombre répétitions">
                                    <input type="number" id="" name="serie<?= $listExercice[$key]['id_exercice'] ?>" placeholder="Nombre de séries">
                                </div>
                            </div>

                        <?php elseif ($_SESSION['niveau'] == 4) : ?>
                            <div class="choiceexercice-custom-input-container">
                                <div class="choiceexercice-custom-input">
                                    <input type="time" id="" name="custom<?= $listExercice[$key]['id_exercice'] ?>">
                                    <input type="number" id="" name="serie<?= $listExercice[$key]['id_exercice'] ?>" placeholder="Nombre de séries">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif;
    endforeach; ?>
    </div>
    <div class="choiceexercice-submit-container">
        <button type="submit" name="submit_choiceExercice" class="choiceexercice-submit">Valider les exercices</button>
    </div>
</form>
<script src="js/choiceExercice.js"></script>

<?php require_once("includes/footer.php"); ?>