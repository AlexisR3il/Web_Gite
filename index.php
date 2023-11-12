<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/index.js" defer="defer"></script>
    <link rel="icon" type="image/x-icon" href="img/LOGO.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/media.css">
    <meta name="description" content="Découvrez le Gîte de Figuies, un havre de paix en pleine nature. Réservez votre chambre et profitez de nos équipements tout confort pour des vacances inoubliables.">
    <meta name="keywords" content="gîte, hébergement, nature, vacances, réservation en ligne, gîte de figuies">
    <title> Gîte - Home </title>
  </head>
<body>
  <header>
    <nav>
      <div class="container-img-title">
        <div class="img-gite"> <img src="img/LOGO.png" alt=""></div>
        <a href="index.php" class="logo"><span class="a1">Gîte</span> de figuies</a>
      </div>
      <ul class="">
        <li><a href="index.php"> Accueil </a></li>
        <li><a href="contact.php"> Contacts </a></li>
        <li><a href="carte.html"> Carte</a></li>
        <li><a href="calendrier.html"> Calendrier </a></li>
        <li><a href="login.php"> Connexion</a></li>
        <li class="navbtn">
          <div class="lines"></div>
          <div class="lines"></div>
          <div class="lines"></div>
        </li>
      </ul>
    </nav>
  </header>          
  <ul class="mobile-list">
    <li><a href="index.php">Accueil</a></li>
    <li><a href="contact.php">Contacts</a></li>
    <li><a href="carte.html">Carte</a></li>
    <li><a href="calendrier.html"> Calendrier </a></li>
    <li><a href="login.php"> Connexion</a></li>
  </ul>
  <section class="hero">
    <div class="cols-2">
      <h1> Envie d'air pur ? </h1>
      <?php
        include('panel_admin/connection.php');
        $query = "SELECT * FROM message_accueil";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
      ?>
      <strong class="message-bienvenue"> <?php echo $row['message'] ?> </strong>
      <?php
        include('panel_admin/connection.php');
        $query = "SELECT * FROM room_infos";
        $result = mysqli_query($con, $query);
        $nb_rows = mysqli_num_rows($result);
      ?>
      <strong class="nombre-chambre"> Encore &thinsp; <span class="nombre-chambre-nb"> <?php echo $nb_rows ?> </span> &thinsp; chambres disponibles cette semaine !</strong>
      <a href="contact.php"> Réservez dès maintenant </a>
    </div>


    <div class="cols-2">
      <?php
      $query = "SELECT image_url FROM images";
      $result = mysqli_query($con, $query);

      $images = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $images[] = 'upload/' . $row['image_url'];
      }
      ?>

      <div class="slider">
        <div class="img-box">

          <img src="<?php echo $images[0]; ?>" class="slider-img carousel-img">
          <div class="btn-conteneur">
            <button class="btn-prev" onclick="prev()">
              <span>&#9664;</span>
            </button> 
            <button class="btn-next" onclick="next()">
              <span>&#9654;</span>
            </button>
          </div>
        </div>
      </div>

      <script>
          var images = <?php echo json_encode($images); ?>;
      </script>
    </div>


  </section>
  <section class="display">
    <?php
      $query = "SELECT * FROM prix";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($result);
    ?>
    <h2> Tarifs </h2>
    <div class="boxes-card">
      <div class="boxes">
        <img src="img/icone/nuit.png">
        <h3> Nuitée Haute <br> saison </h3>
		<p> <?php echo $row['nuite_haute'] . '€' ?> </p>
      </div>
      <div class="boxes">
        <img src="img/icone/jour-et-nuit.png">
        <h3> Semaine Haute <br> saison </h3>
    <p> <?php echo $row['semaine_haute'] . '€' ?> </p>
      </div>
      <div class="boxes">
        <img src="img/icone/nuit.png">
        <h3> Nuitée Moyenne saison </h3>
    <p> <?php echo $row['nuite_moyenne'] . '€' ?> </p>
      </div>
      <div class="boxes">
        <img src="img/icone/jour-et-nuit.png">
        <h3> Semaine Moyenne saison </h3>
    <p> <?php echo $row['semaine_moyenne'] . '€' ?> </p>
      </div>
    </div>
  </section>
  <section class="display">
    <h2> Equipement et service </h2>
    <div class="boxes-card">
      <div class="boxes">
        <img src="img/icone/animaux-domestiques.png">
        <h3> Animaux autorisés </h3>
      </div>
      <div class="boxes">
        <img src="img/icone/restaurant.png">
        <h3> Terrasse </h3>
      </div>
      <div class="boxes">
        <img src="img/icone/la-tele.png">
        <h3> Télévision </h3>
      </div>
      <div class="boxes">
        <img src="img/icone/parking.png">
        <h3> Parking </h3>
      </div>
    </div>
  </section>
  <section class="how">
    <h2> Comment ça marche ?</h2>
      <div class="how-wrapper">
        <div class="boxes">
        <img src="img/icone/paiement-en-especes.png">
        <h3> Moyens de paiment </h3>
        <div>Chèques, espèces, virements</div>
      </div>
      <div class="boxes">
        <img src="img/icone/carte.png">
        <h3> Comment réserver ? </h3>
        <div>Par mail, ou en cliquant sur la page contacts</div>
      </div>
    </div>
  </section>
  <footer>
    <small> All rights Reserved GîteDeFiguies.com </small>
  </footer>
</body>
</html>