<?php 
  session_start();
  require('../includes/dbc.php');
  require('../includes/redirect.php');
  if(isset($_SESSION["Admine"]) ){
    header("location: ../admin/pages/index.php");
  }
?> 
<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../templates/layout/head.php'; ?>
    <title>Aide</title>
  </head>
  <body class="">
  <?php include '../templates/layout/header.php'; ?>
    <main>
      <div class="container my-5">
        <h1 class="text-center mb-5">Aide</h1>
        <div class="accordion" id="faqAccordion">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button m-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Répondre aux anciens Questions
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
              <div class="accordion-body" id="Answers">
                <?php
                  $set = $db->prepare("select * from aidequestions where visible=1");
                  $set->execute();
                  $qeuestions = $set->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php
                  foreach($qeuestions as $quest){
                    echo "<h5>".$quest["question"]."</h5>";
                    echo "<p>".$quest["answer"]."</p>";
                    echo "<hr class='px-5'>";
                  }
                ?>
            </div>
          </div>
        </div>
        <?php if(isset($_SESSION["User"]) ){ ?>
        <hr class="my-5" />
        <h2 class="text-center mb-3">Vous avez une question ?</h2>
        <section class="my-4" id="">
            <div class="row " id="" >
              <section class="form-resize col-lg-6" id="">
                <form action="../config/aide_action.php" method="post" class="contact-question">
                  <label class="form-label">CEF : </label>
                  <input type="text" class="form-control" name="CEF" value="<?php if(isset($_SESSION["CEF"])){echo $_SESSION["CEF"];}else{echo "";}?>" placeholder="">
                  <p id="errorCEF"></p>
                  <label class="form-label">Nom : </label>
                  <input type="text" class="form-control" name="nom" value="<?php if(isset($_SESSION["Full_name"])){echo $_SESSION["Full_name"];}else{echo "";}?>"  placeholder="ex: harvey specter">
                  <label class="form-label">Email : </label>
                  <input type="email" class="form-control" name="email" value="<?php if(isset($_SESSION["email"])){echo $_SESSION["email"];}else{echo "";}?>"  placeholder="ex: username@domaine.com">
                  <p id='errorEmail'></p>
                  <label class="form-label">Question : </label>
                  <textarea class="form-control text-area" name="Question" placeholder="ex: Je suis accro à ça" rows="3" id="textArea"></textarea>
                  <hr class="pt-2">
                  <button type="submit" name="ValiderQuestion" class="btn btn-primary float-end "><i class="fa fa-check ms-2 me-1"></i><span class="me-3">Envoyer</span></button>
                  <?php if(isset($_GET["error"])and $_GET["error"]==1){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["question"])and $_GET["question"]==1){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                </form>
              </section>
              <section class="login-img-delete col-lg-6" id="">
                <img src="../assets/images/6853676.png" style="width: 30rem!important;"  alt="Login" />
              </section>
            </div>
        </section>
        <?php }else{ ?>
          <h1 class="text-center mt-5">Vous avez une question ?</h1><h4 class="text-center text-success">Connectez-vous Pour poser une question direct aux administrateurs !</h4>
            <ul class="list-unstyled navbar">
              <li><i class="fas fa-envelope"></i> Email: info@BDS.com</li>
              <li><i class="fas fa-phone"></i> Phone: 212-501-020-30</li>
              <li><i class="fas fa-map-marker-alt"></i> Address: 44 rue zaouia, Safi, Morocco</li>
            </ul>
        <?php } ?>
      </div>
    </main>
    <?php include '../templates/layout/notification.php'; ?>
    <?php include '../templates/layout/footer.php'; ?>
  </body>
</html>
