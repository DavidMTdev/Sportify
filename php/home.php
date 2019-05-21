<?php require_once("includes/header.php");
$imcRecurrence = imcRecurrence();
if ($imcRecurrence == 1) {
    header('location: imc.php');
}
?>
<div id="premium" class="index-comparison">
    <div class="comparison-container">
        <div class="comparison">
            <div class="comparison-header">
                <img src="assets/icons/basic-icon-white.png" alt="">
                <div class="comparison-title">
                    <h2>Basic</h2>
                    <h3>Gratuit</h3>
                </div>
            </div>
            <div class="comparison-body">
                <ul>
                    <li class="valid-argument">Infos sur les compléments alimentaires</li>
                    <li class="valid-argument">Playlist musicale</li>
                    <li class="valid-argument">Programme prédéfini</li>
                    <li class="valid-argument">Suivi des performances</li>
                    <li class="valid-argument">Test d'IMC</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                </ul>

                <div class="comparison-footer">
                    <a href="">
                        <div class="comparison-button">
                            <img src="assets/icons/icons8-caddie-16.png" alt="">Achetez le maintenant
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="comparison-container">
        <div class="comparison ">
            <div class="comparison-header">
                <img src="assets/icons/premium-icon-white-green.png" alt="">
                <div class="comparison-title">
                    <h2>Premium</h2>
                    <h3>19.99€/mois</h3>
                </div>

            </div>
            <div class="comparison-body">
                <ul>
                    <li class="valid-argument">Infos sur les compléments alimentaires</li>
                    <li class="valid-argument">Playlist musicale</li>
                    <li class="valid-argument">Programme prédéfini</li>
                    <li class="valid-argument">Suivi des performances</li>
                    <li class="valid-argument">Test d'IMC</li>
                    <li class="valid-argument">Suivi personalisé</li>
                    <li class="valid-argument">Coaching</li>
                    <li class="valid-argument">Séance personalisé</li>
                </ul>

                <div class="comparison-footer">
                    <form action="" method="post">
                        <button type="submit" name="submitPremium">
                            <div class="comparison-button">
                                <img src="icons/icons8-caddie-16.png" alt="">Achetez le maintenant
                            </div>
                        </button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>

<?php require_once("includes/footer.php"); ?>