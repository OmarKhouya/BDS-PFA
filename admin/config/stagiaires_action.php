<?php 
session_start();
require("../../includes/dbc.php");  


try {
    if(isset($_POST["ValiderRemoveStagiaire"])){
        $sql = "delete from stagiaire where CEF=:CEF" ;
        $stmt = $db->prepare($sql);
        $ver = $stmt->execute([":CEF"=>$_POST["CEF"]]); 
        if($ver){
            header("location: ../pages/stagiaires.php?stg=1");  
        }else{
            header("location: ../pages/stagiaires.php?error=1");  
        }
    }
}catch (PDOException $e){
    header("location: ../pages/stagiaires.php?error=2");
}
?>