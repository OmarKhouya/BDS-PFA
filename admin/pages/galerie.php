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
              <h1 class="text-center">Gérer la section de la galerie</h1>
              <p class="text-muted text-center">Accès pour ajouter et supprimer des images de la galerie</p>
              <div class="">
                <form action="../config/galerie_action.php" method="post" enctype="multipart/form-data">
                  <label class="form-label">Ajouter une image à la galerie</label>
                  <input type="file" accept="image/*" name="GaleriePhoto" class="form-control my-3" onchange="displayImage(event)" id="imageInput" required>
                  <div id="imageContainer"></div>
                  <button type="submit" name="AjouterGaleriePhoto" class="btn w-100 mt-2" style="background-color: #96C4FF;">Ajouter</button>
                </form>
                <hr>
                <form action="../config/galerie_action.php" method="post" enctype="multipart/form-data">
                  <label class="form-label">Supprimer une image de la galerie</label>
                  <select name="SelectGalerie_id" id="" class="form-select ">
                    <?php
                      $sql = "select * from galerieabout";
                      $stmt = $db->prepare($sql);
                      $stmt->execute();
                      $galerieabout = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      foreach($galerieabout as $gal){
                        echo "<option value=".$gal['id'].">".$gal['id']."</option>";
                      }
                    ?> 
                  </select>
                  <button type="submit" name="DeleteGaleriePhoto" class="btn w-100 my-2" style="background-color: #96C4FF;">Supprimer</button>
                </form>
                <p class="mt-3">Afficher la galerie</p>
                <button class="navbar-toggler w-100" data-bs-target="#ShowGalerieIMG" type="button" data-bs-toggle="collapse"><span class="btn w-100" style="background-color: #96C4FF;">Affichier</span></button>
                <div class="collapse mt-3" id="ShowGalerieIMG">
                  <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php
                      foreach($galerieabout as $img){
                    ?>
                      <div class="col">
                        <div class="card">
                          <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $img['img'] ).'" class="card-img-top rounded" alt=""/>';?>
                        </div>
                      </div>
                      <?php
                        }
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
