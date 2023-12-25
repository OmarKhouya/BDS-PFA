<?php 
session_start();
require("../includes/dbc.php");
try{
    $CEF = $_POST["CEF"];
    $Nom = $_POST["Nom"];
    $prenom = $_POST["prenom"];
    $email_scolaire = $_POST["email_scolaire"];
    $filier = $_POST["filiere"];
    $option = $_POST["option"];
    $Telephone = $_POST["Telephone"];
    $password = $_POST["password"];
    
    $Settings = $db->prepare("insert into stagiaire(CEF,nom,prenom,email_scolaire,filiere,optionstg,telephone,password) values(:CEF, :Nom,:prenom,:email_scolaire,:filiere,:option,:Telephone,:password)");
    $Settings->execute([":CEF"=>$CEF,":Nom"=>$Nom,":prenom"=>$prenom,":email_scolaire"=>$email_scolaire,":filiere"=>$filier,":option"=>$option,":Telephone"=>$Telephone,":password"=>$password]);
    header("location: ../pages/login.php");
}catch(PDOException $e){
    header("location: ../pages/signup.php?error=1");
}
?>
