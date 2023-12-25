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
    <title>Accueil</title>
  </head>
  <body >
  <?php include '../templates/layout/header.php'; ?>
  <main class="" id="">
    <div class="container my-5">
      <div class="row">
        <div class="col-lg-6 form-resize">
          <h1 class="my-3">S'inscrire</h1>
          <form action="../config/signup_action.php" method="post" id="signupForm" class="sign-up">
            <label for="name" class="form-label">CEF </label>
            <input type="text" class="form-control" name="CEF" >
            <span id='errorCEF'></span>
            <label for="name" class="form-label d-block">Nom </label>
            <input type="text" class="form-control" name="Nom" >
            <label for="name" class="form-label">Prenom </label>
            <input type="text" class="form-control" name="prenom" >
            <label for="name" class="form-label">Email scolaire </label>
            <input type="text" class="form-control" name="email_scolaire" >
            <span id='errorEmail'></span>
            <label for="name" class="form-label d-block">Filiere </label>
            <select class="form-control" name="filiere" id="">
              <option value="Developpement Digital">DD</option>
              <option value="infrastructure Digital">ID</option>
            </select>
            <label for="name" class="form-label">Option </label>
            <input type="text" class="form-control" name="option" >
            <label for="name" class="form-label">Telephone </label>
            <input type="tel" class="form-control" name="Telephone" >
            <p id='telephoneError'></p>
            <label for="name" class="form-label">mot de pass </label>
            <div class="input-group">
              <input type="password" class="form-control input-password border-end-0 " id="password" name="password">
              <button class="btn border border-start-0 password-show-btn" type="button">
                <i class="fa-regular fa-eye"></i>
              </button>
            </div>
            <div class="d-flex justify-content-between my-2">
              <span class="border  w-100 rounded-5" style="height:9px;" id="rule1"></span>
              <span class="border  w-100 rounded-5" style="height:9px;" id="rule2"></span>
              <span class="border  w-100 rounded-5" style="height:9px;" id="rule3"></span>
            </div>
            <label for="name" class="form-label">Verification mot de pass </label>
            <input type="password" class="form-control" name="password_verify" >
            <span class="" id="No_match"></span>
            <button type="submit" class="btn btn-outline-primary w-100 button-submit mt-5">S'inscrire</button>
            <?php if(isset($_GET["error"])and $_GET["error"]=1){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php } ?>
            <p class="mt-1">J'ai déjà un compte<a href="?redirect=login" class="text-decoration-none mx-1">Se connecter</a></p>
          </form>
        </div>
        <div class="col-lg-6 login-img-delete">
          <img src="../assets/images/Signup.jpg" style="width: 43rem;margin-top: 10rem;margin-left: 0rem;" alt="">
        </div> 
      </div>
    </div>
  </main>
  <?php include '../templates/layout/footer.php'; ?>
  </body>
</html>
