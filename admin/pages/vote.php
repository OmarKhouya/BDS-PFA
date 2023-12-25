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
                <h1 class="text-center">Gérer la section des votes</h1>
                <p class="text-muted text-center">Accès pour activer la page de vote et gestion des candidats et des électeurs</p>
                <div class="">
                    <form action="../config/vote_action.php" class="mt-2" method="post">
                      <?php
                        $set = $db->prepare("select * from activationPageVote ");
                        $set->execute();
                        $activationPageVote = $set->fetchAll(PDO::FETCH_ASSOC);
                        if($activationPageVote[0]["active"]==1){
                      ?>
                        <button type="submit" name="DesactivierlapageVote" class="btn w-100" style="background-color: #96C4FF;">Desactivier la page Vote</button>
                      <?php
                        }else if($activationPageVote[0]["active"]==0){
                      ?>
                        <button type="submit" name="ActivierlapageVote" class="btn w-100" style="background-color: #96C4FF;">Activier la page Vote</button>
                      <?php
                        }
                      ?>
                      
                    </form>
                    <p class="text-center mt-3">Ajouter un candidat</p>
                    
                    <form action="../config/vote_action.php" method="post">
                      <label class="form-label">Choisissez la CEF du candidat</label>
                      <select name="SelectCEFCandidat" id="" class="form-select">
                        <!-- <option>Select</option> -->
                        <?php
                          $set = $db->prepare("select * from stagiaire");
                          $set->execute();
                          $stagaires = $set->fetchAll();
                          foreach($stagaires as $stg){
                            echo "<option value=".$stg['CEF'].">".$stg['CEF']."</option>";
                          }
                        ?> 
                        </select>
                        <label for="" class="form-label mt-2">Saisir le numéro de vote du candidat (id)</label>
                        <input type="number" name="vote_numero" class="form-control my-2" required>
                        <button type="submit" name="ajouterCandidat" class="btn " style="background-color: #96C4FF;">Ajouter</button>
                        <?php if(isset($_GET["error"])and $_GET["error"]==1){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["candidat"])and $_GET["candidat"]==1){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                      </form>

                      <p class="text-center mt-3">Supprimer un candidat</p>
                      <form action="../config/vote_action.php" method="post">
                        <label class="form-label">Sélectionner le candidat à supprimer.</label>
                        <select name="SelectCEFCandidatRemove" id="" class="form-select ">
                          <!-- <option value="">Select</option> -->
                          <?php
                            $sql = "select * from candidat";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $Candidat = $stmt->fetchAll(PDO::FETCH_ASSOC);
                          ?>
                          <?php
                            foreach($Candidat as $stg){
                              echo "<option value=".$stg['CEF'].">".$stg['CEF']."</option>";
                            }
                          ?> 
                        </select>
                        <button type="submit" name="removeCandidat" class="btn my-2" style="background-color: #96C4FF;">Supprimer</button>
                        <?php if(isset($_GET["error"])and $_GET["error"]==2){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["candidat"])and $_GET["candidat"]==2){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                      </form>
                      <p class="text-center mt-3">Afficher les informations du candidat.</p>
                      <button class="navbar-toggler w-100" data-bs-target="#ShowCandidat" type="button" data-bs-toggle="collapse" ><span class="btn w-100" style="background-color: #96C4FF;">Affichier</span></button>
                      <div class="collapse mt-3" id="ShowCandidat">
                        <div class="">
                          <?php
                            $sql = "select * from candidat";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $candidatInfos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            echo "<div class='table-responsive' style='margin:auto!important;'>
                                    <table class='w-100 table table-bordered' >
                                      <tr>
                                        <th>CEF</th><th>id Vote</th><th>Numero Votes</th>
                                      </tr>";
                                      foreach($candidatInfos as $cand){
                                      echo"
                                      <tr>
                                        <td>".$cand['CEF']."</td>
                                        <td>".$cand['num_vote']."</td>
                                        <td>".$cand['num_votes']."</td>
                                      </tr>
                                    ";
                                  }
                                  echo "
                                  </table>
                                </div>";
                          ?>
                        </div> 
                      </div>
                      <p class="text-center mt-3">Afficher les personnes les mieux classées dans le vote</p>
                      <button class="navbar-toggler w-100" data-bs-target="#ShowRank" type="button" data-bs-toggle="collapse" ><span class="btn w-100" style="background-color: #96C4FF;">Affichier</span></button>
                      <div class="collapse  mt-3" id="ShowRank">
                        <div class="">
                          <?php
                            $sql = "select * from candidat order by num_votes DESC";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $verify5 = $stmt->fetchAll(PDO::FETCH_ASSOC);
                          ?>
                          <div style='margin:auto!important;'>
                            <table class='w-100 table table-bordered' >
                              <tr><th>CEF</th><th>Nom et prenom</th><th>Numero de votes</th></tr>
                              <?php 
                              foreach($verify5 as $cand){ 
                                foreach($stagaires as $stg){if($stg["CEF"]===$cand["CEF"]){
                                  echo "<tr><th>".$cand['CEF']."</th><td>".$stg['nom']." ". $stg["prenom"]."</td><td>".$cand['num_votes']."</td></tr>"; 
                                }}
                              } ?>
                            </table>
                          </div>
                        </div> 
                      </div>
                      <hr class="my-5"><p class="text-center mt-3">Supprimer un electeur</p>
                      <form action="../config/vote_action.php" method="post">
                        <label class="form-label">Sélectionner la CEF de l'électeur.</label>
                        <select name="SelectCEFElecteur" id="" class="form-select">
                          <!-- <option value="">Select</option> -->
                          <?php
                            $sql = "select * from electeur";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                            $electeur = $stmt->fetchAll(PDO::FETCH_ASSOC);
                          ?>
                          <?php
                            foreach($electeur as $elc){
                              echo "<option value=".$elc['CEF'].">".$elc['CEF']."</option>";
                            }
                          ?> 
                        </select>
                        <button type="submit" name="removeElecteur" class="btn  mt-3" style="background-color: #96C4FF;">Supprimer l'électeur.</button>
                        <?php if(isset($_GET["error"])and $_GET["error"]==3){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["electeur"])and $_GET["electeur"]==1){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                      </form>
                      <p class="text-muted mt-3">Afficher les informations des électeurs.</p>
                      <button class="navbar-toggler w-100" data-bs-target="#ShowElecteur" type="button" data-bs-toggle="collapse"><span class="btn w-100" style="background-color: #96C4FF;">Affichier</span></button>
                      <div class="collapse  mt-3" id="ShowElecteur">
                        <div class="">
                          <?php
                            $vote = $db->prepare("select * from vote");
                            $vote->execute();
                            $voteInfos = $vote->fetchAll(PDO :: FETCH_ASSOC);
                            echo "<div class='table-responsive' style='margin:auto!important;'>
                                    <table class='w-100 table table-bordered' >
                                      <tr>
                                        <th>CEF</th><th>Numero Vote</th><th>Motivation</th>
                                      </tr>";
                                      foreach($electeur as $elc){
                                        foreach($voteInfos as $vote){
                                      echo"
                                      <tr>
                                        <td>".$elc['CEF']."</td>
                                        <td>".$elc['num_vote']."</td>
                                        <td>".$vote['sujet']."</td>
                                      </tr>
                                    ";
                                  }}
                                  echo "
                                  </table>
                                </div>";
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
