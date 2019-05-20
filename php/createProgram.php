<?php require_once("includes/header.php"); ?>

<div class="create-program-title">
    <h1>Créer votre programme</h1>
    <div class="border"></div>
</div>

<?php if (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) : ?>

    <form action="choiceExercice.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
        <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
        <input type="hidden" name="id_coach" value=<?= $_GET['id_coach']; ?>>
        <input type="text" name="nom_pro" placeholder="Nom Programme">
        <input type="file" name="img">
        <input type="textarea" name="descriptions" placeholder="description du programme">
        <SELECT name="niveau" size="1">
            <OPTION> Niveau
            <OPTION> Débutant
            <OPTION> Intermédiaire
            <OPTION> Difficile
            <OPTION> Custom
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
            <OPTION> Niveau
            <OPTION> Débutant
            <OPTION> Intermédiaire
            <OPTION> Difficile
            <OPTION> Custom
        </SELECT>
        <input type="textarea" name="objectif" placeholder="objectif du programme">
        <button type="submit" name="submit_create_program">Choisir les exercices</button>
    </form>
<?php endif; ?>

</main>

</body>

</html>