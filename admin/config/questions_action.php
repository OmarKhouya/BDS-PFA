<?php 
session_start();
require("../../includes/dbc.php");  


try {

    
    if(isset($_POST["QuestionRefuse"])){
        $sql = "update aidequestions set visible=0 where id=:id";
        $stmt = $db->prepare($sql);
        $stmt->execute([":id"=>$_POST["idQuestionsVisible"]]);
    }
    else if(isset($_POST["QuestionAccepte"])){
        $sql = "update aidequestions set visible=1 where id=:id";
        $stmt = $db->prepare($sql);
        $stmt->execute([":id"=>$_POST["idQuestionsVisible"]]);
    }
    if(isset($_POST["answerQuestion"])){
        $sql = "update aidequestions set answer=:answer where id=:id";
        $stmt = $db->prepare($sql);
        $stmt->execute([":id"=>$_POST["idQuestionsVisible"],":answer"=>$_POST["answer"]]);
    }

    header("location: ../pages/questions.php");
}catch (PDOException $e){
    header("location: ../pages/questions.php?error=1");
}
?>