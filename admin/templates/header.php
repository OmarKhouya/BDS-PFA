<header class="shadow mb-4 sticky-top bg-white container rounded-4">
    <nav class="navbar text-dark">
      <div class="container-fluid">
        <div class="d-flex">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">
                <span class="fa fa-bars"></span>
            </button>
            <ul class="nav" style="margin:6.4px 0%;" id="navShortCuts">
                <li class="list-group-item"><a href="?redirect=index" class="nav-link text-black">Accueil</a></li>
                <li class="list-group-item"><a href="?redirect=../../config/logout_action" class="nav-link text-black">Se déconnecter</a></li>
            </ul>
        </div>
        <a href="?redirect=index">
            <img src="../../assets/images/logobds.png" class="navbar-brand" style="width: 6rem;" alt="Logo">
        </a>
      </div>
    </nav>
</header>

<aside class="offcanvas offcanvas-start" tabindex="-1" id="sidebar">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="list-group">
      <li class="list-group-item"><a href="?redirect=index" class="nav-link text-black"><i class="fa-solid fa-house"></i> Accueil</a></li>
      <li class="list-group-item"><a href="?redirect=actualites" class="nav-link text-black"><i class="fa-regular fa-newspaper"></i> Gérer les actualités</a></li>
      <li class="list-group-item"><a href="?redirect=admins" class="nav-link text-black"><i class="fa-solid fa-toolbox"></i> Gérer les administrateurs</a></li>
      <li class="list-group-item"><a href="?redirect=stagiaires" class="nav-link text-black"><i class="fa-solid fa-graduation-cap"></i> Gérer les stagiaires</a></li>
      <li class="list-group-item"><a href="?redirect=video" class="nav-link text-black"><i class="fa-solid fa-play"></i> Gérer les vidéos</a></li>
      <li class="list-group-item"><a href="?redirect=blog" class="nav-link text-black"><i class="fa-solid fa-blog"></i> Gérer les blogs</a></li>
      <li class="list-group-item"><a href="?redirect=galerie" class="nav-link text-black"><i class="fa-regular fa-images"></i> Gérer la galerie</a></li>
      <li class="list-group-item"><a href="?redirect=questions" class="nav-link text-black"><i class="fa-solid fa-clipboard-question"></i> Gérer les questions</a></li>
      <li class="list-group-item"><a href="?redirect=messages" class="nav-link text-black"><i class="fa-solid fa-message"></i> Gérer les messages</a></li>
      <li class="list-group-item"><a href="?redirect=vote" class="nav-link text-black"><i class="fa-solid fa-square-poll-vertical"></i> Gérer les votes</a></li>
      <li class="list-group-item"><a href="?redirect=../../config/logout_action" class="nav-link text-black"><i class="fa-solid fa-right-from-bracket"></i> Se déconnecter</a></li>
      <li class="list-group-item">
        <div class="gtranslate_wrapper"></div>
      </li>
    </ul>
  </div>
</aside>