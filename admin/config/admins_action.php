<?php 
session_start();
require("../../includes/dbc.php");  


try {

    if(isset($_POST["ValiderAddAdmine"])){
        
        $uploadedFile = $_FILES['AdmineImage']['tmp_name'];
        $fileContents = file_get_contents($uploadedFile);

        $sql = "insert into administrateur (CEF, nom, prenom, fonction, email_scolaire, password,image) values (:code, :nom, :prenom, :fonction, :email_scolaire, :password,:image)";
        $stmt = $db->prepare($sql);
        $verify2 = $stmt->execute([
            ":code"=>$_POST["CEF"],
            ":nom"=>$_POST["nom"],
            ":prenom"=>$_POST["prenom"],
            ":fonction"=>$_POST["Fonction"],
            ":email_scolaire"=>$_POST["Email_scolaire"],
            ":password"=>$_POST["Password"],
            ":image" => $fileContents
        ]);
        if($verify2){
            header("location: ../pages/admins.php?admin=1");
        }else{
            header("location: ../pages/admins.php?error=1");
        }

    }

    if(isset($_POST["ValiderRemoveAdmine"])){
        $sql = "delete from administrateur where CEF=:Code" ;
        $stmt = $db->prepare($sql);
        $ver2 = $stmt->execute([":Code"=>$_POST["CEFRemove"]]);
        if($ver2){
            header("location: ../pages/admins.php?admin=2");
        }else{
            header("location: ../pages/admins.php?error=2");
        }
    }

    // header("location: ../pages/admins.php;
}catch (PDOException $e){
    header("location: ../pages/admins.php?error=3");
}
?>