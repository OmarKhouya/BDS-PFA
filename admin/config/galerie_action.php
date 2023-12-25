<?php 
session_start();
require("../../includes/dbc.php");  


try {

    if(isset($_POST['AjouterGaleriePhoto'])){
        if(isset($_FILES['GaleriePhoto'])) {
    
          $uploadedFile = $_FILES['GaleriePhoto']['tmp_name'];
          $fileContents = file_get_contents($uploadedFile);
    
          // $id = $_POST["actualite"];
    
          $sql = "INSERT INTO galerieabout (img) VALUES (:image)";
          $stmt = $db->prepare($sql);
    
          $stmt->bindParam(':image', $fileContents, PDO::PARAM_LOB);
          
          $stmt->execute();
        }
    }

    if(isset($_POST['DeleteGaleriePhoto'])){

        $id = $_POST["SelectGalerie_id"];
        $sql = "delete from galerieabout where id=:id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
    }
    

    header("location: ../pages/galerie.php?Updated");
}catch (PDOException $e){
    header("location: ../pages/galerie.php?error=1");
}
?>