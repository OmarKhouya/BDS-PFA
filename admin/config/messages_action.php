<?php 
session_start();
require("../../includes/dbc.php");  


try {

    
    if(isset($_POST["answermessage"])){
        $sql = "update contactmessages set answer=:answer where id=:id";
        $stmt = $db->prepare($sql);
        $stmt->execute([":id"=>$_POST["idMessageVisible"],":answer"=>$_POST["answer"]]);
    }
    
    header("location: ../pages/messages.php");
}catch (PDOException $e){
    header("location: ../pages/messages.php?error=1");
}
?>