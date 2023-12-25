<?php 
  session_start();
  require("../includes/redirect.php");
  require("../includes/dbc.php");
  if(isset($_SESSION["User"])){
    header("location: home.php");
  }else if (isset($_SESSION["Admine"])){
    header("location: ../admin/pages/index.php");
  }else {
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../templates/layout/head.php'; ?>
    <title>Login</title>
  </head>
  <body class="log-in">
    <?php include '../templates/layout/header.php'; ?>
    <main class="formMaindiv">
        <div class="container">
          <div class="row">
            <div class="my-5 form-resize m-auto col-lg-6">
              <h1>Se connecter</h1>
              <form action="../config/login_action.php" method="post" class="log-in">
                <label for="CEF" class="form-label">CEF address </label>
                <input type="text" class="form-control" name="CEF" id="CEF" />
                <p id="Error"></p>
                <?php if(isset($_GET["error"]) && $_GET["error"]==1){ ?>
                <p class='text-danger '>CEF pas trouvé</p>
                <?php } ?>
                <label for="CEF" class="form-label d-block ">Mot de pass</label>
                <div class="input-group">
                  <input type="password" class="form-control input-password border-end-0 " id="password" name="password">
                  <button class="btn border border-start-0 password-show-btn" type="button">
                    <i class="fa-regular fa-eye"></i>
                  </button>
                </div>
                <?php if(isset($_GET["error"]) && $_GET["error"]==2){ ?>
                <p class='text-danger'>Password incorrect</p>
                <?php } ?>
                <div class="form-check form-switch">
                  <input class="form-check-input mt-2" name="Admine" type="checkbox" id="flexSwitchCheckDefault">
                  <label>Je suis un administrateur</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4"name="Submit" >Se connecter</button>
                <p class="mt-1">Je n'ai pas encore de compte<a href="?redirect=signup" class="text-decoration-none mx-1">S'inscrire</a></p>
              </form>
          </div>
          <div class="col-lg-6 login-img-delete">
            <img src="../assets/images/Login.jpg" style="width: 30rem;" alt="">
          </div>
        </div>
      </div>
    </main>
    <?php include '../templates/layout/footer.php'; ?>
  </body>
</html>
<?php
  }
?>