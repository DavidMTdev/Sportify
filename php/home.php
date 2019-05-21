<?php require_once("includes/header.php");
$imcRecurrence = imcRecurrence();
if($imcRecurrence == 1){
    header('location: imc.php');
}
?>
acceuil

<?php require_once("includes/footer.php"); ?>