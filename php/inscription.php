<?php 
$pdo = new PDO("mysql:host=localhost:3306;dbname=sportify","root","");

if (isset($_POST['mdp']) && isset($_POST['verification']) && isset($_POST['submit'])){
    if ($_POST['mdp'] == $_POST['verification']){
        
        $file = upload();

        if (!($file === 1) && !($file === 2)) {
            $statement = $pdo->prepare(
                "INSERT INTO utilisateur ( nom_u, prenom_u, mdp_u, age_u, adresse_u, ville_u, code_postal_u, mail_u, telephone_u, poid_u, taille, images_u) 
                VALUES (:nom_u , :prenom_u, :mdp_u, :age_u, :adresse_u, :ville_u, :code_postal_u, :mail_u, :telephone_u, :poid_u, :taille, :images_u)"
                );
            $statement->execute(array(
                ':nom_u' => $_POST['nom'],
                ':prenom_u' => $_POST['prenom'],
                ':mdp_u' => $_POST['mdp'],
                ':age_u' => $_POST['age'],
                ':adresse_u' => $_POST['adresse'],
                ':ville_u' => $_POST['ville'],
                ':code_postal_u' => $_POST['code'],
                ':mail_u' => $_POST['email'],
                ':telephone_u' => $_POST['tel'],
                ':poid_u' => $_POST['poid'],
                ':taille' => $_POST['taille'],
                ':images_u' =>  $file 
            ));
                
            $success = "Vous etes inscrit !";
            echo $success;
                
        } elseif ($file === 1) {
            $error = 'Vous devez uploader un fichier de type png, jpg ou jpeg';
            echo $error;
        } else {
            $error = 'la photo est trop lourde';
            echo $error;
        }

    } else {
        $error = 'les deux mot de passe ne sont pas pareil';
        echo $error;
    }
}

function upload(){
    $extensions = array('.png', '.jpg', '.jpeg');
    $file = $_FILES['image']['name'];
    $extension = strrchr($file, '.');
    
    $pdo = new PDO("mysql:host=localhost:3306;dbname=sportify","root","");

    $stmId = $pdo->query("SELECT id_utilisateur FROM utilisateur ");
    $id = $stmId->fetchAll(PDO::FETCH_ASSOC);
    var_dump($id);
    
    $a = count($id) - 1;
    if (empty($id)) {
        $var = 0;
    } else {
        $var = intval(end($id[$a])) + 1;
    }
    
    $file = $var . $extension;

    $folder = 'upload/'. $file;
  
    if(!in_array($extension, $extensions)){
        return 1;
    }

    if ($_FILES['image']['size'] < 2 * pow(10,6)) {
        $file = strtolower($file);
        move_uploaded_file($_FILES['image']['tmp_name'], $folder);

        return $file;
    } else {
        return 2;
    }     
}
?>
