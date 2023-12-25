<?php 
session_start();
require("../includes/dbc.php");
try{

    if(isset($_POST["delete_comment"])){
        $settings = $db->prepare("delete from commentaires where CEF=:CEF");
        $settings->execute([":CEF"=>$_SESSION["CEF"]]);
        header("location: ../pages/profile.php?comment=1");
    }
    if(isset($_POST["blog-delete"])){
        $settings = $db->prepare("delete from participation where CEF=:CEF and numero=:num");
        $settings->execute([":CEF"=>$_SESSION["CEF"],":num"=>$_POST["numero_participation"]]);
        header("location: ../pages/profile.php?participation=1");
    }
    if(isset($_POST["question-delete"])){
        $settings = $db->prepare("delete from aidequestions where CEF=:CEF and id=:id");
        $settings->execute([":CEF"=>$_SESSION["CEF"],":id"=>$_POST["id_participation"]]);
        header("location: ../pages/profile.php?question=1");
    }
}catch(PDOException $e){
    header("location: ../pages/profile.php?error=0");
    // die('Erreur : ' . $e->getMessage());
}
?>
