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
    <title>Espace Contact</title>
  </head>
  <body >
  <?php include '../templates/layout/header.php'; ?>
    <main>
      <div class="container">
          <section class="container my-5">
            <h1 class="text-center">Bienvenue sur la page de contact</h1>
            <div class="row my-4">
              <?php 
                $set = $db->prepare("select * from administrateur");
                $set->execute();
                $admines = $set->fetchAll(PDO::FETCH_ASSOC);

                foreach($admines as $admine){
                  echo '<div class="col-md-4">';
                  echo '<img src="data:image/jpeg;base64,'.base64_encode( $admine['image'] ).'" class="img-fluid rounded" alt=""/>';
                  echo '<h5 class="text-center my-2">'.$admine['prenom'].' '.$admine['nom'].'</h5>';
                  echo '</div>';
                }
              ?>
            </div>
            <p class="text-center">Nous vous souhaitons la bienvenue sur la page de contact avec le Bureau des stagiaires (BDS) ! Nous sommes enchantés de vous accueillir et de vous faire découvrir notre association étudiante. Nous avons travaillé avec diligence pour créer un espace interactif et amical où vous pouvez découvrir nos activités, nos projets ainsi que les avantages que nous offrons aux stagiaires et aux associations étudiantes. Nous vous invitons à parcourir notre site web, à nous contacter en cas de besoin et à nous rejoindre pour participer à nos événements et projets. Nous sommes une communauté de personnes passionnées et engagées et nous espérons que vous vous sentirez chez vous ici sur notre page.</p>
          </section>
          <?php if(isset($_SESSION["User"]) ){ ?>
          <h1 class="text-center">Contacter nous!</h1>
          <section class="" id="">
            <div class="row my-4">
                <div class="form-resize col-lg-6" id="">
                  <form action="../config/contact_action.php" method="post" class="contact-question">
                    <label class="form-label">CEF : </label>
                    <input type="text" class="form-control" name="CEF" value="<?php if(isset($_SESSION["CEF"])){echo $_SESSION["CEF"];}else{echo "";}?>" placeholder="">
                    <p id="errorCEF"></p>
                    <label class="form-label">Nom : </label>
                    <input type="text" class="form-control" name="nom" value="<?php if(isset($_SESSION["Full_name"])){echo $_SESSION["Full_name"];}else{echo "";}?>"  placeholder="ex: harvey specter">
                    <label class="form-label">Email : </label>
                    <input type="email" class="form-control" name="email" value="<?php if(isset($_SESSION["email"])){echo $_SESSION["email"];}else{echo "";}?>"  placeholder="ex: username@ofppt-edu.ma">
                    <p id='errorEmail'></p>
                    <label class="form-label">Message : </label>
                    <textarea class="form-control text-area" name="message" placeholder="ex: Je suis accro à ça" rows="3" id="textArea"></textarea>
                    <hr class="pt-2">
                    <button type="submit" name="ValiderQuestion" class="btn btn-primary float-end "><i class="fa fa-check ms-2 me-1"></i><span class="me-3">Envoyer</span></button>
                      <?php if(isset($_GET["error"])and $_GET["error"]==1){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["contact"])and $_GET["contact"]==1){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                  </form>
                </div>
                <div class="login-img-delete col-lg-6" id="">
                  <img src="../assets/images/ContactUS.jpg" style="width: 30rem!important;" alt="Contact Us " />
                </div>
            </div>
          </section>
          <?php }else{ ?>
          <h1 class="text-center">Contacter nous!</h1><h4 class="text-center text-success">Connectez-vous pour envoyer un message direct aux administrateurs !</h4>
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