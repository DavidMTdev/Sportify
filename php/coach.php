<?php require_once('includes/header.php');
<<<<<<< HEAD
=======
$imcRecurrence = imcRecurrence();
if($imcRecurrence == 1){
    header('location: imc.php');
} 
>>>>>>> ebc0c4e88663352173eab9eff7af41d48af60680
$premium = premium();
if (empty($premium[0]['id_premium'])) {
    header('location: premium.php');
}
?>

<div class="coach">
    <div class="coach-container">
        <h1>Nos Coach</h1>
        <div class="border"></div>
        <div class="coach-all">
            <?php foreach ($afficherCoach as $key => $value) : ?>
                <div class="col">
                    <form action="" method="get">
                        <a href="listecoachprofil.php?id_coach=<?php print $afficherCoach[$key]['id_coach'] ?>">
                    </form>
                    <div class="coach-presentation">
                        <img src="../upload/<?php echo $afficherCoach[$key]['images_c'] ?> " alt="">

                        <div class="coach-name"><?php echo $afficherCoach[$key]['nom_c'] . " " . $afficherCoach[$key]['prenom_c'] ?></div>

                        <h3>Note générale :</h3>
                        <div class="coach-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                        <div class="coach-speciality">
                            <h3>Spécialité :</h3>
                            <h4><?php echo $afficherCoach[$key]['specialite'] ?></h4>
                        </div>

                        <div class="coach-description">
                            <h3>Description :</h3>
                            <p>
                                <?php echo $afficherCoach[$key]['description_c'] ?>
                            </p>
                        </div>
                    </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require_once("includes/footer.php"); ?>