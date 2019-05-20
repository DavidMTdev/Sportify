<?php require_once('includes/header.php');
$imcRecurrence = imcRecurrence();
if($imcRecurrence == 1){
    header('location: imc.php');
} 
$premium = premium();
if(empty($premium[0]['id_premium'])){
    header('location: premium.php');
}
?>
        
        <div class="coach">
            <div class="coach-container">
                <h1>Nos Coach</h1>
                <div class="border"></div>
                <div class="coach-all">
                <?php foreach ($afficherCoach as $key => $value): ?>
                    <div class="col">
                        <form action="" method="get">
                        <a href="listecoachprofil.php?id_coach=<?php print $afficherCoach[$key]['id_coach'] ?>">
                        </form>
                            <div class="coach-presentation">
                                <img src="../upload/<?php echo $afficherCoach[$key]['images_c'] ?> "alt="">

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

                    <!-- <div class="col">
                        <a href="">
                            <div class="coach-presentation">
                                <img src="http://rdironworks.com/wp-content/uploads/2017/12/dummy-200x200.png" alt="">
                                <div class="coach-name">Coach 2</div>
                                <h3>Note générale :</h3>
                                <div class="coach-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="coach-speciality">
                                    <h3>Spécialité :</h3>
                                    <h4>Perte de Poids</h4>
                                </div>
                                <h3>Description :</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus sunt, minima
                                    modi
                                    laborum architecto delectus iusto eos inventore beatae? </p>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="">
                            <div class="coach-presentation">
                                <img src="http://rdironworks.com/wp-content/uploads/2017/12/dummy-200x200.png" alt="">
                                <div class="coach-name">Coach 3</div>
                                <h3>Note générale :</h3>
                                <div class="coach-stars">

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="coach-speciality">
                                    <h3>Spécialité :</h3>
                                    <h4>Perte de Poids</h4>
                                </div>
                                <h3>Description :</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus sunt, minima
                                    modi
                                    laborum architecto delectus iusto eos inventore beatae?</p>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="">
                            <div class="coach-presentation">
                                <img src="http://rdironworks.com/wp-content/uploads/2017/12/dummy-200x200.png" alt="">

                                <div class="coach-name">Coach 4</div>

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
                                    <h4>Perte de Poids</h4>
                                </div>

                                <div class="coach-description">
                                    <h3>Description :</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus sunt,
                                        minima
                                        modi
                                        laborum architecto delectus iusto eos inventore beatae?
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="">
                            <div class="coach-presentation">
                                <img src="http://rdironworks.com/wp-content/uploads/2017/12/dummy-200x200.png" alt="">
                                <div class="coach-name">Coach 5</div>
                                <h3>Note générale :</h3>
                                <div class="coach-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="coach-speciality">
                                    <h3>Spécialité :</h3>
                                    <h4>Perte de Poids</h4>
                                </div>
                                <h3>Description :</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus sunt, minima
                                    modi
                                    laborum architecto delectus iusto eos inventore beatae? </p>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="">
                            <div class="coach-presentation">
                                <img src="http://rdironworks.com/wp-content/uploads/2017/12/dummy-200x200.png" alt="">
                                <div class="coach-name">Coach 6</div>
                                <h3>Note générale :</h3>
                                <div class="coach-stars">

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="coach-speciality">
                                    <h3>Spécialité :</h3>
                                    <h4>Perte de Poids</h4>
                                </div>
                                <h3>Description :</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus sunt, minima
                                    modi
                                    laborum architecto delectus iusto eos inventore beatae?</p>
                            </div>
                        </a>
                    </div> -->


                </div>
            </div>
        </div>
    </main>
    <footer></footer>

</body>

</html>