<?php
    session_start();
    require("../../includes/redirect.php");
    require("../../includes/dbc.php");
  function checkSession() {
    
    if (isset($_SESSION["Admine"])) {
        return true ;
    }else if (isset($_SESSION["User"])){
      header("location: ../../pages/home.php");
    }else{ 
      header("location: ../../pages/index.php");
    }
  }

?>