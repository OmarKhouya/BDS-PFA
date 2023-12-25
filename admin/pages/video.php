<?php 
    include("../helpers/conditions.php");
    $check = checkSession();    
    if($check)
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include("../templates/head.php") ?>
        <title>Espace de management Actualites</title>
    </head>
    <body>
        <?php include("../templates/header.php") ?>
        <main class="">
            <section class="container">
                <h1 class="text-center my-3">Gérer la section des vidéos.</h1>
                <p class="text-muted text-center">Vous avez quatre emplacements pour placer des vidéos.</p>
                  <div class="p-2 rounded-4 my-2">
                      <form action="../config/video_action.php" method="post">
                        <div class="my-2 d-flex justify-content-evenly border border-2 rounded-2 p-3 flex-wrap">
                          <div>
                            <input type="radio" name="Video" value="1">
                            <label for="">Video 1</label>
                          </div>
                          <div>
                            <input type="radio" name="Video" value="2">
                            <label for="">Video 2</label>
                          </div>
                          <div>
                            <input type="radio" name="Video" value="3">
                            <label for="">Video 3</label>
                          </div>
                          <div>
                            <input type="radio" name="Video" value="4">
                            <label for="">Video 4</label>
                          </div>
                        </div>
                        <div class="border border-2  rounded-2 p-2 mt-2"> 
                          <span>Saisir le lien du Video <span class="text-muted">www.youtube.com/<span class="text-danger">embed</span>/etc</span>  </span>
                          <input type="text" name="linkVideo" class="form-control">
                        </div>
                        <div class="border border-2  rounded-2 p-2 mt-2"> 
                          <span>Saisir le titre du Video  </span>
                          <input type="text" name="titreVideo" class="form-control">
                        </div>
                        <button type="submit" name="ValiderVideo" class="btn w-100" style="background-color: #96C4FF;">Valider</button>
                        <?php if(isset($_GET["error"])and $_GET["error"]==1){?><p style="color:red;">Nous avons un problème, vérifiez si tout est en ordre</p><?php }if(isset($_GET["video"])and $_GET["video"]==1){ ?><p style="color:green;">Terminé avec succès</p><?php } ?>
                      </form>
                  </div>
            </section>
        </main>
        <script>
          const form = document.querySelector('form');
          form.addEventListener('submit', function(event) {
            event.preventDefault();
            let valid = true;

            const inputs = form.querySelectorAll('input[type="text"]');
            inputs.forEach(input => {
              if (!input.value) {
                input.style.border = '2px solid red';
                valid = false;
              } else {
                input.style.border = '';
              }
            });

            const radios = form.querySelectorAll('input[type="radio"]');  
            let radioChecked = false;
            radios.forEach(radio => {
              if (radio.checked) {
                radioChecked = true;
              }
            });

            if (!radioChecked) {
              const radioContainer = form.querySelector('.my-2');
              radioContainer.style.border = '2px solid red';
              valid = false;
            } else {
              const radioContainer = form.querySelector('.my-2');
              radioContainer.style.border = '';
            }

            if (valid) {
              form.submit();
            } else {
              alert('Entrées du formulaire invalides');
            }
          });
        </script>
        <?php require("../templates/footer.php") ?>
    </body>
</html>