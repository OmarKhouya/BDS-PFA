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
    <title>Qui somme nous</title>
  </head>
  <body>
    <?php include '../templates/layout/header.php'; ?>
    <main class="my-5">
      <div class="container">
        <h1 class="text-center py-3" >Qui Somme Nous ?</h1>
        <div class="row">
          <div class="col-lg-6 " id="aboutPresntationClubDiv">
            <h2 class="m-4">Présentation du club</h2>
            <p>
              Le Bureau des stagiaires, ou BDS, a pour objectif de favoriser l'épanouissement des stagiaires au sein de l'établissement en créant une unité entre eux et en établissant des liens avec les associations de stagiaires et l'administration de l'établissement. Il remplit plusieurs rôles importants :
            </p>
            <ul >
              <li>
                Redistribution de subventions associatives : Le BDS a la responsabilité de redistribuer les subventions aux associations de stagiaires pour soutenir leurs projets et initiatives.
              </li>
              <li>
                Défense des intérêts des étudiants : Le BDS défend les intérêts des étudiants et travaille à la promotion d'une expérience de stage positive pour tous.
              </li>
              <li>
                Organisation d'événements et d'activités : Le BDS organise des événements et des activités pour les stagiaires, comme des conférences, des ateliers de formation, des sorties culturelles et des rencontres avec des professionnels du secteur.
              </li>
              <li>
                Promotion de la qualité des stages : Le BDS travaille en étroite collaboration avec les entreprises et les organisations pour garantir que les stages offerts aux étudiants soient de qualité et offrent une expérience enrichissante.
              </li>
            </ul>
            <p >
              En somme, le BDS est un acteur clé dans la vie étudiante et professionnelle des stagiaires au sein de l'établissement. Il cherche à renforcer les liens entre les différents acteurs de la vie étudiante et à encourager la participation active des stagiaires à la vie de l'institution. Grâce à ses multiples rôles, le BDS joue un rôle important dans la promotion d'une expérience de stage positive pour tous et dans le renforcement de la communauté des stagiaires et des associations de stagiaires.
            </p>
          </div>
          <div class="col-lg-6"> 
            <h2 class="m-4">Notre équipe</h2>
            <div id="myCarousel" class="carousel slide " data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="container">
                    <div class="card">
                      <div class="card-body">
                        <img src="../assets/images/user-picture.png" class="img-fluid rounded w-100">
                        <h3 class="my-3">Nom et prenom</h3>
                        <p>Fonction</p>
                        <p>Email</p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                  $sql = "SELECT * FROM administrateur";
                  $stmt= $db->prepare($sql);
                  $stmt->execute();
                  $administrateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php
                  foreach($administrateurs as $adm){
                ?>
                <div class="carousel-item">
                  <div class="container">
                    <div class="card">
                      <div class="card-body">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $adm['image'] ).'" class="img-fluid rounded" alt=""/>'; ?>
                        <h3 class="my-3"><?php echo $adm['prenom']." ".$adm['nom'];?></h3>
                        <p><?php echo $adm['fonction']?></p>
                        <p>Email : <?php echo $adm['email_scolaire'];?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?>
              <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button"
                data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          </div>
          <div class="container">
            <h2 class="text-center my-5">Galeries photo</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <?php
                $sql = "SELECT * FROM galerieabout";
                $stmt= $db->prepare($sql);
                $stmt->execute();
                $galerie = $stmt->fetchAll(PDO::FETCH_ASSOC);
              ?>
              <?php
                foreach($galerie as $img){
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
      </div>
    </main>
    <?php include '../templates/layout/notification.php'; ?>
    <?php include '../templates/layout/footer.php'; ?>
  </body>
</html>
