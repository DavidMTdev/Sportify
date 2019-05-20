<?php require_once("includes/header.php"); 
$imcRecurrence = imcRecurrence();
if($imcRecurrence == 0){
    header('location: profil.php');
}?>

<form action="" method="post">
    <label for="">Poids(kg)</label>
    <SELECT name="poid" size="1">
            <?php for ($i = 40; $i <= 150; $i++) : ?>
            <OPTION> <?= $i;
                endfor ?>
    </SELECT>

    <label for="">Taille(cm)</label>
    <SELECT name="taille" size="1">
            <?php for ($i = 100; $i <= 230; $i++) : ?>
            <OPTION> <?= $i;
                endfor ?>
    </SELECT>

    <button type="submit" name="valide_imc">Valider IMC</button>
</form>