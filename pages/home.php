<?php 
  session_start();
  require("../includes/redirect.php");
  require("../includes/dbc.php");
  if (isset($_SESSION["Admine"])){
    header("location: ../admin/pages/index.php");
  }else if(!isset($_SESSION["User"])) { 
    header("location: index.php");
  }if(isset($_SESSION["User"])){
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../templates/layout/head.php'; ?>
    <title>Accueil</title>
  </head>
  <body class="">
    <?php include '../templates/layout/header.php'; ?>
    <main class="all-cards-hover my-3">
      <div class="container">
        <h3 class="my-3 text-center">Bonjour <?php echo $_SESSION["Full_name"];?></h3>
        <h4 class="text-center"> Trouver :   <i class="fa-regular fa-hand-point-down"></i> </h4>
        <div class="row">
        <a href="?redirect=about" class=" nav-link col-md-4">
          <div class="card my-2 mx-2">
            <div class="card-body">
              <h3 class="card-text">
                Qui somme-nous
              </h3>
              <p class="card-text">
                Découvrez l'objectif de notre plateforme et club, rencontrez nos administrateurs et explorez notre galerie photo.
              </p>
            </div>
            <div>
              <img src="../assets/images/Actualite3.jpg" class="card-img-bottom" alt="">
            </div>
          </div>
        </a>
        <a href="?redirect=contact" class="nav-link col-md-4">
          <div class="card my-2 mx-2">
            <div class="card-body">
              <h3 class="card-text">
                Contact
              </h3>
              <p class="card-text">
                Rencontrez nos administrateurs et contactez-nous en cas de besoin.
              </p>
            </div>
            <div>
              <img src="../assets/images/activity6.jpg" class="card-img-bottom" alt="">
            </div>
          </div>
        </a>
        <a href="?redirect=mep" class="nav-link col-md-4">
          <div class="card my-2 mx-2">
            <div class="card-body">
              <h3 class="card-text">
                Missions et politique
              </h3>
              <p class="card-text">
                Découvrez nos missions et politiques pour la plateforme.
              </p>
            </div>
            <div>
              <img src="../assets/images/Carrousel2.jpg" class="card-img-bottom" alt="">
            </div>
          </div>
        </a>
        <a href="?redirect=blog" class="nav-link col-md-4">
          <div class="card my-2 mx-2">
            <div class="card-body">
              <h3 class="card-text">
                Blog
              </h3>
              <p class="card-text">
                Notre blog est rempli d'articles écrits par des stagiaires et tout le monde peut y participer.
              </p>
            </div>
            <div>
              <img src="../assets/images/activity2.jpg" class="card-img-bottom" alt="">
            </div>
          </div>
        </a>
        <a href="?redirect=aide" class="nav-link mt-2 col-md-4">
          <div class="card mx-2">
            <div class="card-body">
              <h3 class="card-text">
                Aide
              </h3>
              <p class="card-text">
                Trouvez des réponses aux questions fréquemment posées ou posez les vôtres.
              </p>
            </div>
            <div>
              <img src="../assets/images/Actualite1.jpg" class="card-img-bottom" alt="">
            </div>
          </div>
        </a>
        <a href="?redirect=vote" class="nav-link col-md-4">
          <div class="card my-2 mx-2">
            <div class="card-body">
              <h3 class="card-text">
                Vote
              </h3>
              <p class="card-text">
                Les stagiaires peuvent voter ici.
              </p>
            </div>
            <div>
              <img src="../assets/images/vote1.jpg" class="card-img-bottom" alt="">
            </div>
          </div>
        </a>
        </div>
      </div>
      <section class="container">
        <hr class="mt-5" />
        <div class="d-flex justify-content-around flex-wrap border border-1 p-4 rounded-4 bg-light" id="ifreames">
          <?php
            $settingsVedios = $db->prepare("SELECT * FROM vedios");
            $settingsVedios->execute();
            $videos = $settingsVedios->fetchAll(PDO::FETCH_ASSOC);
            foreach($videos as $link){
              echo '<iframe src="'.$link['link'].'" frameborder="0" allowfullscreen class="rounded-2 my-2" style="max-width:90%!important;" id=""></iframe>';
            }
          ?>
          <div class="" id="news">
            <div class="d-flex justify-content-center"><hr class="my-4 w-50"></div>
            <?php
              $settingsNews = $db->prepare("SELECT * FROM actualite");
              $settingsNews->execute();
              $news = $settingsNews->fetchAll(PDO::FETCH_ASSOC);
              foreach($news as $act){
            ?>
            <div class='row'>
              <?php
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $act['image'] ).'" class="col-lg-6 mb-2" alt=""/>';
              ?>
              <div class="col d-flex flex-column justify-content-between">
                <h2 id="" class="" style="text-transform:uppercase"><?php echo $act['title'] ?></h2>
                <p class="d-block text-muted overflow-auto" style='text-align:justify;max-height:14rem!important;'><?php echo $act ['content'] ?></p>
                <span id="Date" class="rounded-3 text-light d-block badge" style="background-color: rgb(0 30 255)!important;"><?php echo $act['created_at'] ?></span>
              </div>
            </div>
            <div class="d-flex justify-content-center hrNews"><hr class="my-4 w-75"></div>
            <?php
              }
            ?>
          </div>
        </div>
      </section>
    </main>
    <?php include '../templates/layout/notification.php'; ?>
    <?php include '../templates/layout/footer.php'; ?>
  </body>
</html>
<?php } ?>