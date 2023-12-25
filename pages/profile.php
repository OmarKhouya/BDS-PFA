<?php 
  session_start();
  require("../includes/redirect.php");
  require("../includes/dbc.php");
  if (isset($_SESSION["Admine"])){
    header("location: ../admin/pages/index.php");
  }else if(!isset($_SESSION["User"])) { 
    header("location: index.php");
  }if(isset($_SESSION["User"])){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../templates/layout/head.php'; ?>
    <title><?php echo $_SESSION["Full_name"] ?></title>
  </head> 
  <body class="">
    <?php include '../templates/layout/header.php'; ?>
    <?php 
        $set = $db->prepare("SELECT * FROM stagiaire WHERE CEF=:CEF");
        $set->execute([":CEF"=>$_SESSION["CEF"]]);
        $stagiaire = $set->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <main class="mt-5 container" id="">
        <div class="">
            <div class="profile my-3">
                <div class="my-3 row justify-content-center">   <!-- image-profile -->
                    <div class=" col-lg-4 col-md-6">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $stagiaire[0]['image'] ).'" class="card-img rounded" alt=""/>';?>
                    </div>
                </div>
                <div class="infos-user">
                    <div class=" bg-light rounded p-3 table-responsive">
                        
                        <form action="../config/profileUpdate_action.php" method="post" id="form_update"  enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td>CEF</td><td colspan="2"><?php echo $stagiaire[0]["CEF"] ?></td>
                            </tr>
                            <tr>
                                <td>Nom</td><td><?php echo $stagiaire[0]["nom"] ?></td><td><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nom" type="button"><i class="fa fa-solid fa-pen-to-square"></i></button></td>
                            </tr>
                            <tr class="collapse navbar-collapse" id="nom">
                                <td></td>
                               <td colspan="2">
                                    <input type="text" class="form-control" name="Nom" >
                               </td> 
                            </tr>
                            <tr>
                                <td>Prenom</td><td><?php echo $stagiaire[0]["prenom"] ?></td><td><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#prenom" type="button"><i class="fa fa-solid fa-pen-to-square"></i></button></td>
                            </tr>
                            <tr class="collapse navbar-collapse" id="prenom">
                                <td></td>
                               <td colspan="2">
                                    <input type="text" class="form-control" name="prenom" >
                               </td> 
                            </tr>
                            <tr>
                                <td>Email</td><td><?php echo $stagiaire[0]["email_scolaire"] ?></td><td><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#email" type="button"><i class="fa fa-solid fa-pen-to-square"></i></button></td>
                            </tr>
                            <tr class="collapse navbar-collapse" id="email">
                                <td></td>
                               <td colspan="2">
                                    <input type="text" class="form-control " name="email_scolaire" >
                                    <p id='errorEmail'></p>
                               </td> 
                            </tr>
                            <tr>
                                <td>Filiere</td><td><?php echo $stagiaire[0]["filiere"] ?></td><td><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#filiere" type="button"><i class="fa fa-solid fa-pen-to-square"></i></button></td>
                            </tr>
                            <tr class="collapse navbar-collapse" id="filiere">
                                <td></td>
                               <td colspan="2">
                                    <select class="form-control" name="filiere" >
                                        <option value="">Select</option>
                                        <option value="Developpement Digital">DD</option>
                                        <option value="infrastructure Digital">ID</option>
                                    </select>
                               </td> 
                            </tr>
                            <tr>
                                <td>Option</td><td><?php echo $stagiaire[0]["optionstg"] ?></td><td><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#option" type="button"><i class="fa fa-solid fa-pen-to-square"></i></button></td>
                            </tr>
                            <tr class="collapse navbar-collapse" id="option">
                                <td></td>
                               <td colspan="2">
                                    <input type="text" class="form-control" name="option" >
                               </td> 
                            </tr>
                            <tr>
                                <td>Telephone</td><td><?php echo $stagiaire[0]["telephone"] ?></td><td><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#phone" type="button"><i class="fa fa-solid fa-pen-to-square"></i></button></td>
                            </tr>
                            <tr class="collapse navbar-collapse" id="phone">
                                <td></td>
                               <td colspan="2">
                                    <input type="tel" class="form-control" name="Telephone" >
                                    <p id='telephoneError'></p>
                               </td> 
                            </tr>
                            <tr>
                                <td>Changer l'image</td>
                                <td colspan="2">
                                    <input type="file" class="form-control img" accept="image/*" name="image" id="imageInput">
                                    <div id="imageContainer" class="mt-2"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <div class="input-group">
                                        <input type="password" class="form-control input-password border-end-0" id="password_input_showData" value="<?php echo $stagiaire[0]["password"]?>" readonly>
                                        <button class="btn border border-start-0 " type="button" id="password-show-btn-data">
                                            <i class="fa fa-regular fa-eye"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#pass" type="button"><i class="fa-solid fa-pen-to-square"></i></button>
                                </td>
                            </tr>
                            <tr class="collapse navbar-collapse" id="pass">
                            <td></td>
                               <td colspan="2">
                                    <div class="input-group">
                                        <input type="password" class="form-control input-password border-end-0" id="password" name="password">
                                        <button class="btn border border-start-0 password-show-btn" type="button">
                                            <i class="fa fa-regular fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex justify-content-between my-2">
                                        <span class="border  w-100 rounded-5" style="height:9px;" id="rule1"></span>
                                        <span class="border  w-100 rounded-5" style="height:9px;" id="rule2"></span>
                                        <span class="border  w-100 rounded-5" style="height:9px;" id="rule3"></span>
                                    </div>
                                <label for="name" class="form-label">Verification mot de pass </label>
                                <input type="password" class="form-control password_verify" name="password_verify" >
                                <span class="" id="No_match"></span>
                               </td> 
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="reset" class="btn btn-outline-dark m-2 float-end"><i class="fa fa-solid fa-arrow-rotate-left"></i></button>
                                    <button type="submit" class="btn btn-outline-dark m-2 float-end" name="update_informations"><i class="fa fa-regular fa-floppy-disk"></i></button>
                                </td>
                            </tr>
                        </table></form>
                    </div>
                </div>
            </div>
            <?php
                $sql = "select * from participation where CEF=:CEF";
                $stmt = $db->prepare($sql);
                $stmt->execute([":CEF"=>$_SESSION["CEF"]]);
                $participation = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $sql = "select * from commentaires where CEF=:CEF";
                $stmt = $db->prepare($sql);
                $stmt->execute([":CEF"=>$_SESSION["CEF"]]);
                $commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $sql = "select * from aidequestions where CEF=:CEF";
                $stmt = $db->prepare($sql);
                $stmt->execute([":CEF"=>$_SESSION["CEF"]]);
                $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class=" bg-light rounded p-3 my-3">
                <?php if(!count($participation)>0){ ?>
                    <h1 class="text-center py-3">Veuillez Participier pour voir cette section</h1>
                <?php }else{?>
                <h1 class="text-center py-3">Votre participations</h1>
                
                <div class="row mx-2 rounded-3">
                    <?php
                        foreach($participation as $par){
                    ?>
                        <div class="p-2  col-lg-4 col-md-6" >
                            <div class="d-flex m-1">
                                <span class="me-1">
                                    <i class="fa-regular fa-circle-user fa-2x"></i>
                                </span>
                                <div class="card bg-light d-flex flex-column p-3 w-100 border">
                                    <p style="font-weight:bolder;text-transform:capitalize;"><?php echo $par['auteur_nom'];echo " / ".$par['CEF']." / visible : ";echo $par["showBlog"]==1 ? "Oui" : "Non" ?></p>
                                    <p style="font-weight:700;"><?php echo $par['objet'] ?></p>
                                    <p style="font-weight:300;"><?php echo $par['auteur_fonction'] ?></p>
                                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $par['img'] ).'" class="navbar-brand rounded-4" style="" alt=""/>' ?>
                                    <textarea class="form-control text-muted mt-2" rows="4" ><?php echo $par["contenu"]?></textarea>
                                    <form action="../config/profileDelete_action.php" method="post" class="row justify-content-end">
                                        <input type="text" class="d-none" name="numero_participation" value="<?php echo $par["numero"] ?>">
                                        <button class="btn btn-outline-dark mt-2 me-2" style="max-width:min-content!important;" name="blog-delete"><i class="fa fa-solid fa-trash-can"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                
                <?php } ?>
            </div>
            <div class=" bg-light rounded p-3 my-3">
                <?php if(!count($commentaires)>0){ ?>
                    <h1 class="text-center py-3">Veuillez Commenter pour voir cette section</h1>
                <?php }else{?>
                <h1 class="text-center py-3">Votre Commentaires</h1>
                <form action="../config/profileDelete_action.php" method="post">
                    <div class="row mx-2 rounded-3" >
                        <?php
                            foreach($commentaires as $com){
                        ?>
                        <div class="p-2 rounded-3">
                                <div class="d-flex m-1">
                                    <span class="me-1">
                                        <i class="fa-regular fa-circle-user fa-2x"></i>
                                    </span>
                                    <div class="card bg-light d-flex flex-column p-3 w-100 border">
                                        <p style="font-weight:bolder;text-transform:capitalize;"><?php echo $com['nom']." \ visible : "; echo $com["visible"]==1 ? "Oui" : "Non"  ?></p>
                                        <p style="font-weight:300;"><?php echo $com['email']?></p>
                                        <p class=" text-muted mt-2"><?php echo $com["commentaire"]?></p>
                                        <button class="btn btn-outline-dark align-self-end" style="max-width:min-content!important;" type="submit" name="delete_comment"><i class="fa fa-solid fa-trash-can"></i></button>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                </form>
            </div>
            <div class=" bg-light rounded p-3 my-3">
                <?php if(!count($questions)>0){ ?>
                    <h1 class="text-center py-3">Veuillez Poser une question pour voir cette section</h1>
                <?php }else{?>
                <h1 class="text-center py-3">Votre Questions</h1>
                <div class="row mx-2 rounded-3">
                    <?php
                        foreach($questions as $que){
                    ?>
                    <div class="col-lg-6 col-md-6 ">
                        <div class="p-3 rounded-3">
                          <div class="d-flex m-3">
                            <span class="me-1">
                              <i class="fa-regular fa-circle-user fa-2x"></i>
                            </span>
                            <div class="card bg-light d-flex flex-column p-3 w-100 border">
                              <p style="font-weight:bolder;"><?php echo $que['nom']." \ visible : "; echo $que["visible"]==1 ? "Oui" : "Non"  ?></p>
                              <p class=""><?php echo $que['email'] ?></p>
                              <span class="text-muted">
                                <?php echo $que["question"] ?>
                              </span>
                              <form action="../config/profileDelete_action.php" method="post" class="row justify-content-end">
                                  <input type="text" class="d-none" name="id_participation" value="<?php echo $que["id"] ?>">
                                  <button class="btn btn-outline-dark mt-2 me-2" style="max-width:min-content!important;" name="question-delete"><i class="fa fa-solid fa-trash-can"></i></button>
                              </form>
                            </div>
                          </div>
                          <div class="d-flex m-3">
                            <span class="me-1">
                              <i class="fa fa-solid fa-circle-user fa-2x"></i>
                            </span>
                            <div class="card bg-light d-flex flex-column p-3 w-100 border">
                              <p style="font-weight:bolder;">Réponse de l'administrateur</p>
                              <span class="text-muted">
                                <?php echo $que["answer"] ?>
                              </span>
                            </div>
                          </div>
                          
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </main>
    <?php include '../templates/layout/notification.php'; ?>
    <?php include '../templates/layout/footer.php'; ?>
  </body>
</html>
<?php } ?>