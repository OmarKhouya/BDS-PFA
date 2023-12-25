<?php 
session_start();
require("../../includes/dbc.php");  


try {

    if(isset($_POST["participationBlogAccepte"])){
        $sql = "update participation set showBlog=:true where numero=:num";
        $stmt = $db->prepare($sql);
        $stmt->execute([":num"=>$_POST["numeroParticip"],":true"=>1]);
    }
    else if(isset($_POST["participationBlogRefuse"])){
        $sql = "update participation set showBlog=:false where numero=:num";
        $stmt = $db->prepare($sql);
        $stmt->execute([":num"=>$_POST["numeroParticip"],":false"=>0]);
    }
    
    if(isset($_POST["participationBlogDelete"])){
        $sql = "Delete from participation where numero=:num";
        $stmt = $db->prepare($sql);
        $stmt->execute([":num"=>$_POST["numeroParticip"]]);
    }
    
    if(isset($_POST["commentaireAccepte"])){
        $sql = "update commentaires set visible=1 where CEF=:CEF";
        $stmt = $db->prepare($sql);
        $stmt->execute([":CEF"=>$_POST["CEFComment"]]);
    }
    else if(isset($_POST["commentaireRefuse"])){
        $sql = "update commentaires set visible=0 where CEF=:CEF";
        $stmt = $db->prepare($sql);
        $stmt->execute([":CEF"=>$_POST["CEFComment"]]);
    }
    else if(isset($_POST["commentaireDelete"])){
        $sql = "delete from commentaires where CEF=:CEF";
        $stmt = $db->prepare($sql);
        $stmt->execute([":CEF"=>$_POST["CEFComment"]]);
    }

    header("location: ../pages/blog.php");
}catch (PDOException $e){
    header("location: ../pages/blog.php?error=1");
}
?>