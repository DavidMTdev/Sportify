<?php require_once("includes/header.php");  ?>

<form action="choiceExercice.php" method="post" enctype="multipart/form-data">
<input type="text" name="nom_pro" placeholder="Nom Programme">
<input type="file" name="img">
<input type="textarea" name="descriptions" placeholder="description du programme">
<SELECT name="niveau" size="1">
                        <OPTION> niveau 
                        <OPTION> debutant  
                        <OPTION> intermediare  
                        <OPTION> difficile
                        <OPTION> custom    
                    </SELECT>
<input type="textarea" name="objectif" placeholder="objectif du programme">
<button name="submit_create_program">choisir tes exercices</button>
</form>
</main>

</body>

</html>