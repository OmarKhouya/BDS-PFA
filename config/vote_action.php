<?php 
session_start();
require("../includes/dbc.php");
try{
    $setting_electeur = $db->prepare("insert into electeur(CEF,num_vote) VALUES (:CEF,:num_vote)"); 
    if($setting_electeur->execute([":CEF"=>$_POST["CEF"],":num_vote"=>$_POST["voteCandidat"]])){
        $setting_vote = $db->prepare("insert into vote(num_vote,sujet,CEF) VALUES (:num_vote,:sujet,:CEF)"); 
        if($setting_vote->execute([":num_vote"=>$_POST["voteCandidat"],":sujet"=>$_POST["sujet"],":CEF"=>$_POST["CEF"]])){
            $setting_candidat = $db->prepare("UPDATE candidat set num_votes=(num_votes+1) where num_vote=:num_vote");
            $setting_candidat->execute([":num_vote"=>$_POST["voteCandidat"]]);
        }
    }
    header("location: ../pages/vote.php?vote=done");
}catch(PDOException $e){
    header("location: ../pages/vote.php?error=1");
}
?>