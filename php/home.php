<?php require_once("includes/header.php");
$imcRecurrence = imcRecurrence();
if ($imcRecurrence == 1) {
    header('location: imc.php');
}
?>
<div class="index-container">

    <section class="main-background">
        <div class="main-informations">
            <div class="main-informations-container">
                <h2>Sportify</h2>
                <div class="border"></div>
                <h4>Sportify vous propose un accompagnement sportif afin de vous aider a remplir vos objectifs.
                    Nos coach vous proposerons des programmes personalisés et vous pourrez suivre votre
                    évolution au fil du temps grace a notre calcul de performance et d'IMC en ligne. Donc finis
                    les excuse pour ne pas faire de sport car Sportify et la !</h4>
            </div>
        </div>
    </section>

    <div class="principal-comparison-title-container">
        <div class="principal-comparison-title">
            <h2>Nos offres</h2>
            <div class="border"></div>
        </div>
    </div>
    <div class="index-comparison-container">
        <div id="premium" class="index-comparison">
            <div class="comparison-container">
                <div class="comparison">
                    <div class="comparison-header">
                        <img src="icons/basic-icon-white.png" alt="">
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
                            <button class="comparison-button"><img src="icons/icons8-caddie-16.png" alt="">Achetez le maintenant</button>
                        </div>

                    </div>
                </div>
            </div>


            <div class="comparison-container">
                <div class="comparison ">
                    <div class="comparison-header">
                        <img src="icons/premium-icon-white.png" alt="">
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
                                <button type="submit" class="comparison-button" name="submitPremium"><img src="icons/icons8-caddie-16.png" alt="">Achetez le maintenant</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="index-music-title-container">
        <div class="index-music-title">
            <h2>Musiques</h2>
            <div class="border"></div>
        </div>
    </div>

    <div class="index-music-container">

        <div class="music">

            <div class="playlist-container">
                <a href="playlist1.php">
                    <div class="playlist">

                        <div class="playlist-title-container">
                            <h3>Musculation</h3>
                            <div class="border"></div>
                        </div>
                        <div class="playlist-infos-container">
                            <img src="images/page-musique 2.0/bodybuilding.jpg" alt="">
                            <p>"La résistance que vous affrontez dans le gym <br>
                                et la résistance que vous affrontez dans la vie <br>
                                ne peuvent que vous rendre plus fort."</p>
                        </div>

                    </div>
                </a>
            </div>


            <div class="playlist-container">
                <a href="playlist2.php">
                    <div class="playlist">
                        <div class="playlist-title-container">
                            <h3>Crossfit</h3>
                            <div class="border"></div>
                        </div>

                        <div class="playlist-infos-container">
                            <img src="images/page-musique 2.0/crossfit.jpg" alt="">
                            <p>"Lorsque que vient le temps de bien manger et de s’entraîner, <br>
                                il y a pas de "Je commencerai demain." <br>
                                Demain, c’est la maladie."</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="playlist-container">
                <a href="playlist3.php">
                    <div class="playlist">
                        <div class="playlist-title-container">
                            <h3>Workout</h3>
                            <div class="border"></div>
                        </div>
                        <div class="playlist-infos-container">
                            <img src="images/page-musique 2.0/workout.jpg" alt="">
                            <p> "Aucun citoyen n’a le droit de rester un amateur face à l’entraînement… <br>
                                quelle disgrâce pour un homme <br>
                                de devenir vieux sans jamais avoir vu la beauté et la force complète de son corps."</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="playlist-container">
                <a href="playlist4.php">
                    <div class="playlist">
                        <div class="playlist-title-container">
                            <h3>Cardio</h3>
                            <div class="border"></div>
                        </div>
                        <div class="playlist-infos-container">
                            <img src="images/page-musique 2.0/cardio.jpg" alt="">
                            <p>"Le combat est gagné ou perdu bien avant de monter sur le ring, <br>
                                le vrai combat est dans le gym et sur la route lorsque je vais courir."</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
</div>

<?php require_once("includes/footer.php"); ?>