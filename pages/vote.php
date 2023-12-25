<?php 
  session_start();
  require("../includes/redirect.php");
  require("../includes/dbc.php");

  $set = $db->prepare("select * from activationPageVote ");
  $set->execute();
  $activationPageVote = $set->fetchAll(PDO::FETCH_ASSOC);

  if(isset($_SESSION["User"]) && $activationPageVote[0]["active"]==1 ){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../templates/layout/head.php'; ?>
    <title>Espace Vote</title>
  </head> 
  <body class="">
  <?php include '../templates/layout/header.php'; ?>
    <main class="my-3" id="">
      <div class="container ">
        <div class="row">
          <div class="form-resize col-lg-6" id="">
            <form action="../config/vote_action.php" method="post" class="vote-section">
              <label for="email">CEF Ofppt</label>
              <input type="number" class="form-control" required name="CEF" value="<?php  if(isset($_SESSION["CEF"])){echo $_SESSION["CEF"];}else{echo "";}?>" placeholder="Entrez votre CEF">
              <p id="errorCEF"></p>
              <label for="motivation">Motivation</label>
              <textarea class="form-control text-area" name="sujet" rows="4" placeholder="Expliquez brièvement votre motivation pour voter" required></textarea>
              <label for="">Vote</label>
                <select name="voteCandidat" class="form-select">
                    <?php
                      $sql = "select * from stagiaire";
                      $stmt = $db->prepare($sql);
                      $stmt->execute();
                      $Stagiaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

                      $sql = "select * from candidat";
                      $stmt = $db->prepare($sql);
                      $stmt->execute();

                      $Candidat = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      foreach($Stagiaires as $stg){
                        foreach($Candidat as $Cnd){
                          if($stg["CEF"]==$Cnd["CEF"])
                          echo "<option value=".$Cnd['num_vote'].">".$stg['nom']." ".$stg['prenom']."</option>";
                        }
                      }
                    ?>          
                </select>
              <button type="submit" name="voteBtn" class="btn btn-outline-primary my-4 w-100 text-center"><i class="fa fa-vote-yea me-1"></i>Vote</button>
              <?php if(isset($_GET["error"]) and $_GET["error"]==1){ echo "<p style='color:red;'>Vérifiez si c'est votre première fois de voter!</p>"; }else if(isset($_GET["vote"]) and $_GET["vote"]=="done"){ echo "<p style='color:green;'>Le vote a réussi.</p>"; } ?>
            </form>
          </div>
          <section class="login-img-delete col-lg-6" id="">
            <img src="../assets/images/vote21.png" style="width: 25rem!important;margin-left: 6rem;"  alt="Login" />
          </section>
        </div>
      </div>
    </main>
    <?php include '../templates/layout/notification.php'; ?>
    <?php include '../templates/layout/footer.php'; ?>
  </body>
</html>
<?php 
  }else if(isset($_SESSION["Admine"]) ){
    header("location: ../admin/pages/index.php");
  }else{ 
    header("location: index.php");}
?>