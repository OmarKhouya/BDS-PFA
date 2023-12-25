<?php 
session_start();
if(isset($_SESSION["User"])){
    unset($_SESSION["User"]);
    session_destroy();
}else if(isset($_SESSION["Admine"])){
    unset($_SESSION["Admine"]);
    session_destroy();
}
header("location:../pages/index.php");
?>