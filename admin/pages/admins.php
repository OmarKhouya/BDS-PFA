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
                <h1 class="text-center">Gérer la section des administrateurs.</h1>
                <p class="text-muted text-center">Accès pour ajouter, supprimer et afficher les informations des administrateurs.</p>
                <div class="" >
                    <p class="text-muted my-2">Ajouter un Administrateur</p>
                    <form action="../config/admins_action.php" method="post" enctype="multipart/form-data">
                        <label for="">CEF</label>
                        <input type="number" class="form-control" name="CEF" required>
                        <label for="">Nom</label>
                        <input type="text" class="form-control" name="nom" required>
                        <label for="">Prenom</label>
                        <input type="text" class="form-control" name="prenom" required>
                        <label for="">Fonction</label>
                        <input type="text" class="form-control" name="Fonction" required> 
                        <label for="">Email Scolaire</label>
                        <input type="email" class="form-control" name="Email_scolaire" required>
                        <label for="">Mot de passe</label>
                        <input type="text" class="form-control" name="Password" required>
                        <label for="">Image</label>
                        <input type="file" accept="image/*" name="AdmineImage" class="form-control my-2" onchange="displayImage(event)" id="imageInput" required>
                        <div id="imageContainer" class="my-3  "></div>
                        <button type="submit" name="ValiderAddAdmine" class="btn w-100 my-3" style="background-color: #96C4FF;">Ajouter</button>
                        <?php if(isset($_GET["error"])and $_GET["error"]==1){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["admin"])and $_GET["admin"]==1){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                    </form>
                    <p class="text-muted my-2">Supprimer un Administrateur</p>
                    <form action="../config/admins_action.php" method="post">
                        <div class="my-2">
                          <?php
                            $sql = "select * from administrateur";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $admines = $stmt->fetchAll(PDO::FETCH_ASSOC);
                          ?>
                          <label for="">CEF</label>
                          <select name="CEFRemove" id="" class="form-control">
                          <?php
                            foreach($admines as $admine){
                                echo "<option>".$admine["CEF"]."</option>";
                              }
                          ?>
                          </select>
                        </div>
                        <button type="submit" name="ValiderRemoveAdmine" class="btn w-100" style="background-color: #96C4FF;">Supprimer</button>
                        <?php if(isset($_GET["error"])and $_GET["error"]==2){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["admin"])and $_GET["admin"]==2){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                      </form>
                      <p class="text-muted my-2">Afficher les informations des administrateurs</p>
                      <button class="navbar-toggler w-100 rounded-2" data-bs-target="#ShowAdmines" type="button" data-bs-toggle="collapse" style="background-color: #96C4FF;"><span class="btn w-100">Afficher</span></button>
                    <div class="collapse mt-3" id="ShowAdmines">
                        <div class="" > 
                        <?php
                        echo "
                                <div class='table-responsive' style='margin:auto!important;'>
                                  <table class='w-100 table table-bordered ' >
                                    <tr>
                                      <th>CEF</th><th>Nom</th><th>Prenom</th><th>Fonction</th>
                                    </tr>";
                          foreach($admines as $admine){
                            
                                    echo "<tr>
                                            <td>".$admine['CEF']."</td>
                                            <td>".$admine['nom']."</td>
                                            <td>".$admine['prenom']."</td>
                                            <td>".$admine['fonction']."</td>
                                          </tr>";
                          }
                          echo "</table></div>";
                        ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <script>

          function displayImage(event) {
              document.getElementById('imageContainer').innerHTML=''
          var input = event.target;
          var reader = new FileReader();
          reader.onload = function () {
              var dataURL = reader.result;
              var image = document.createElement('img');
              image.src = dataURL;
              image.style.maxWidth = '100%';
              document.getElementById('imageContainer').appendChild(image);
          };
          reader.readAsDataURL(input.files[0]);
          }

        </script>
        <?php require("../templates/footer.php") ?>
    </body>
</html>
