<?php 
    
    include("../helpers/conditions.php");
    $check = checkSession();    
    if($check)
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include("../templates/head.php") ?>
        <title>Espace de management Blog</title>
    </head>
    <body>
        <?php include("../templates/header.php") ?>
        <main class="">
            <section class="container">
              <h1 class="text-center">Gérer la section des blogs</h1>
              <p class="text-muted text-center">Accès pour examiner les participations des stagiaires et les accepter, supprimer ou refuser. Gérer les commentaires en les affichant ou les supprimant</p>
              <div class="row">
                <div class="my-2 col-lg-6">
                <div class="card ">
                  <div class="card-header text-center p-4">
                    <button type="button" class="navbar-toggler" data-bs-target="#div8" data-bs-toggle="collapse">Participations au blog</button>
                  </div>
                  <div class="collapse show card-body" id="div8">
                    <form action="" method="post">
                      <label>Prévisualiser la participation</label>
                      <select class="form-select" name="numeroParticip">
                        <!-- <option value=''>Select</option> -->
                        <?php
                          $sql = "select * from participation";
                          $stmt = $db->prepare($sql);
                          $stmt->execute();
                          $participation = $stmt->fetchAll(PDO::FETCH_ASSOC);
                          foreach($participation as $par){
                            echo "<option value=".$par['numero'].">".$par['numero']."</option>";
                          }
                        ?>  
                      </select>
                      <button type="submit" class="btn  w-100 my-2" style="background-color: #96C4FF;" name="showParticipationBlog" style="background-color: #96C4FF;">Prévisualiser</button>     
                    </form>
                    <?php
                      if(isset($_POST["showParticipationBlog"])){
                        foreach($participation as $par){
                          if($par['numero'] == $_POST["numeroParticip"]){
                    ?>
                      <div class="p-2 rounded-3" style="background-color:rgb(121, 224, 238,0.2);">
                        <div class="d-flex m-1">
                          <span class="me-1">
                            <i class="fa-regular fa-circle-user fa-2x"></i>
                          </span>
                          <div class="card bg-light d-flex flex-column p-3 w-100 border">
                            <p style="font-weight:bolder;text-transform:capitalize;"><?php echo $par['auteur_nom'];echo "/".$par['CEF']?></p>
                            <p style="font-weight:700;"><?php echo $par['objet'] ?></p>
                            <p style="font-weight:300;"><?php echo $par['auteur_fonction'] ?></p>
                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $par['img'] ).'" class="navbar-brand rounded-4" style="" alt=""/>' ?>
                            <textarea class="form-control text-muted mt-2" rows="4" ><?php echo $par["contenu"]?></textarea>
                          </div>
                        </div>
                      </div>
                    <?php }}} ?>
                    <hr>
                    <form action="../config/blog_action.php" method="post">
                      <label for="">Supprimer, afficher, masquer les participations</label>
                      <select class="form-select" name="numeroParticip">
                        <!-- <option value=''>Select</option> -->
                        <?php
                        foreach($participation as $par){
                          echo "<option value=".$par['numero'].">".$par['numero']."</option>";
                        }
                        ?>  
                      </select>
                      <div class="row p-2 mt-3">
                        <button type="submit" class="btn col mx-2" name="participationBlogRefuse" style="background-color: #96C4FF;">Masquer</button>
                        <button type="submit" class="btn col mx-2" name="participationBlogAccepte" style="background-color: #96C4FF;">Afficher</button>
                        <button type="submit" class="btn col mx-2" name="participationBlogDelete" style="background-color: #96C4FF;">Supprimer</button>
                      </div>                    
                    </form>
                    <hr>
                    <p>Afficher les informations des participations</p>
                    <button class="navbar-toggler w-100 rounded-2" data-bs-target="#ShowParticipations" style="background-color: #96C4FF;" type="button" data-bs-toggle="collapse"><span class="btn w-100">Afficher</span></button>
                    <div class="collapse mt-3" id="ShowParticipations">
                      <div class="">
                        <?php
                        echo "<div class='table-responsive' style='margin:auto!important;'>
                                <table class='w-100 table table-bordered' >
                                  <tr>
                                    <th>CEF</th><th>Numero</th><th>Visible</th><th>Auteur nom</th>
                                  </tr>";
                                  foreach($participation as $par){
                                    if($par["showBlog"]==1){
                                      $showVar = "Oui";
                                    }else{
                                      $showVar = "Non";
                                    }
                                  echo"
                                  <tr>
                                    <td>".$par['CEF']."</td>
                                    <td>".$par['numero']."</td>
                                    <td>".$showVar."</td>
                                    <td>".$par['auteur_nom']."</td>
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
                </div>
                <div class="my-2 col-lg-6">
                  <div class="card ">
                    <div class="card-header text-center p-4">
                      <button type="button" class="navbar-toggler" data-bs-target="#div9" data-bs-toggle="collapse">Commentaires du Blog</button>
                    </div>
                    <div class="collapse show card-body" id="div9">
                      <form action="" method="post">
                        <label>Prévisualiser le commentaire</label>
                        <select class="form-select my-2" name="CEFComment" id="mySelect">
                          <!-- <option value=''>Select</option>   -->
                          <?php
                            $sql = "select * from commentaires";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
                          ?>
                          <?php
                            foreach($commentaires as $comn){
                              echo "<option value=".$comn['CEF'].">".$comn['CEF']."</option>";
                            }
                          ?>  
                        </select>
                        <button type="submit" name="showcommentaire" class="btn w-100 my-2" style="background-color: #96C4FF;">Prévisualiser</button>  
                      </form>
                      
                      <?php
                        if(isset($_POST["showcommentaire"])){
                          foreach($commentaires as $com){
                            if($com['CEF'] == $_POST["CEFComment"]){ ?>
                              <div class="p-2 rounded-3" style="background-color:rgb(121, 224, 238,0.2);">
                                <div class="d-flex m-1">
                                  <span class="me-1">
                                    <i class="fa-regular fa-circle-user fa-2x"></i>
                                  </span>
                                  <div class="card bg-light d-flex flex-column p-3 w-100 border">
                                    <p style="font-weight:bolder;text-transform:capitalize;"><?php echo $com['nom']?>\<?php echo $com['CEF']?></p>
                                    <p style="font-weight:300;"><?php echo $com['email']?></p>
                                    <p class=" text-muted mt-2"><?php echo $com["commentaire"]?></p>
                                  </div>
                                </div>
                              </div>
                      <?php }}} ?>
                      <hr> 
                      <form action="../config/blog_action.php" method="post">
                        <label for="">Supprimer, afficher, masquer les commentaires</label>
                        <select class="form-select" name="CEFComment">
                          <!-- <option value=''>Select</option>   -->
                          <?php
                            foreach($commentaires as $comn){
                              echo "<option value=".$comn['CEF'].">".$comn['CEF']."</option>";
                            }
                          ?>  
                        </select>
                        <div class="row p-2 mt-3">
                          <button type="submit" class="btn col mx-2" name="commentaireRefuse" style="background-color: #96C4FF;">Masquer</button>
                          <button type="submit" class="btn col mx-2" name="commentaireAccepte" style="background-color: #96C4FF;">Afficher</button>
                          <button type="submit" class="btn col mx-2" name="commentaireDelete" style="background-color: #96C4FF;">Supprimer</button>
                        </div>    
                      </form>
                      <hr>
                      <p>Afficher les informations des commentaires</p>
                      <button class="navbar-toggler w-100" data-bs-target="#ShowCommentsinfos" type="button" data-bs-toggle="collapse" ><span class="btn w-100" style="background-color: #96C4FF;">Afficher</span></button>
                        <div class="collapse mt-3" id="ShowCommentsinfos">
                          <div class="">
                            <?php
                            echo "<div class='table-responsive' style='margin:auto!important;'>
                                    <table class='w-100 table table-bordered' >
                                      <tr>
                                        <th>CEF</th><th>Visible</th><th>Commentaire</th>
                                      </tr>";
                                      foreach($commentaires as $comnt){
                                        if($comnt["visible"]==1){
                                          $showVar = "Oui";
                                        }else{
                                          $showVar = "Non";
                                        }
                                      echo"
                                      <tr>
                                        <td>".$comnt['CEF']."</td>
                                        <td>".$showVar."</td>
                                        <td>".$comnt['commentaire']."</td>
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
