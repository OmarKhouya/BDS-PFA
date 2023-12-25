<?php 
session_start();
require("../includes/dbc.php");
try{
        
    $CEF = $_SESSION["CEF"];
    $nom = $_POST["Nom"];
    $prenom = $_POST["prenom"];
    $email_scolaire = $_POST["email_scolaire"];
    $filiere = $_POST["filiere"];
    $option = $_POST["option"];
    $telephone = $_POST["Telephone"];
    $password = $_POST["password"];

    if (isset($_FILES["image"])) {    
        $uploadedFile = $_FILES['image']['tmp_name'];
        if (!empty($uploadedFile)) {
            $fileContents = file_get_contents($uploadedFile);
        }
    } 

    if (!empty($CEF) || !empty($nom) || !empty($prenom) || !empty($email_scolaire) || !empty($filiere) || !empty($option) || !empty($telephone) || !empty($password)  || !empty($fileContents)) {

        $sql = "UPDATE stagiaire SET";

        if (!empty($nom)) {
            $sql .= " nom = ?,";
        }
        
        if (!empty($prenom)) {
            $sql .= " prenom = ?,";
        }
        
        if (!empty($email_scolaire)) {
            $sql .= " email_scolaire = ?,";
        }
        
        if (!empty($filiere)) {
            $sql .= " filiere = ?,";
        }
        
        if (!empty($option)) {
            $sql .= " optionstg = ?,";
        }
        
        if (!empty($telephone)) {
            $sql .= " telephone = ?,";
        }

        if (!empty($password)) {
            $sql .= " password = ?,";
        }

        if (!empty($fileContents)) {
            $sql .= " image = ?,";
        }

        $sql = rtrim($sql, ",");
        $sql .= " WHERE CEF = ?";
        
        $stmt = $db->prepare($sql);
        $bindParams = [];
        
        if (!empty($nom)) {
            $bindParams[] = $nom;
        }
        
        if (!empty($prenom)) {
            $bindParams[] = $prenom;
        }
        
        if (!empty($email_scolaire)) {
            $bindParams[] = $email_scolaire;
        }
        
        if (!empty($filiere)) {
            $bindParams[] = $filiere;
        }
        
        if (!empty($option)) {
            $bindParams[] = $option;
        }
        
        if (!empty($telephone)) {
            $bindParams[] = $telephone;
        }

        if (!empty($password)) {
            $bindParams[] = $password;
        }

        if (!empty($fileContents)) {
            $bindParams[] = $fileContents;
        }
        
        $bindParams[] = $CEF;
        
        
        if ($stmt->execute($bindParams)) {
            header("location: ../pages/profile.php?update=1");
        } else {
            header("location: ../pages/profile.php?update=0");
        }
    } else {
        header("location: ../pages/profile.php?update=0");
    }
}catch(PDOException $e){
    header("location: ../pages/profile.php?error=0");
    // die('Erreur : ' . $e->getMessage());
}
?>
