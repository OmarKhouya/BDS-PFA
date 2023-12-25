<header class="px-2 sticky-top">
  <div class="container shadow rounded-bottom-4  bg-white">
      <div class="">
        <div class="navbar navbar-expand-lg"> 
          <?php if(isset($_SESSION["User"])){?>
            <div class="d-flex">
              <a href="href='?redirect=index" class="nav-link">
                <img src="../assets/images/logobds.png" class="logo-resize" style="width: 6rem;" alt="Logo">
              </a>
              <button type="button" class="btn position-relative" data-bs-toggle="modal" data-bs-target="#notification" name="Select" data-index="2" style="width:max-content;margin:auto;">
                <i class="fa-regular fa-bell fa-2x icon-resize"></i>
                <span class="position-absolute top-0 badge bg-danger" id="notification_count" style="top: -0.5rem!important;right: -0.5rem!important;"></span>
              </button>
              <button type="button" class="btn " style="margin:auto;">
                <a href="?redirect=profile" class="nav-link">
                  <i class="fa-regular fa-circle-user fa-2x icon-resize"></i>
                </a>
              </button> 
            </div>
              
          <?php }else{ ?>
            <a href="?redirect=home" >
              <img src="../assets/images/logobds.png" class="navbar-brand" style="width: 6rem;" alt="Logo">
            </a> 
          <?php } ?>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuHeader">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <nav class="navbar-collapse collapse justify-content-end" id="menuHeader">
            <?php if(!isset($_SESSION["User"])){ ?>
              <ul class="navbar navbar-nav">
                <li class="nav-item"><a href="?redirect=index" class="nav-link text-black">Accueil</a></li>
                <li class="nav-item"><a href="?redirect=login" class="nav-link text-black">Se connecter</a></li>
                <li class="nav-item border border-dark border-1 rounded-4 px-3"><a href="?redirect=signup" class="nav-link text-black ">S'inscrire</a></li>
                <li class="nav-item"><a href="?redirect=about" class="nav-link text-black">Qui sommes-nous</a></li>
                <li class="nav-item"><a href="?redirect=blog" class="nav-link text-black">Blog</a></li>
                  <!-- <li class="nav-item"><a href="?redirect=aide" class="nav-link text-black">Aide</a></li>
                  <li class="nav-item"><a href="?redirect=contact" class="nav-link text-black">Contact</a></li>
                  <li class="nav-item"><a href="?redirect=mep" class="nav-link text-black">Missions et Politiques</a></li> -->
                <li class="nav-item">
                  <div class="gtranslate_wrapper"></div>
                </li>
              </ul>
            <?php } else {?>
              <ul class="navbar-nav navbar ">
                <li class="nav-item"><a href="?redirect=home" class="nav-link text-black">Accueil</a></li>
                <li class="nav-item"><a href="?redirect=about" class="nav-link text-black">Qui sommes-nous</a></li>
                <li class="nav-item"><a href="?redirect=blog" class="nav-link text-black">Blog</a></li>
                <li class="nav-item"><a href="?redirect=vote" class="nav-link text-black">Vote</a></li><!-- 
                <li class="nav-item"><a href="?redirect=aide" class="nav-link text-black">Aide</a></li>
                <li class="nav-item"><a href="?redirect=contact" class="nav-link text-black">Contact</a></li>
                <li class="nav-item"><a href="?redirect=mep" class="nav-link text-black">Missions et Politiques</a></li> -->
                <li class="nav-item"><a href="?redirect=../config/logout_action" class="nav-link text-black">Se déconnecter</a></li>
                
                <li class="nav-item">
                  <div class="gtranslate_wrapper"></div>
                </li>
              </ul>
              
            <?php }?>
          </nav>
        </div>
      </div>
  </div>
</header>