<?php 
session_start();
require("../../includes/dbc.php");  


try {

    if(isset($_POST["ActivierlapageVote"])){
        $set = $db->prepare("update activationPageVote set active=:true where active=0");
        if($set->execute([":true"=>1])){
            header("location: ../pages/vote.php");
        }else{
            header("location: ../pages/vote.php");
        }
    }
    else if(isset($_POST["DesactivierlapageVote"])){
        $set = $db->prepare("update activationPageVote set active=:true where active=1");
        if($set->execute([":true"=>0])){
            header("location: ../pages/vote.php");
        }else{
            header("location: ../pages/vote.php");
        }
    }

    if(isset($_POST["SelectCEFCandidat"])){
        $sql = "insert into candidat(CEF,num_vote,num_votes) values (:cefValue,:voteNumero,0)";
        $stmt= $db->prepare($sql);
        $stmt->bindParam(':cefValue', $_POST["SelectCEFCandidat"]);
        $stmt->bindParam(':voteNumero', $_POST["vote_numero"]);
        if($stmt->execute()){
            header("location: ../pages/vote.php?candidat=1");
        }else{
            header("location: ../pages/vote.php?error=1");
        }
    }

    if(isset($_POST["removeCandidat"])){
        $CEF =$_POST["SelectCEFCandidatRemove"];
        $sql = "DELETE FROM candidat WHERE  CEF=:cefValue";
        $stmt= $db->prepare($sql);
        $stmt->bindParam(':cefValue', $CEF);
        if($stmt->execute()){
            header("location: ../pages/vote.php?candidat=2");
        }else{
            header("location: ../pages/vote.php?error=2");
        }
    }

    
    if(isset($_POST["removeElecteur"])){
        $CEF = $_POST["SelectCEFElecteur"];

        $stmt= $db->prepare("DELETE FROM electeur WHERE CEF=:cefValue");
        $stmt1 = $db->prepare("UPDATE candidat set num_votes=(num_votes-1) where CEF=:cefValue");
        
        if($stmt->execute([":cefValue"=>$CEF]) and  $stmt1->execute([":cefValue"=>$CEF])){
            header("location: ../pages/vote.php?electeur=1");
        }else{
            header("location: ../pages/vote.php?error=3");
        }
    }


}catch (PDOException $e){
    header("location: ../pages/vote.php?error=1");
}
?>