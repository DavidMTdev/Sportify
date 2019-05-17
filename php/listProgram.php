<?php require_once("includes/header.php"); ?>

<h1>Liste des Programme enregistré</h1>
<?php foreach ($listProgram as $key => $value) : ?>
    <div>
        <h2>Nom du programme</h2>
        <div><?= $value['nom_pro'] ?></div>
        <h2>Description</h2>
        <div><?= $value['descriptions'] ?></div>
        <h2>Niveau</h2>
        <div><?= $value['niveau'] ?></div>
        <h2>Objectif</h2>
        <div><?= $value['objectif'] ?></div>
        <form action=<?= "listProgram.php"   ?> method="get">
            <button type="submit" name="id" value=<?= $value['id_premium']; ?>>Créer un programme</button>
        </form>
    </div>
<?php endforeach; ?>
</main>

</body>

</html>