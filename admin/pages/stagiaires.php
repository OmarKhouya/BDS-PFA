<?php 
    include("../helpers/conditions.php");
    $check = checkSession();    
    if($check)
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include("../templates/head.php") ?>
        <title>Espace de management Actualites</title>
    </head>
    <body>
        <?php include("../templates/header.php") ?>
        <main class="">
            <section class="container">
                <h1 class="text-center">Gérer la section des stagaires.</h1>
                <p class="text-muted text-center">Accès pour supprimer et afficher les informations des stagaires.</p>
                <div class="">
                  <div class="p-2 rounded-4 my-2">
                    <form action="../config/stagiaires_action.php" method="post">
                        <p class="text-center mt-3">Supprimer un Stagiaire</p>
                        <div class="mb-2">
                          <label for="">CEF</label>
                          <?php
                            $sql = "select * from stagiaire";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $stagaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
                          ?>
                          <select name="CEF" id="" class="form-control">
                          <?php
                            foreach($stagaires as $stagaire){
                                echo "<option>".$stagaire["CEF"]."</option>";
                              }
                          ?>
                          </select>
                        </div>
                        <button type="submit" name="ValiderRemoveStagiaire" class="btn  w-100" style="background-color: #96C4FF;">Supprimer</button>
                        <?php if(isset($_GET["error"])){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["stg"])and $_GET["stg"]==1){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                      </form>
                      <p class="text-center mt-3">Afficher les informations des stagiaires</p>
                      <button class="navbar-toggler w-100" data-bs-target="#ShowStagiaires" type="button" data-bs-toggle="collapse"><span class="btn w-100" style="background-color: #96C4FF;">Afficher</span></button>
                      <div class="collapse mt-3" id="ShowStagiaires">
                        <div class="">
                        <?php
                          echo "<div class='table-responsive' style='margin:auto!important;'>
                                  <table class='w-100 table table-bordered' >
                                    <tr>
                                      <th>CEF</th><th>Nom</th><th>Prenom</th><th>Filiere</th><th>Telephone</th>
                                    </tr>";
                                  foreach($stagaires as $stagaire){
                                    echo"
                                    <tr>
                                      <td>".$stagaire['CEF']."</td>
                                      <td>".$stagaire['nom']."</td>
                                      <td>".$stagaire['prenom']."</td>
                                      <td>".$stagaire['filiere']."</td>
                                      <td>".$stagaire['telephone']."</td>
                                    </tr>
                                  ";
                                }
                                echo "
                                </table>
                              </div>";
                        ?>
                        </div>
                      </div>
                  </div>
                </div>
            </section>
        </main>
        <?php require("../templates/footer.php") ?>
    </body>
</html>
