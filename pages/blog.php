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
    <title>Blog</title>
  </head>
  <body >
    <?php include '../templates/layout/header.php'; ?>
    <main class="z-1">
      <div class="container">
        <h1 class="text-center my-5">Blog du Bureau des Stagiaires</h1>
          <div class="row">
            <div class="col-md-8">
              <div class="container">
                <div class="row">
                  <?php 
                  $sql = "SELECT * FROM participation WHERE showBlog=1";
                  $stmt = $db->prepare($sql);
                  $stmt->execute();
                  $particpe = $stmt->fetchAll(PDO::FETCH_ASSOC);

                  $blogsPerPage = 4;

                  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                  $startIndex = ($currentPage - 1) * $blogsPerPage;
                  $blogsOnPage = array_slice($particpe, $startIndex, $blogsPerPage);
                  
                  foreach ($blogsOnPage as $part) {
                    if ($part['showBlog']) {
                  ?>
                    <div class="col-md-6">
                      <div class="card mb-4">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $part['img'] ).'" class="card-img-top" style="" alt=""/>'; ?>
                        <div class="card-body">
                          <h5 class="card-title ArticleTitle"  data-index="2">
                            <?php echo $part["objet"]; ?>
                          </h5>
                          <form action="" method="post">
                            <button type="button" class="btn btn-primary my-button btnBlog" value="<?php echo $part["numero"]; ?>" name="Select" data-index="2">Voir plus</button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="overlay d-none showUpPage" id="<?php echo $part["numero"]; ?>" >
                      <div class="container " >
                          <div class="row">
                            <div class="col-md-8">
                              <div class="card mb-4">
                                <button class="btn" id="returnBtn" type="submit">Retour</button>
                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $part['img'] ).'"card-img-top ArticleImgPrincipale" style="" alt=""/>'; ?>
                                <div class="card-body">
                                <h5 class="card-title" id="showInfoTitle">
                                <?php echo $part["objet"]; ?>
                                </h5>
                                <p class="card-text" id="showInfoDescription">
                                  <?php echo $part["contenu"]?>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <?php
                    }
                  }
                  ?>
                </div>
                <nav>
                  <ul class="pagination">
                    <?php
                    $totalPages = ceil(count($particpe) / $blogsPerPage);
                    $range = 3;
                    $start = max(1, $currentPage - $range);
                    $end = min($totalPages, $currentPage + $range);
                    if ($currentPage > 1) {
                      echo '<li class="page-item">';
                      echo '<a class="page-link" href="?page=1">&laquo;</a>';
                      echo '</li>';
                    }
                    for ($i = $start; $i <= $end; $i++) {
                      echo '<li class="page-item' . ($i == $currentPage ? ' active' : '') . '">';
                      echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
                      echo '</li>';
                    }
                    if ($currentPage < $totalPages) {
                      echo '<li class="page-item">';
                      echo '<a class="page-link" href="?page=' . $totalPages . '">&raquo;</a>';
                      echo '</li>';
                    }
                    ?>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-body">
                  <button class="navbar-toggler fs-3 " data-bs-target="#Comments" data-bs-toggle="collapse"><i class="fa-regular fa-comments"></i>  Commentaires</button>
                  <div class="collapse show " id="Comments">
                  <?php
                      $set = $db->prepare("select * from commentaires where visible=1");
                      $set->execute();
                      $comments = $set->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <?php
                      foreach($comments as $com){?>
                    <div>
                      <div class="d-flex m-3">
                        <span class="me-1">
                          <i class="fa-regular fa-circle-user fa-2x"></i>
                        </span>
                        <div class="card bg-light d-flex flex-column p-3 w-100 border">
                          <p style="font-weight:bolder;"><?php echo $com["nom"] ?></p>
                          <span class="text-muted">
                            <?php echo $com["commentaire"] ?>
                          </span>
                        </div>
                      </div>
                    </div>
                    <?php
                     }
                    ?>
                  </div>
                </div>
              </div>
              <?php if(isset($_SESSION["User"])){?>
              <div class="card mb-4 blog-two form-check p-0">
                <div class="card-body">
                  <button class="navbar-toggler fs-3" data-bs-target="#laisserComment" data-bs-toggle="collapse"><i class="fa-regular fa-pen-to-square"></i> Laisser un commentaire</button>
                  <div class="collapse " id="laisserComment">
                  <hr class="pb-2">
                  <form action="../config/blogComment_action.php" method="post" id="formComment" class="blog-two form1">
                    <label class="form-label">CEF : </label>
                    <input type="text" class="form-control" name="CEF" value="<?php  if(isset($_SESSION["CEF"])){echo $_SESSION["CEF"];}else{echo "";}?>" placeholder="">
                    <p id="errorCEF"></p>
                    <label class="form-label">Nom complet : </label>
                    <input type="text" class="form-control" name="nom" value="<?php  if(isset($_SESSION["Full_name"])){echo $_SESSION["Full_name"];}else{echo "";}?>"  placeholder="ex: harvey specter">
                    <label class="form-label">Email : </label>
                    <input type="email" class="form-control" name="email" value="<?php  if(isset($_SESSION["email"])){echo $_SESSION["email"];}else{echo "";}?>"  placeholder="ex: username@domaine.com">
                    <p id='errorEmail'></p>
                    <label class="form-label">Commentaire : </label>
                    <textarea class="form-control text-area" name="comment" placeholder="ex: Je suis accro à ça" rows="3" id="textArea"></textarea>
                    <hr class="pt-2">
                    <button type="submit" name="ValiderComment" class="btn btn-primary float-end "><i class="fa fa-check ms-2 me-1"></i><span class="me-3">Envoyer</span></button>
                    <?php if(isset($_GET["error"])and $_GET["error"]==1){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["comment"])and $_GET["comment"]==1){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                  </form>
                  </div>
                </div> 
              </div>
              <div class="card mb-4 button-toggle-participation">
                <div class="card-body">
                  <button class="navbar-toggler fs-3 " data-bs-target="#Participier" data-bs-toggle="collapse"><i class="fa-solid fa-plus"></i>  Participier</button>
                  <div class="collapse form-toggle-participe" id="Participier">
                    <hr class="pb-2">
                    <form action="../config/blogParticipe_action.php" method="post" enctype="multipart/form-data" id="formParticipe" class="blog-two form2">
                      <label class="form-label">CEF : </label>
                      <input type="text" class="form-control" name="CEF" value="<?php  if(isset($_SESSION["CEF"])){echo $_SESSION["CEF"];}else{echo "";}?>" placeholder="">
                      <p id="errorCEF"></p>
                      <label class="form-label">Nom : </label>
                      <input type="text" id="nom" name="nom" class="form-control" value="<?php  if(isset($_SESSION["Full_name"])){echo $_SESSION["Full_name"];}else{echo "";}?>" >
                      <label class="form-label">Fonction : </label>
                      <input type="text" id="fonction" name="fonction"  class="form-control" >
                      <label class="form-label">Titre : </label>
                      <input type="text" id="title" name="Objet"  class="form-control" name="" >
                      <label class="form-label">contenu : </label>
                      <textarea class="form-control content" name="content"  placeholder="" rows="3"></textarea>
                      <label class="form-label">Ajouter un image: </label>
                      <input type="file" class="form-control img" accept="image/*" name="image" id="imageInput">
                      <div id="imageContainer"></div>
                      <hr class="pt-2">
                      <button type="submit" name="valider" class="btn btn-primary float-end "><i class="fa fa-check ms-2 me-1"></i><span class="me-3">Participier</span></button>
                    <?php if(isset($_GET["error"])and $_GET["error"]==2){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["participe"])and $_GET["participe"]==1){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                    </form>
                  </div>
                </div> 
              </div>
              <?php } ?>
            </div> 
        </div>  
      </div>
    </main>
    <?php include '../templates/layout/notification.php'; ?>
    <?php include '../templates/layout/footer.php'; ?>
  </body>
</html>