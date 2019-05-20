<?php require_once("includes/header.php"); ?>

<div class="create-program-title">
    <h1>Créer votre programme</h1>
    <div class="border"></div>
</div>

<?php if (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) : ?>

    <div class="create-session-container">
        <form action="choiceExercice.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
            <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
            <input type="hidden" name="id_coach" value=<?= $_GET['id_coach']; ?>>

            <div class="create-session-name">
                <input type="text" name="nom_pro" placeholder="Nom Programme" class="create-session-input" required>
            </div>

            <div class="create-session-description">
                <textarea name="descriptions" placeholder="Description du programme" id="" cols="30" rows="10" class="create-session-input"></textarea>
            </div>

            <div class="create-session-objective">
                <textarea name="objectif" placeholder="Objectifs du programme" id="" cols="30" rows="10" class="create-session-input"></textarea>
            </div>

            <div class="create-session-img">
                <input type="file" name="img" id="image-choice">
                <label for="image-choice"> <img src="icons/icons8-ajouter-une-image-24.png" alt=""> Ajouter une image</label>
            </div>

            <div class="create-session-level">
                <SELECT name="niveau" size="1" class="create-session-input" required>
                    <OPTION> Niveau
                    <OPTION> Débutant
                    <OPTION> Intermédiaire
                    <OPTION> Difficile
                    <OPTION> Custom
                </SELECT>
            </div>

            <div class="create-session-submit">
                <button type="submit" name="submit_create_program" class="create-session-button">choisir tes exercices</button>
            </div>

        </form>
    </div>
<?php else : ?>
    <div class="create-session-container">
        <form action="choiceExercice.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
            <input type="hidden" name="id" value=<?= $_GET['id']; ?>>

            <div class="create-session-name">
                <input type="text" name="nom_pro" placeholder="Nom du programme" class="create-session-input" required>
            </div>

            <div class="create-session-description">
                <textarea name="descriptions" placeholder="Description du programme" id="" cols="30" rows="10" class="create-session-input"></textarea>
            </div>

            <div class="create-session-objective">
            <textarea name="objectif" placeholder="Objectifs du programme" id="" cols="30" rows="10" class="create-session-input"></textarea>
            </div>

            <div class="create-session-img">
                <input type="file" name="img" id="image-choice">
                <label for="image-choice"> <img src="icons/icons8-ajouter-une-image-24.png" alt=""> Ajouter une image</label>
            </div>

            <div class="create-session-level">
                <SELECT name="niveau" size="1" class="create-session-input" required>
                    <OPTION> Niveau
                    <OPTION> Débutant
                    <OPTION> Intermédiaire
                    <OPTION> Difficile
                    <OPTION> Custom
                </SELECT>
            </div>

            <div class="create-session-submit">
                <button type="submit" name="submit_create_program" class="create-session-button">Choisir les exercices</button>
            </div>
        </form>
    </div>
<?php endif; ?>

</main>

</body>

</html>