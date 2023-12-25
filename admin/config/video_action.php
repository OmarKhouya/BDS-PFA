<?php 
session_start();
require("../../includes/dbc.php");  

try {
    if(isset($_POST["titreVideo"]) && isset($_POST["linkVideo"])){
        $id = $_POST["Video"];
        $sql = "UPDATE vedios SET link=:link,title=:titre WHERE id=:id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':link', $_POST["linkVideo"]);
        $stmt->bindParam(':titre', $_POST["titreVideo"]);
        $stmt->bindParam(':id', $id);
        $verify1 = $stmt->execute();
    }
    header("location: ../pages/video.php?video=1");
}catch (PDOException $e){
    header("location: ../pages/video.php?error=1");
}
?>