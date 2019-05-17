<?php require_once("includes/header.php"); 
$listchecked = [];


?>

<form action="" name="form" id="form" method="post">
    <?php foreach ($listExercice as $key => $value) : ?>
        <input type="checkbox" id="checkbox" name="exercice<?= $key ?>"> 
        <label for="checkbox"><?= $listExercice[$key]['nom_ex']; ?></label>
        <br>
<?php endforeach; ?>
    <button type="submit" name="submit_choiceExercice">valider les exercices</button>  
    
</form>
</main>

<script src="js/choiceExercice.js"></script>
</body>

</html>