<?php 
session_start();
require("../../includes/dbc.php");  

try {
    if(isset($_POST["addActualite"])){
        $id = $_POST["actualite"];
        $uploadedFile = $_FILES['imageActualite1']['tmp_name'];
        $fileContents = file_get_contents($uploadedFile);
        $stmt = $db->prepare("INSERT INTO actualite(id,title, created_at, content,image) VALUES (:id,:title,:timest,:content,:image)");
            
        $timest = date('Y-m-d H:i:s');
        $stmt->bindParam(':title', $_POST["titreActualite1"]);
        $stmt->bindParam(':content', $_POST["descriptActualite1"]);
        $stmt->bindParam(':image', $fileContents, PDO::PARAM_LOB);
        $stmt->bindParam(':timest', $timest);
        $stmt->bindParam(':id', $id);    
        $verify = $stmt->execute();
        header("location: ../pages/actualites.php?actualite=1");
    }
    else if(isset($_POST["delActualite"])){
        $id = $_POST["actualite"];
        $stmt = $db->prepare("DELETE FROM actualite WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $verify = $stmt->execute();
        if(!isset($_POST["actualite"])){
            header("location: ../pages/actualites.php?error=2");
        }else{
            header("location: ../pages/actualites.php?actualite=2");

        }
    }else{
        header("location: ../pages/actualites.php");
    }
echo "Connexion réussie";
}catch (PDOException $e){
    header("location: ../pages/actualites.php?error=1");
}
?>