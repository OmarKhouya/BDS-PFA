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
    <title>Missions et Politiques</title>
  </head>
  <body>
  <?php include '../templates/layout/header.php'; ?>
    <main>
      <div class="container my-5">
        <h1 class="p-2 text-center">
          Missions et Politiques
        </h1>
        <div class="row">
          <h2 class="col-lg-1" id="MissionetPolitiques">
            Missions
          </h2>
          <div class="col-lg-10">
            <p>
              Le Bureau des stagiaires (BDS) vise à dynamiser le monde stagiaire en créant une unité entre les stagiaires et les associations de stagiaires. Nous travaillons en étroite collaboration avec l'administration de l'établissement pour redistribuer les subventions associatives et soutenir les étudiants dans leurs projets.
            </p>
            <ol>
              <li>
                Créer une communauté de stagiaires : Le BDS a pour mission de rassembler les stagiaires et de créer un sentiment d'unité entre eux. Nous organisons des événements sociaux, des activités de team building et des rencontres pour favoriser les échanges et les interactions entre les stagiaires.
              <li>
                Faciliter l'intégration des stagiaires : Le BDS s'engage à aider les nouveaux stagiaires à s'intégrer facilement dans l'établissement en leur fournissant des informations sur l'environnement de travail et en les aidant à trouver leur place dans l'équipe.
              </li>
              <li>
                Représenter les intérêts des stagiaires : Le BDS est le représentant des stagiaires auprès de l'administration de l'établissement. Nous sommes à l'écoute des besoins et des préoccupations des stagiaires et nous les défendons auprès de l'administration.
              </li>
              <li>
                Soutenir les projets des associations de stagiaires : Le BDS est le relais entre les associations de stagiaires et l'administration de l'établissement. Nous aidons les associations de stagiaires à obtenir des subventions et nous les soutenons dans la mise en place de leurs projets.
              </li>
              <li>
                Promouvoir l'engagement et le bénévolat : Le BDS encourage les stagiaires à s'engager dans la communauté en organisant des projets de bénévolat et en travaillant en étroite collaboration avec les organisations locales. Nous offrons aux stagiaires des occasions de s'impliquer dans des projets communautaires et de développer des compétences transférables qui leur seront utiles dans leur carrière.
              </li>
            </ol>
            <p>
              En tant que BDS, nous sommes dévoués à offrir un environnement positif et enrichissant pour les stagiaires en favorisant l'intégration, la communauté et l'engagement.
            </p>
          </div>
        </div>
        <div class="d-flex justify-content-center ">
          <hr class="w-75"/>
        </div>
        <div class="row pt-3">
          <h2 class="col-lg-1" id="MissionetPolitiques">
            Politiques
          </h2>
          <div class="col-lg-10">
            <p>
              Le BDS est dédié à créer un environnement dynamique pour les stagiaires en favorisant la collaboration et l'unité entre eux. Nous organisons des événements sociaux, culturels et éducatifs pour encourager les stagiaires à se rencontrer et à partager leurs expériences. Nous encourageons également les stagiaires à s'impliquer dans les associations de stagiaires pour renforcer leur participation à la vie étudiante.
            </p>
            <ol>
              <li>
                Redistribution des subventions associatives : Le BDS est responsable de redistribuer les subventions associatives aux différentes associations de stagiaires. Nous évaluons les projets proposés par les associations et distribuons les subventions en fonction de leur mérite. Nous travaillons également en étroite collaboration avec les associations de stagiaires pour les aider à développer leurs projets.
              <li>
                Défense des intérêts des étudiants : Le BDS est engagé à défendre les intérêts des étudiants en travaillant en étroite collaboration avec l'administration de l'établissement. Nous représentons les intérêts des étudiants et communiquons avec l'administration pour résoudre les problèmes rencontrés par les étudiants. Nous encourageons également les étudiants à donner leur avis sur les politiques et les procédures de l'établissement pour améliorer leur expérience.
              </li>
              <li>
                Soutien aux projets des étudiants : Le BDS est dédié à soutenir les projets des étudiants en leur offrant des ressources et des conseils pour les aider à réaliser leurs objectifs. Nous travaillons en étroite collaboration avec les associations de stagiaires pour offrir un soutien complet aux étudiants dans leurs projets. Nous encourageons également les étudiants à prendre des initiatives et à explorer de nouvelles opportunités pour améliorer leur expérience de stage.
              </li>
              <li>
                Promouvoir l'engagement et le bénévolat : Le BDS encourage les stagiaires à s'engager dans la communauté en organisant des projets de bénévolat et en travaillant en étroite collaboration avec les organisations locales. Nous offrons aux stagiaires des occasions de s'impliquer dans des projets communautaires et de développer des compétences transférables qui leur seront utiles dans leur carrière.
              </li>
            </ol>
            <p>
              Le BDS est dédié à offrir un soutien complet aux étudiants pour leur permettre de réaliser leurs objectifs et de vivre une expérience de stage enrichissante.
            </p>
          </div>
          
        </div>
      </div>
    </main>
    <?php include '../templates/layout/notification.php'; ?>
    <?php include '../templates/layout/footer.php'; ?>
  </body>
</html>