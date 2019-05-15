<?php require_once('includes/header.php'); 
$premium = premium();
if(empty($premium[0]['id_premium'])){
    header('location: premium.php');
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/coach.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Accueil</title>
</head>

<body>
    <main>
        <div class="coach">
            <div class="coach-container">
                <h1>Nos Coach</h1>
                <div class="border"></div>
                <div class="coach-all">
                    <div class="col">
                        <a href="">
                            <div class="coach-presentation">
                                <img src="http://rdironworks.com/wp-content/uploads/2017/12/dummy-200x200.png" alt="">

                                <div class="coach-name">Coach 1</div>

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
                    </div>


                </div>
            </div>
        </div>
    </main>
    <footer></footer>

</body>

</html>