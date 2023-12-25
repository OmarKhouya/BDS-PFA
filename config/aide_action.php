<?php 
session_start();
require("../includes/dbc.php");
try{
    $set = $db->prepare("insert into aidequestions(CEF,nom,email,question) values (:CEF,:nom,:email,:question)");
    $set->execute([":CEF"=>$_POST["CEF"],":nom"=>$_POST["nom"],":email"=>$_POST["email"],":question"=>$_POST["Question"]]);

    header("location:../pages/aide.php?question=1");
}catch(PDOException $e){
    header("location:../pages/aide.php?error=1");
}
?>