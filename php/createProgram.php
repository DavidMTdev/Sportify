<?php require_once("includes/header.php"); 
$imcRecurrence = imcRecurrence();
if($imcRecurrence == 1){
    header('location: imc.php');
}?>

<?php if (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) : ?>
    <form action="choiceExercice.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
        <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
        <input type="hidden" name="id_coach" value=<?= $_GET['id_coach']; ?>>
        <input type="text" name="nom_pro" placeholder="Nom Programme">
        <input type="file" name="img">
        <input type="textarea" name="descriptions" placeholder="description du programme">
        <SELECT name="niveau" size="1">
            <OPTION> niveau
            <OPTION> debutant
            <OPTION> intermediare
            <OPTION> difficile
            <OPTION> custom
        </SELECT>
        <input type="textarea" name="objectif" placeholder="objectif du programme">
        <button type="submit" name="submit_create_program">choisir tes exercices</button>
    </form>
<?php else : ?>
    <form action="choiceExercice.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
        <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
        <input type="text" name="nom_pro" placeholder="Nom Programme">
        <input type="file" name="img">
        <input type="textarea" name="descriptions" placeholder="description du programme">
        <SELECT name="niveau" size="1">
            <OPTION> niveau
            <OPTION> debutant
            <OPTION> intermediare
            <OPTION> difficile
            <OPTION> custom
        </SELECT>
        <input type="textarea" name="objectif" placeholder="objectif du programme">
        <button type="submit" name="submit_create_program">choisir tes exercices</button>
    </form>
<?php endif; ?>

</main>

</body>

</html>