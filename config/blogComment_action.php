<?php 
session_start();
require("../includes/dbc.php");
try{
$set = $db->prepare("insert into commentaires(CEF,nom,email,commentaire) values (:CEF,:nom,:email,:commentaire)");
$set->execute([":CEF"=>$_POST["CEF"],":nom"=>$_POST["nom"],":email"=>$_POST["email"],":commentaire"=>$_POST["comment"]]);  
header("location: ../pages/blog.php?comment=1"); 
}catch(PDOException $e){
        header("location: ../pages/blog.php?error=1");
}
?>