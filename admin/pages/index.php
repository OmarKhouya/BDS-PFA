<?php 
  include("../helpers/conditions.php");
  $check = checkSession();    
  if($check) 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("../templates/head.php");?>
    <title>Document</title>
  </head>
  <body>
    <?php include("../templates/header.php");?>
    <main>
      <div class="container">
        <h1 class="text-center my-4">Bienvenue <span style="color:green;"><?php echo $_SESSION["Full_name"] ?></span> sur le profil Admin</h1>
        <div class="row all-cards-hover flex-wrap">
          <div class="col-md-4 card p-5 text-center"><a class="m-4 nav-link" href="?redirect=actualites"> Gérer les actualités </a></div>
          <div class="col-md-4 card p-5 text-center"><a class="m-4 nav-link" href="?redirect=video"> Gérer les vidéos </a></div>
          <div class="col-md-4 card p-5 text-center"><a class="m-4 nav-link" href="?redirect=admins">Gérer les administrateurs </a></div>
          <div class="col-md-4 card p-5 text-center"><a class="m-4 nav-link" href="?redirect=vote"> Gérer les votes </a></div>
          <div class="col-md-4 card p-5 text-center"><a class="m-4 nav-link" href="?redirect=messages"> Gérer les messages </a></div>
          <div class="col-md-4 card p-5 text-center"><a class="m-4 nav-link" href="?redirect=questions"> Gérer les questions </a></div>
          <div class="col-md-4 card p-5 text-center"><a class="m-4 nav-link" href="?redirect=stagiaires"> Gérer les stagiaires </a></div>
          <div class="col-md-4 card p-5 text-center"><a class="m-4 nav-link" href="?redirect=blog"> Gérer les blogs </a></div>
          <div class="col-md-4 card p-5 text-center"><a class="m-4 nav-link" href="?redirect=galerie"> Gérer la galerie </a></div>
        </div>

      </div>
    </main>
    <?php include("../templates/footer.php");?>
  </body>
</html>