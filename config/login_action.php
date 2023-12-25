<?php 
session_start();
require("../includes/dbc.php");

$CEF = $_POST["CEF"];
$password = $_POST["password"];
$admin_Check = $_POST["Admine"];

if(!isset($admin_Check))$Settings = $db->prepare("select * from stagiaire where CEF=:CEF");
else $Settings = $db->prepare("select * from administrateur where CEF=:CEF");

$Settings->setFetchMode(PDO::FETCH_ASSOC);
$Settings->execute([":CEF"=>$CEF]);
$tableVer = $Settings->fetchAll();

if(!empty($tableVer[0])){
    if($_POST["password"] == $tableVer[0]["password"]){

        $_SESSION["Full_name"]=$tableVer[0]["prenom"]." ".$tableVer[0]["nom"];
        $_SESSION["email"]=$tableVer[0]["email_scolaire"];
        $_SESSION["ActivierPageVote"]="";
        $_SESSION["telephone"]=$tableVer[0]["telephone"];
        
        if(isset($_POST["Admine"])){

            $_SESSION["code"]=$tableVer[0]["CEF"];
            $_SESSION["Admine"]=true;
            header("location:../admin/pages/index.php");exit;

        }else{
            $_SESSION["CEF"]=$tableVer[0]["CEF"];
            $_SESSION["User"]=true;
            header("location:../pages/home.php");exit;
        }
    }
    else{
        header("location:../pages/login.php?error=2");exit;
    }
}
else{
    header('Location: ../pages/login.php?error=1');
}

?>