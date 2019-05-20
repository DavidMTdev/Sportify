<?php require_once("includes/header.php"); ?>

<form action="" method="post">
    <SELECT name="poid" size="1">
        <OPTION> Poid(kg)
            <?php for ($i = 40; $i <= 150; $i++) : ?>
            <OPTION> <?= $i;
                endfor ?>
    </SELECT>

    <SELECT name="taille" size="1">
        <OPTION> Taille(cm)
            <?php for ($i = 100; $i <= 230; $i++) : ?>
            <OPTION> <?= $i;
                endfor ?>
    </SELECT>

    <button type="submit" name="valide_imc">Valider IMC</button>
</form>