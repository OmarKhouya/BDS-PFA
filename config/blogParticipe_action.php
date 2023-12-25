<?php
session_start();
require("../includes/dbc.php");
try{
    $uploadedFile = $_FILES['image']['tmp_name'];
    $fileContents = file_get_contents($uploadedFile);
    $set = $db->prepare("INSERT INTO participation(auteur_nom,CEF,auteur_fonction,objet,contenu,img) VALUES (:auteur_nom,:CEF,:auteur_fonction,:objet,:contenu,:img)");
    $set->execute([":auteur_nom"=>$_POST["nom"],":CEF"=>$_POST["CEF"],":auteur_fonction"=>$_POST["fonction"],":objet"=>$_POST["Objet"],":contenu"=>$_POST["content"],":img"=>$fileContents]);
    $set="";
    header("location: ../pages/blog.php?participe=1");exit;
}catch(PDOException $e){
    header("location: ../pages/blog.php?error=2");exit;
}
?>