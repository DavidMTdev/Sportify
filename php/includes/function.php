<?php
session_start();

$pdo = new PDO("mysql:host=localhost:3306;dbname=sportify", "root", "");

if (isset($_POST["login"]) && isset($_POST["password"])) {

    $statementU = $pdo->query(
        "SELECT mail_u, mdp_u FROM utilisateur"
    );

    $statementC = $pdo->query(
        "SELECT mail_c, mdp_c FROM coach"
    );

    $utilisateur = $statementU->fetchAll(PDO::FETCH_ASSOC);
    $coach = $statementC->fetchAll(PDO::FETCH_ASSOC);

    foreach ($utilisateur as $key => $value) {
        if ($_POST["login"] == $utilisateur[$key]["mail_u"] && $_POST["password"] == $utilisateur[$key]["mdp_u"]) {

            $_SESSION["login"] = $_POST["login"];
            $_SESSION["connected"] = true;
            $_SESSION["connectedAt"] = new DateTime();

            echo "vous est co";
        } elseif ($_POST["login"] == $coach[$key]["mail_c"] && $_POST["password"] == $coach[$key]["mdp_c"]) {

            $_SESSION["login"] = $_POST["login"];
            $_SESSION["connected"] = true;
            $_SESSION["connectedAt"] = new DateTime();

            echo "vous est co";
        } else {
            $error = "Votre identifiant est incorrecte !";
            echo $error;
        }
    }
}
