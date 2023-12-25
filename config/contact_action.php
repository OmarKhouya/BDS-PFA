<?php 
session_start();
require("../includes/dbc.php");
try{
    $set = $db->prepare("insert into contactmessages (CEF,nom,email,message ) values (:CEF,:nom,:email,:message)");
    $set->execute([":CEF"=>$_POST["CEF"],":nom"=>$_POST["nom"],":email"=>$_POST["email"],":message"=>$_POST["message"]]);
    header("location: ../pages/contact.php?contact=1");
}catch(PDOException $e){
    header("location: ../pages/contact.php?error=1");
}
?>