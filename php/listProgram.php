<?php require_once("includes/header.php"); ?>

<h1>Liste des Programme enregistré</h1>
<?php if (isset($_SESSION["connectedCoach"]) && $_SESSION["connectedCoach"]) : ?>
    <form action="createProgram.php" method="get">
        <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
        <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
        <input type="hidden" name="id_coach" value=<?= $_GET['id_coach']; ?>>
        <button type="submit">Créer un programme</button>
    </form>
    <?php foreach ($listProgram as $key => $value) : ?>
        <div>
            <form action=<?= "meeting.php?id=" . $_GET['id'] ?> method="post">
                <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
                <input type="hidden" name="id_prog" value=<?= $value['id_programme']; ?>>
                <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
                <input type="hidden" name="id_coach" value=<?= $_GET['id_coach']; ?>>
                <div><img src=<?= "../upload/" . $value['images_pro'] ?>></div>
                <h2>Nom du programme</h2>
                <div><?= $value['nom_pro'] ?></div>
                <h2>Description</h2>
                <div><?= $value['descriptions'] ?></div>
                <h2>Niveau</h2>
                <div><?= $value['niveau'] ?></div>
                <h2>Objectif</h2>
                <div><?= $value['objectif'] ?></div>
                <button type="submit">Choisir le programme</button>
                <br>
            </form>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <form action="createProgram.php" method="get">
        <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
        <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
        <button type="submit">Créer un programme</button>
    </form>
    <?php foreach ($listProgram as $key => $value) : ?>
        <div>
            <form action="meeting.php" method="post">
                <input type="hidden" name="date" value=<?= $_GET['date']; ?>>
                <input type="hidden" name="id_prog" value=<?= $value['id_programme']; ?>>
                <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
                <div><img src=<?= "../upload/" . $value['images_pro'] ?>></div>
                <h2>Nom du programme</h2>
                <div><?= $value['nom_pro'] ?></div>
                <h2>Description</h2>
                <div><?= $value['descriptions'] ?></div>
                <h2>Niveau</h2>
                <div><?= $value['niveau'] ?></div>
                <h2>Objectif</h2>
                <div><?= $value['objectif'] ?></div>
                <button type="submit">Choisir le programme</button>
                <br>
            </form>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<?php require_once("includes/footer.php"); ?>