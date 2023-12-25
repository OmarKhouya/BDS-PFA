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
                <h1 class="text-center">Gérer la section des actualités.</h1>
                <p class="text-muted text-center">Vous pouvez ajouter ou supprimer des sections d'actualités</p>
                <div class="p-2 rounded-4 my-2">
                    <p class="text-center">Ajouter un section d'actualités</p>
                        <form action="../config/actualites_action.php" method="post" enctype="multipart/form-data">
                            <div class="border border-2  rounded-2 p-2 my-2">
                                <span>Saisir l'id</span>
                                <input type="text" name="actualite" class="form-control" required>
                            </div>
                            <div class="border border-2  rounded-2 p-2"> 
                                <span>ajouter l'image </span>
                                <input type="file" accept="image/*" name="imageActualite1" class="form-control" onchange="displayImage(event)" id="imageInput" required>
                                <div id="imageContainer" class="my-2"></div>
                            </div>
                            <div class="border border-2 rounded-2 p-2 mt-2"> 
                                <span>ajouter le titre </span>
                                <input type="text" name="titreActualite1" class="form-control" required>
                            </div>
                            <div class="border border-2  rounded-2 p-2 my-2"> 
                                <span>ajouter le description </span>
                                <textarea name="descriptActualite1" class="form-control " rows="5" required></textarea>
                            </div>
                            <button type="submit" name="addActualite" class="btn w-100" style="background-color: #96C4FF;">Ajouter</button>
                            <?php if(isset($_GET["error"])and $_GET["error"]==1){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["actualite"])and $_GET["actualite"]==1){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                        </form>
                    </div><hr>
                    <p class="text-center">supprimer section d'actualités sélectionnée.</p>
                    <div class="p-2 rounded-4 my-2">
                        <form action="../config/actualites_action.php" method="post" enctype="multipart/form-data">
                        <div class="my-2 d-flex justify-content-evenly border border-2 rounded-2 p-3 flex-wrap">
                                <?php 
                                    $sql = "select * from actualite";
                                    $stmt = $db->prepare($sql);
                                    $stmt->execute();
                                    $Actualites = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($Actualites as $Actualite){?>
                                    <div>
                                        <input type="radio" name="actualite" value="<?php echo $Actualite["id"] ?>">
                                        <label for="">Actualité <?php echo $Actualite["id"] ?></label>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <button type="submit" name="delActualite" class="btn w-100" style="background-color: #96C4FF;">supprimer</button>
                            <?php if(isset($_GET["error"])and($_GET["error"]==1 or $_GET["error"]==2)){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["actualite"])and $_GET["actualite"]==2){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                        </form>
                    <hr>
                      <p class="text-center">Afficher les informations des actualités</p>
                      <button class="navbar-toggler w-100" data-bs-target="#ShowNewsinfos" type="button" data-bs-toggle="collapse" ><span class="btn w-100" style="background-color: #96C4FF;">Afficher</span></button>
                        <div class="collapse mt-3" id="ShowNewsinfos">
                          <div class="">
                            <?php
                            echo "<div class='table-responsive' style='margin:auto!important;'>
                                        <table class='w-100 table table-bordered ' >
                                          <tr>
                                            <th>id</th><th>titre</th><th>Temps de création</th>
                                          </tr>";
                              foreach($Actualites as $Actualite){
                                
                                          echo "<tr>
                                            <td>".$Actualite['id']."</td>
                                            <td>".$Actualite['title'] ."</td>
                                            <td>".$Actualite['created_at']."</td>
                                          </tr>";
                              }
                              echo "</table> </div>";
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
