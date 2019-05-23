<?php require_once("includes/header.php");
$imcRecurrence = imcRecurrence();
if ($imcRecurrence == 0) {
    header('location: profil.php');
} ?>


<div class="imc-form-container">
    <form action="" method="POST" class="imc-form-box">
        <h1>IMC</h1>
        <div class="border"></div>
        <div class="imc">
            <div class="imc-infos-container">
                <label for="">Poids(kg)</label>
                <SELECT name="poid" size="1" class="imc-info">
                    <?php for ($i = 40; $i <= 150; $i++) : ?>
                        <OPTION> <?= $i;
                            endfor ?>
                </SELECT>

                <label for="">Taille(cm)</label>
                <SELECT name="taille" size="1" class="imc-info">
                    <?php for ($i = 100; $i <= 230; $i++) : ?>
                        <OPTION> <?= $i;
                            endfor ?>
                </SELECT>

                <button class="imc-submit" type="submit" name="valide_imc">Valider IMC</button>

                <!-- <input class="login-submit" type="submit" name="valide_imc"> -->
            </div>
        </div>
    </form>
</div>

<!-- <button type="submit" name="valide_imc">Valider IMC</button> -->
</form>
</div>