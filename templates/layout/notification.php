<div class="modal" id="notification" tabindex="-1" aria-labelledby="overlayModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="d-flex justify-content-between p-3">
        <h5 class="modal-title fs-1" style="font-weight: bolder;" id="overlayModalLabel">Notification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="overflow-auto" style="height:350px!important;">
          <table class="table table-hover notification">
          <?php
            $voteNotification = $db->query("SELECT * FROM activationpagevote");
            $check = $voteNotification->fetchAll(PDO :: FETCH_ASSOC)[0];
            if($check["active"]){
          ?>
          
            <tr class="table-success">
              <td>
                <a href="?redirect=vote" class="nav-link">
                  <span class="">La page de vote est maintenant active, votons.</span>
                </a>
              </td>
              <td class="notify-img-responsive" style="width:7rem!important;height:3rem!important;" >
                <a href="?redirect=vote" class="nav-link">
                  <img src="../assets/images/vote31.png" class="img-fluid d-inline rounded" alt=""> 
                </a>
              </td>
            </tr>
            <?php 
            }
              $stmt = $db->prepare("SELECT showBlog,objet FROM participation WHERE CEF=:CEF and showBlog=1");
              try{
                $stmt->execute([":CEF"=>$_SESSION["CEF"]]);
                $participation = $stmt->fetchAll(PDO :: FETCH_ASSOC);
              }catch(PDOException $e){
                $participation = null;
              }
              if($participation != null){
                foreach($participation as $part){
            ?>
            <tr class="table-primary">
              <td>
                <a href="?redirect=blog" class="nav-link">
                  <span class="" style="text-decoration: none!important;color:black;">Votre participation avec le titre "<span style="text-decoration: none!important;color:red;"><?php echo $part["objet"] ?></span>" est visible pour le moment. Cliquez pour la voir.</span>
                </a>
              </td>
              <td class="notify-img-responsive w-25">
                <a href="?redirect=blog" class="nav-link">
                  <img src="../assets/images/20943790.jpg" class="img-fluid d-inline rounded float-end " style="width:5rem!important;height:5rem!important;margin-top: 0.5rem;" alt="img">
                </a>
              </td>
            </tr>
            <?php 
            }}
              $stmt = $db->prepare("SELECT visible FROM commentaires WHERE CEF=:CEF and visible=1");
              try{
                $stmt->execute([":CEF"=>$_SESSION["CEF"]]);
                $commentaires = $stmt->fetchAll(PDO :: FETCH_ASSOC);
              }catch(PDOException $e){
                $commentaires = null;
              }
              if($commentaires != null){
                foreach($commentaires as $comm){
            ?>
            <tr class="table-success">
              <td>
                <a href="?redirect=blog" class="nav-link">
                  <span class="" style="text-decoration: none!important;color:black;">Votre Commentaire est visible pour le moment. Cliquez pour la voir.</span>
                </a>
              </td>
              <td class="notify-img-responsive">
                <a href="?redirect=blog" class="nav-link">
                  <img src="../assets/images/4860659.jpg" class="img-fluid d-inline rounded float-end " style="width:5rem!important;height:5rem!important;margin-top: 0.5rem;" alt="img">
                </a>
              </td>
            </tr>
          <?php
            }}
            $stmt = $db->prepare("SELECT question,answer FROM aidequestions WHERE CEF=:CEF");
            try{
              $stmt->execute([":CEF"=>$_SESSION["CEF"]]);
              $infos = $stmt->fetchAll(PDO :: FETCH_ASSOC);
            }catch(PDOException $e){
              $infos = null;
            }

          if($infos != null){
            foreach($infos as $info){
          ?>
            <tr class="table-light">
              <td>
                <a href="?redirect=aide" class="nav-link">
                  <span class="" style="text-decoration: none!important;color:black;">Nous avons répondu à votre <span class="text-decoration-underline">question</span> «<span style="color:#39B4FF;"><?php echo $info["question"] ?></span>» avec : « <span style="color:#00A613;"><?php echo $info["answer"] ?> »</span></span>
                </a>
              </td>
              <td class="notify-img-responsive">
                <a href="?redirect=aide" class="nav-link d-flex justify-content-center align-items-center">
                  <img src="../assets/images/17973872.jpg" class="img-fluid  rounded  " style="width:5rem!important;height:5rem!important;margin-top: 0.5rem;" alt="img">
                </a>
              </td>
            </tr>
            
          <?php
          }}
            $stmt = $db->prepare("SELECT message,answer FROM contactmessages WHERE CEF=:CEF");
            try{
              $stmt->execute([":CEF"=>$_SESSION["CEF"]]);
              $infos = $stmt->fetchAll(PDO :: FETCH_ASSOC);
              $infos;
            }catch(PDOException $e){
              $infos = null;
            }
            
          if($infos != null){
            foreach($infos as $info){
          ?>
          <tr class="table-secondary">
            <td>
              <a href="?redirect=contact" class="nav-link">
                <span class="" style="text-decoration: none!important;color:black;">Nous avons répondu à votre <span class="text-decoration-underline">message</span> «<span style="color:#39B4FF;"><?php echo $info["message"] ?></span>» avec : « <span style="color:#00A613;"><?php echo $info["answer"] ?> »</span></span>
              </a>
            </td>
            <td class="notify-img-responsive">
              <a href="?redirect=contact" class="nav-link">
                <img src="../assets/images/2995663.jpg" class="img-fluid d-inline rounded float-end" style="width:7rem!important;height:4rem!important;" alt="img">
              </a>
            </td>
          </tr>
          <?php
            }}
          ?>
          </table>
        </div>
      </div>
      <div class="p-4 ">
        <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
</div>