<?php 
    
    include("../helpers/conditions.php");
    $check = checkSession();    
    if($check)
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include("../templates/head.php") ?>
        <title>Espace de gestion Messages</title>
    </head>
    <body>
        <?php include("../templates/header.php") ?>
        <main class="">
            <section class="container">
              <h1 class="text-center">Gérer la section des messages</h1>
              <p class="text-muted text-center">Accès pour répondre aux messagesz et les masquer ou les afficher</p>
                <div class="">
                  <form action="" method="post">
                    <label for="">Prévisualiser le message</label>
                    <select class="form-select" name="idMessage">
                      <!-- <option value=''>Select</option>   -->
                      <?php
                        $sql = "select * from contactmessages";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        $contactmessages = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      ?>
                      <?php
                        foreach($contactmessages as $messages){
                          echo "<option value=".$messages['id'].">".$messages['id']."</option>";
                        }
                      ?>  
                    </select>
                    <button type="submit" name="showMessage" class="btn w-100 my-2" style="background-color: #96C4FF;">Prévisualiser</button>  
                  </form>
                  
                  <?php
                  
                    if(isset($_POST["showMessage"])){
                      foreach($contactmessages as $message){
                        if($message['id'] == $_POST["idMessage"]){ ?>
                          <div class="p-3 rounded-3" style="background-color:rgb(121, 224, 238,0.2);">
                            <div class="d-flex m-3">
                              <span class="me-1">
                                <i class="fa-regular fa-circle-user fa-2x"></i>
                              </span>
                              <div class="card bg-light d-flex flex-column p-3 w-100 border">
                                <p style="font-weight:bolder;"><?php echo $message['nom'] ?></p>
                                <p class=""><?php echo $message['email'] ?></p>
                                <span class="text-muted">
                                  <?php echo $message["message"] ?>
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
                                  <?php echo $message["answer"] ?>
                                </span>
                              </div>
                            </div>
                          </div>
                  <?php }}} ?>
                  <hr> 
                  <form action="../config/messages_action.php" method="post">
                    <label for="">Répondre au message</label>
                    <select class="form-select mb-3" name="idMessageVisible">
                      <!-- <option value=''>Select</option>   -->
                      <?php
                        foreach($contactmessages as $message){
                          echo "<option value=".$message['id'].">".$message['id']."</option>";
                        }
                      ?>  
                    </select>
                      <textarea name="answer" id="" cols="30" rows="3" class="form-control mt-2"></textarea>                      
                      <button type="submit" class="btn w-100 my-2" name="answermessage" style="background-color: #96C4FF;">Répondre</button>
                  </form>
                  <hr>
                  <p>Afficher les informations des messages</p>
                  <button class="navbar-toggler w-100" data-bs-target="#ShowMessagesinfos" type="button" data-bs-toggle="collapse" ><span class="btn w-100" style="background-color: #96C4FF;">Afficher</span></button>
                    <div class="collapse mt-3" id="ShowMessagesinfos">
                      <div class="">
                        <?php
                         echo "<div class='table-responsive' style='margin:auto!important;'>
                                <table class='w-100 table table-bordered' >
                                  <tr>
                                    <th>id</th><th>CEF</th><th>message</th><th>réponse</th>
                                  </tr>";
                                  foreach($contactmessages as $message){
                                  echo"
                                  <tr>
                                    <td>".$message['id']."</td>
                                    <td>".$message['CEF']."</td>
                                    <td>".$message['message']."</td>
                                    <td>".$message['answer']."</td>
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
        <?php require("../templates/footer.php") ?>
    </body>
</html>
