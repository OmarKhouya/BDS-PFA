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
              <h1 class="text-center">Gérer la section des questions</h1>
              <p class="text-muted text-center">Accès pour répondre aux questions et les masquer ou les afficher</p>
                <div class="">
                  <form action="" method="post">
                    <label for="">Prévisualiser la question</label>
                    <select class="form-select" name="idQuestion">
                      <!-- <option value=''>Select</option>   -->
                      <?php
                        $sql = "select * from aidequestions";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      ?>
                      <?php
                        foreach($questions as $ques){
                          echo "<option value=".$ques['id'].">".$ques['id']."</option>";
                        }
                      ?>  
                    </select>
                    <button type="submit" name="showquestion" class="btn w-100 my-3" style="background-color: #96C4FF;">Prévisualiser</button>  
                  </form>
                  
                  <?php
                    if(isset($_POST["showquestion"]) && isset($_POST["idQuestion"])){
                      foreach($questions as $que){
                        if($que['id'] == $_POST["idQuestion"]){
                        ?>
                        <div class="p-3 rounded-3" style="background-color:rgb(121, 224, 238,0.2);">
                          <div class="d-flex m-3">
                            <span class="me-1">
                              <i class="fa-regular fa-circle-user fa-2x"></i>
                            </span>
                            <div class="card bg-light d-flex flex-column p-3 w-100 border">
                              <p style="font-weight:bolder;"><?php echo $que['nom'] ?></p>
                              <p class=""><?php echo $que['email'] ?></p>
                              <span class="text-muted">
                                <?php echo $que["question"] ?>
                              </span>
                            </div>
                          </div>
                          <div class="d-flex m-3">
                            <span class="me-1">
                              <i class="fa-solid fa-circle-user fa-2x"></i>
                            </span>
                            <div class="card bg-light d-flex flex-column p-3 w-100 border">
                              <p style="font-weight:bolder;">Réponse de l'administrateur</p>
                              <span class="text-muted">
                                <?php echo $que["answer"] ?>
                              </span>
                            </div>
                          </div>
                        </div>
                  <?php }}} ?>
                  <hr> 
                  <form action="../config/questions_action.php" method="post">
                    <label for="">Afficher ou masquer les questions.</label>
                    <select class="form-select" name="idQuestionsVisible">
                      <!-- <option value=''>Select</option>   -->
                      <?php
                        foreach($questions as $qu){
                          echo "<option value=".$qu['id'].">".$qu['id']."</option>";
                        }
                      ?>  
                    </select>
                    <div class="row p-3 ">
                      <button type="submit" class="btn  col mx-2" name="QuestionRefuse" style="background-color: #96C4FF;">Masquer</button>
                      <button type="submit" class="btn  col mx-2" name="QuestionAccepte" style="background-color: #96C4FF;">Afficher</button>
                    </div>   
                    <hr> 
                    <label for="">Répondre à la question</label>
                      <textarea name="answer" id="" cols="30" rows="3" class="form-control"> </textarea>                      
                      <button type="submit" class="btn w-100 my-2" name="answerQuestion" style="background-color: #96C4FF;">Répondre</button>
                  </form>
                  <?php 
                    
                    
                  ?>
                  <hr>
                  <p>Afficher les informations des questions</p>
                  <button class="navbar-toggler w-100" data-bs-target="#ShowQuestionsinfos" type="button" data-bs-toggle="collapse" ><span class="btn w-100" style="background-color: #96C4FF;">Afficher</span></button>
                    <div class="collapse mt-3" id="ShowQuestionsinfos">
                      <div class="">
                        <?php
                        echo "<div class='table-responsive' style='margin:auto!important;'>
                                <table class='w-100 table table-bordered' >
                                  <tr>
                                    <th>id</th><th>CEF</th><th>Visible</th><th>Question</th><th>Réponse</th>
                                  </tr>";
                                  foreach($questions as $question){
                                    if($question["visible"]==1){
                                      $showVar = "Oui";
                                    }else{
                                      $showVar = "Non";
                                    }
                                  echo"
                                  <tr>
                                    <td>".$question['id']."</td>
                                    <td>".$question['CEF']."</td>
                                    <td>".$showVar."</td>
                                    <td>".$question['question']."</td>
                                    <td>".$question['answer']."</td>
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
