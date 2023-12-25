<?php
  session_start();
  require("../includes/redirect.php");
  require("../includes/dbc.php");
  if(isset($_SESSION["User"])){
    header("location:home.php");
  }else if (isset($_SESSION["Admine"])){
    header("location: ../admin/pages/index.php");
  }
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../templates/layout/head.php'; ?>
    <title>Accueil</title>
  </head>
  <body>
    <?php include '../templates/layout/header.php'; ?>
    <main class="my-5  ">
      <section class="container">
        <div id="myCarousel" class="carousel slide " data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner" id="TextSizeChange">
            <div class="carousel-item active" >
              <img src="../assets/images/Carrousel1.jpg" class="CarrouselIMGResize" alt="First Slide" />
              <div class="carousel-caption " >
                <a href="?redirect=signup" target="_blank">
                  <h5 class="text-bg-primary rounded-top p-2">Inscrivez Vous</h5>
                </a>
                <p class="text-bg-primary rounded-bottom p-2 ">
                  Si vous voulez bénéficier d'un service ou d'un accès exclusif, il est important de vous inscrire. Alors, inscrivez-vous dès maintenant !
                </p>
              </div> 
            </div>
            <div class="carousel-item">
              <img src="../assets/images/Carrousel2.jpg" class="CarrouselIMGResize" alt="First Slide" />
              <div class="carousel-caption">
                <a href="?redirect=login" target="_blank">
                  <h5 class="text-bg-primary rounded-top p-2">
                    Participez maintenant
                  </h5>
                </a>
                <p class="text-bg-primary rounded-bottom p-2">
                  C'est la meilleure façon de ne rien manquer et de rejoindre une communauté passionnante. Alors, rejoignez-nous et participez dès maintenant!
                </p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="../assets/images/Carrousel3.jpg" class="CarrouselIMGResize" alt="First Slide" />
              <div class="carousel-caption">
                <a href="?redirect=about">
                  <h5 class="text-bg-primary rounded-top p-2" target="_blank">En savoir plus</h5>
                </a>
                <p class="text-bg-primary rounded-bottom p-2">
                  Si vous voulez en savoir davantage sur un sujet particulier, n'hésitez pas à cliquer sur "en savoir plus". Cela vous permettra d'obtenir des informations supplémentaires et de mieux comprendre le sujet.
                </p>
              </div>
            </div>
          </div>
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
      </section>
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
                <p class="d-block text-muted overflow-auto" style='text-align:justify;max-height:10rem!important;'><?php echo $act ['content'] ?></p>
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
    <?php include '../templates/layout/footer.php'; ?>
  </body>
</html>
