<?php

include_once __DIR__ . '/src/bootstrap.php';
include_once __DIR__ . '/config/database.php';
include_once __DIR__ . '/src/libs/connection.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COSMOS X DOC</title>

  <link rel="stylesheet" href="./asset/css/swiper-bundle.css">
  <link rel="stylesheet" href="./asset/css/seting.css">
  <link rel="stylesheet" href="./asset/css/styles.css">


  <script src="./asset/js/script.js" defer></script>


</head>

<body>
  <!-- Header -->
  <header>
    <!-- <div class="logo">COSMOS X DOC</div> -->

    <div class="header">
      <div class="header-logo">
        <a href="/index.php">
          <img src="./image/logo.png" alt="logo">
        </a>
      </div>
      <nav>

        <ul>
          <li><a href="./index.php">Accueil</a></li>

          <li class="nav-dropdown">
            <a href="#">Licence</a>
            <ul class="dropdown">
              <li><a href="./public/documents.php?niveau=licence1">Licence 1</a></li>
              <li><a href="./public/documents.php?niveau=licence2">Licence 2</a></li>
              <li><a href="./public/documents.php?niveau=licence3">Licence 3</a></li>
            </ul>
          </li>
          <li class="nav-dropdown">
            <a href="#">Master</a>
            <ul class="dropdown">
              <li><a href="./public/documents.php?niveau=master1">Master 1</a></li>
              <li><a href="./public/documents.php?niveau=master2">Master 2</a></li>
            </ul>
          </li>
          <li><a href="#">Contact</a></li>

        </ul>
      </nav>
      <div class="initiale">
        <li><a href="#">HK</a></li>
      </div>
    </div>
  </header>

  <div class="swiper Slider">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <!-- slide 1 -->
        <div class="content">
          <div class="information" data-swiper-parallax="-200%">

            <div class="head" data-swiper-parallax="-200%">
              <h1>Bienvenue sur COSMOS X DOCS</h1>
            </div>
            <div class="info">
              <h2>© 2024</h2>
              <h1>La plateforme pour trouver des ressources pédagogiques pour vos études.</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <!-- slide 2 -->
        <div class="content content2">
          <div class="information" data-swiper-parallax="-200%">
            <div class="head" data-swiper-parallax="-200%">
              <h1>Télécharger vos cours ,les anciens épreuves</h1>
            </div>
            <div class="info">
              <h1>& documents supplémentaires .</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <!-- slide 3 -->
        <div class="content content3">
          <div class="information" data-swiper-parallax="-200%">
            <div class="info">
              <h2>COURS</h2>
              <h1>EXERCICES</h1>
            </div>
            <div class="head" data-swiper-parallax="-200%">
              <h1>Licence - Master</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <!-- slide 4 -->
        <div class="content content4">
          <div class="information" data-swiper-parallax="-200%">
            <div class="info">
              <h2>Des cours &</h2>
              <h1>EXERCICES</h1>
            </div>
            <div class="head" data-swiper-parallax="-200%">
              <h1>Libres de droit</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <!-- slide 5 -->
        <div class="content content5">
          <div class="information" data-swiper-parallax="-200%">
            <div class="info">
              <h2>© 2024</h2>
              <h1>Branding</h1>
            </div>
            <div class="head" data-swiper-parallax="-200%">
              <h1>Headphone</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <!-- slide 6 -->
        <div class="content content6">
          <div class="information" data-swiper-parallax="-200%">
            <div class="info">
              <h2>© 2024</h2>
              <h1>Branding</h1>
            </div>
            <div class="head" data-swiper-parallax="-200%">
              <h1>Table Lamp</h1>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="swiper-button-prev swiper_arrow swiper_arrow_prev"><img src="./image/left-arrow.png" alt=""></div>
    <div class="swiper-button-next swiper_arrow swiper_arrow_next"><img src="./image/right-arrow.png" alt=""></div>
  </div>

  <!-- <div class="stats bannier"></div> -->
  <!-- Main -->
  <main>
    <h1 class="titre">Explore vos cours</h1>
    <section class="section">

      <div class="tabs">
        <button class="tab active" data-category="mathematiques">Mathématiques</button>
        <button class="tab" data-category="informatiques">Informatiques</button>
        <button class="tab" data-category="reseaux">Réseaux</button>
        <button class="tab" data-category="physique">Physique</button>
        <button class="tab" data-category="systemes">Systèmes d'Exploitation</button>
        <button class="tab" data-category="technique">Technique Français</button>
        <button class="tab" data-category="anglais">Anglais</button>
        <button class="tab" data-category="acso">Acso</button>
        <button class="tab" data-category="devweb">Dev Web</button>
      </div>
      <div class="courses carte">
        <div class="course-card" data-category="mathematiques">
          <img src="./image/ei_1715352564538-removebg-preview.png" alt="PDF Icon">
          <h3>Cours de Mathématiques</h3>
          <p>Cours de Mathématiques sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="mathematiques">
          <img src="pdf-icon.png" alt="PDF Icon">
          <h3>Cours de Mathématiques</h3>
          <p>Cours de Mathématiques sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="mathematiques">
          <img src="./pdf-icon.png" alt="PDF Icon">
          <h3>Cours de Mathématiques</h3>
          <p>Cours de Mathématiques sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="mathematiques">
          <img src="pdf-icon.png" alt="PDF Icon">
          <h3>Cours de Mathématiques</h3>
          <p>Cours de Mathématiques sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="mathematiques">
          <img src="pdf-icon.png" alt="PDF Icon">
          <h3>Cours de Mathématiques</h3>
          <p>Cours de Mathématiques sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="mathematiques">
          <img src="pdf-icon.png" alt="PDF Icon">
          <h3>Cours de Mathématiques</h3>
          <p>Cours de Mathématiques sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="informatiques">
          <img src="pdf-icon.png" alt="PDF Icon">
          <h3>Cours d'Informatique</h3>
          <p>Cours d'Informatique sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="reseaux">
          <img src="pdf-icon.png" alt="PDF Icon">
          <h3>Cours de Réseaux</h3>
          <p>Cours de Réseaux sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="physique">
          <img src="pdf-icon.png" alt="PDF Icon">
          <h3>Cours de Physique</h3>
          <p>Cours de Physique sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="systemes">
          <img src="pdf-icon.png" alt="PDF Icon">
          <h3>Cours de Systèmes d'Exploitation</h3>
          <p>Cours de Systèmes d'Exploitation sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="technique">
          <img src="pdf-icon.png" alt="PDF Icon">
          <h3>Cours de Technique Français</h3>
          <p>Cours de Technique Français sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="anglais">
          <img src="pdf-icon.png" alt="PDF Icon">
          <h3>Cours d'Anglais</h3>
          <p>Cours d'Anglais sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="acso">
          <img src="pdf-icon.png" alt="PDF Icon">
          <h3>Cours d'Acso</h3>
          <p>Cours d'Acso sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
        <div class="course-card" data-category="devweb">
          <img src="pdf-icon.png" alt="PDF Icon">
          <h3>Cours de Dev Web</h3>
          <p>Cours de Dev Web sur le régime sinusoïdale</p>
          <a href="">Télécharger</a>
        </div>
      </div>

      <div class="stats">
        <div class="black-layer">
          <div class="stat-item">
            <span class="stat-number" id="stat1">45,2k</span>
            <span class="stat-description">Etudiant inscrit</span>
          </div>
          <div class="stat-item">
            <span class="stat-number" id="stat2">500</span>
            <span class="stat-description">Cours divers</span>
          </div>
          <div class="stat-item">
            <span class="stat-number" id="stat3">+369</span>
            <span class="stat-description">Epreuves & Support</span>
          </div>
          <div class="stat-item">
            <span class="stat-number" id="stat4">100%</span>
            <span class="stat-description">Satisfaction</span>
          </div>
        </div>
      </div>

      <div class="testimonials">
        <div class="add-temoiniage">
          <h2 class="titre">Témoignages :</h2>
          <p class="text">Les témoignages des étudiants <br>qui ont visité notre plateforme</p>
          <button class="testimony-btn" onclick="document.getElementById('id01').style.display='block'">Ajouter +</button>

          <!-- The Modal -->
          <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span><!-- Modal Content -->
            <form class="modal-content animate" action="index.php" method="post">

              <div class="container">

                <label for="Firstname"><b>Prénom :</b></label>
                <input type="text" name="firstName" id="prenom" placeholder="Entré votre Prénom">
                <label for="lastename"><b>Nom :</b></label>
                <input type="text" placeholder="Entré votre Nom" name="lastName" required>

                <label for="Content"><b>Commentaire :</b></label>
                <textarea name="Content" id="Content" placeholder="votre Commentaire" required></textarea>

                <button class="btn-Modal" type="submit">Commenter</button>

              </div>

              <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Quitté</button>

              </div>
            </form>
          </div>
        </div>


        <div class="testimonials-slider">
          <?php foreach ($testimonials as $testimonial) : ?>
            <div class="card">
              <!-- style="color:  //htmlspecialchars($testimonial['icon_color']) ?>" -->
              <div class="card-header">
                <div class="icon green">
                  <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                  </svg>

                </div>
                <svg xmlns="http://www.w3.org/2000/svg" height="55" width="50" fill="currentColor" class="bi bi-quote" viewBox="0 0 46.195 46.195" transform="rotate(180)">
                  <g id="SVGRepo_bgCarrier" stroke-width="0" />
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                  <g id="SVGRepo_iconCarrier">
                    <g>
                      <path style="fill:currentColor;" d="M35.765,8.264c-5.898,0-10.555,4.782-10.555,10.68s4.844,10.68,10.742,10.68 c0.059,0,0.148-0.008,0.207-0.009c-2.332,1.857-5.261,2.976-8.467,2.976c-1.475,0-2.662,1.196-2.662,2.67s0.949,2.67,2.424,2.67 c10.469-0.001,18.741-8.518,18.741-18.987c0-0.002,0-0.004,0-0.007C46.195,13.042,41.661,8.264,35.765,8.264z" />
                      <path style="fill:currentColor;" d="M10.75,8.264c-5.898,0-10.563,4.782-10.563,10.68s4.84,10.68,10.739,10.68 c0.059,0,0.146-0.008,0.205-0.009c-2.332,1.857-5.262,2.976-8.468,2.976C1.188,32.591,0,33.787,0,35.261s0.964,2.67,2.439,2.67 c10.469-0.001,18.756-8.518,18.756-18.987c0-0.002,0-0.004,0-0.007C21.195,13.042,16.646,8.264,10.75,8.264z" />
                    </g>
                  </g>
                </svg>
              </div>

              <h3><?= htmlspecialchars($testimonial['firstName']) . ' ' . htmlspecialchars($testimonial['lastName']) ?></h3>
              <p><?= htmlspecialchars($testimonial['Content']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- <div class="card">

            <div class="card-header">
              <div class="icon green">
                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>

              </div>
              <svg xmlns="http://www.w3.org/2000/svg" height="55" width="50" fill="currentColor" class="bi bi-quote" viewBox="0 0 46.195 46.195" transform="rotate(180)">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                  <g>
                    <path style="fill:currentColor;" d="M35.765,8.264c-5.898,0-10.555,4.782-10.555,10.68s4.844,10.68,10.742,10.68 c0.059,0,0.148-0.008,0.207-0.009c-2.332,1.857-5.261,2.976-8.467,2.976c-1.475,0-2.662,1.196-2.662,2.67s0.949,2.67,2.424,2.67 c10.469-0.001,18.741-8.518,18.741-18.987c0-0.002,0-0.004,0-0.007C46.195,13.042,41.661,8.264,35.765,8.264z" />
                    <path style="fill:currentColor;" d="M10.75,8.264c-5.898,0-10.563,4.782-10.563,10.68s4.84,10.68,10.739,10.68 c0.059,0,0.146-0.008,0.205-0.009c-2.332,1.857-5.262,2.976-8.468,2.976C1.188,32.591,0,33.787,0,35.261s0.964,2.67,2.439,2.67 c10.469-0.001,18.756-8.518,18.756-18.987c0-0.002,0-0.004,0-0.007C21.195,13.042,16.646,8.264,10.75,8.264z" />
                  </g>
                </g>
              </svg>
            </div>

            <h3>Malick Sy</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipiscing elit. Ipsa corporis voluptatum quam dolores voluptatem placeat error id</p>
          </div>

          <div class="card">

            <div class="card-header">
              <div class="icon orange"> <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" height="55" width="50" fill="currentColor" class="bi bi-quote" viewBox="0 0 46.195 46.195" transform="rotate(180)">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                  <g>
                    <path style="fill:currentColor;" d="M35.765,8.264c-5.898,0-10.555,4.782-10.555,10.68s4.844,10.68,10.742,10.68 c0.059,0,0.148-0.008,0.207-0.009c-2.332,1.857-5.261,2.976-8.467,2.976c-1.475,0-2.662,1.196-2.662,2.67s0.949,2.67,2.424,2.67 c10.469-0.001,18.741-8.518,18.741-18.987c0-0.002,0-0.004,0-0.007C46.195,13.042,41.661,8.264,35.765,8.264z" />
                    <path style="fill:currentColor;" d="M10.75,8.264c-5.898,0-10.563,4.782-10.563,10.68s4.84,10.68,10.739,10.68 c0.059,0,0.146-0.008,0.205-0.009c-2.332,1.857-5.262,2.976-8.468,2.976C1.188,32.591,0,33.787,0,35.261s0.964,2.67,2.439,2.67 c10.469-0.001,18.756-8.518,18.756-18.987c0-0.002,0-0.004,0-0.007C21.195,13.042,16.646,8.264,10.75,8.264z" />
                  </g>
                </g>
              </svg>
            </div>
            <h3>Habib Kane</h3>
            <p>Je suis ravie de ce progré maintenant je ne vais plus courrire dérriere mes ennée pour des documment de leur année. merci et bon courage</p>
          </div>

          <div class="card">

            <div class="card-header">
              <div class="icon purple">
                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" height="55" width="50" fill="currentColor" class="bi bi-quote" viewBox="0 0 46.195 46.195" transform="rotate(180)">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                  <g>
                    <path style="fill:currentColor;" d="M35.765,8.264c-5.898,0-10.555,4.782-10.555,10.68s4.844,10.68,10.742,10.68 c0.059,0,0.148-0.008,0.207-0.009c-2.332,1.857-5.261,2.976-8.467,2.976c-1.475,0-2.662,1.196-2.662,2.67s0.949,2.67,2.424,2.67 c10.469-0.001,18.741-8.518,18.741-18.987c0-0.002,0-0.004,0-0.007C46.195,13.042,41.661,8.264,35.765,8.264z" />
                    <path style="fill:currentColor;" d="M10.75,8.264c-5.898,0-10.563,4.782-10.563,10.68s4.84,10.68,10.739,10.68 c0.059,0,0.146-0.008,0.205-0.009c-2.332,1.857-5.262,2.976-8.468,2.976C1.188,32.591,0,33.787,0,35.261s0.964,2.67,2.439,2.67 c10.469-0.001,18.756-8.518,18.756-18.987c0-0.002,0-0.004,0-0.007C21.195,13.042,16.646,8.264,10.75,8.264z" />
                  </g>
                </g>
              </svg>
            </div>

            <h3>Nafisatou Diop</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipiscing elit. Ipsa corporis voluptatum quam dolores voluptatem placeat error id</p>
          </div>

          <div class="card">

            <div class="card-header">
              <div class="icon purple">
                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" height="55" width="50" fill="currentColor" class="bi bi-quote" viewBox="0 0 46.195 46.195" transform="rotate(180)">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                  <g>
                    <path style="fill:currentColor;" d="M35.765,8.264c-5.898,0-10.555,4.782-10.555,10.68s4.844,10.68,10.742,10.68 c0.059,0,0.148-0.008,0.207-0.009c-2.332,1.857-5.261,2.976-8.467,2.976c-1.475,0-2.662,1.196-2.662,2.67s0.949,2.67,2.424,2.67 c10.469-0.001,18.741-8.518,18.741-18.987c0-0.002,0-0.004,0-0.007C46.195,13.042,41.661,8.264,35.765,8.264z" />
                    <path style="fill:currentColor;" d="M10.75,8.264c-5.898,0-10.563,4.782-10.563,10.68s4.84,10.68,10.739,10.68 c0.059,0,0.146-0.008,0.205-0.009c-2.332,1.857-5.262,2.976-8.468,2.976C1.188,32.591,0,33.787,0,35.261s0.964,2.67,2.439,2.67 c10.469-0.001,18.756-8.518,18.756-18.987c0-0.002,0-0.004,0-0.007C21.195,13.042,16.646,8.264,10.75,8.264z" />
                  </g>
                </g>
              </svg>
            </div>

            <h3>Nafisatou Diop</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipiscing elit. Ipsa corporis voluptatum quam dolores voluptatem placeat error id</p>
          </div>
        </div> -->

    </section>

    <!-- Bio-Profil -->

    <section class="sec-bio">
      <div class="profile"><img src="./image/profile.jpg" alt=""></div>
      <div class="bio">
        <h2>M.Ndiaye</h2>
        <span>Etudiant en Informatique</span><br>
        <p>Hello hello! je me nomme Cheikh NDIAYE,devolopeure Frontend et fondateur du Cosmos x . Depuis toujours j'aime partager l'information avec mes amis,
          C'est pour ça j'ai créé ce site pour toucher tout le monde.
          Je vous aime. <em>[MERCI POUR VOS COMMENTAIRE]</em> </p>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">

      <div class="footer-section">
        <div class="footer-logo">
          <a href="/index.php">
            <img src="./image/logo.png" alt="">
          </a>
        </div>

        <div class="social-icons">
          <strong>Suivez-nous :</strong>
          <a href="#" title="Télégram">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-telegram" viewBox="0 0 50 50">
              <path d="M46.137,6.552c-0.75-0.636-1.928-0.727-3.146-0.238l-0.002,0C41.708,6.828,6.728,21.832,5.304,22.445	c-0.259,0.09-2.521,0.934-2.288,2.814c0.208,1.695,2.026,2.397,2.248,2.478l8.893,3.045c0.59,1.964,2.765,9.21,3.246,10.758	c0.3,0.965,0.789,2.233,1.646,2.494c0.752,0.29,1.5,0.025,1.984-0.355l5.437-5.043l8.777,6.845l0.209,0.125	c0.596,0.264,1.167,0.396,1.712,0.396c0.421,0,0.825-0.079,1.211-0.237c1.315-0.54,1.841-1.793,1.896-1.935l6.556-34.077	C47.231,7.933,46.675,7.007,46.137,6.552z M22,32l-3,8l-3-10l23-17L22,32z"></path>
            </svg></a>

          <a href="#" title="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
            </svg></a>

          <a href="#" title="Whatsapp"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
              <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
            </svg></a>
        </div>
      </div>


      <div class="footer-section ">
        <h4>Contact :</h4>

        <div class="infos">
          <i class="fa fa-phone">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
            </svg>
          </i>
          <p> +221 77 000 00 00</p>
        </div>


        <div class="infos">
          <i> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
              <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
            </svg> </i>
          <p style="position: relative;left: 13px;"> contact12@gmail.com</p>
        </div>


        <div class="infos">
          <i class="fa fa-map-marker">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" viewBox="0 0 24 24">
              <path d="m12 2c-3.3 0-6 2.7-6 6 0 5.2 6 11.1 6 11.1s6-6 6-11.1c0-3.3-2.7-6-6-6zm0 3.9c1.1 0 2.1 1 2.1 2.1 0 1.2-.9 2.1-2.1 2.1s-2.1-1-2.1-2.1c0-1.2 1-2.1 2.1-2.1zm-5.2 9.2c-1.3.3-2.3.6-3.2 1-.4.2-.8.5-1.1.8s-.5.9-.5 1.4c0 .8.5 1.4 1.1 1.8s1.3.7 2.2 1c1.8.6 4.1.9 6.7.9s4.9-.3 6.7-.8c.9-.3 1.6-.6 2.2-1s1.1-1 1.1-1.8c0-1-.8-1.7-1.6-2.2s-1.9-.8-3.2-1l-.3 2c1.1.2 2 .5 2.6.8.4.2.5.4.6.4 0 0-.1.1-.2.2-.3.2-.9.5-1.6.7-1.7.4-3.9.7-6.3.7s-4.6-.3-6.1-.8c-.7-.2-1.3-.5-1.6-.7-.1-.1-.2-.2-.2-.2.1-.1.2-.2.5-.4.6-.3 1.5-.6 2.7-.8z" />
              <path d="m0 0h24v24h-24z" fill="none" />
            </svg></i>
          <p style="position: relative; right: 14px;"> Sénégal, Thiès</p>
        </div>

      </div>

      <div class="footer-section">
        <h4>Abonnez-vous :</h4>
        <p>Ne raté pas nos prochaine dépos.</p>
        <div class="formLetter">
          <form>
            <input type="email" placeholder="New letter :">
            <button type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
              </svg>
            </button>
          </form>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <strong>Copyright &#169 <?= date('Y') ?> Cosmos x. Tous droits réservés.</strong>
    </div>
  </footer>

  <script>

  </script>
  <script src="./asset/js/swiper-bundle.min.js"></script>



</body>

</html>