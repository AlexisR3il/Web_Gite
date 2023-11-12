<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/index.js" defer="defer"></script>
    <link rel="icon" type="image/x-icon" href="img/LOGO.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/media.css">
    <title> Gîte - Contacts </title>
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
        <li><a href="carte.html"> Carte </a></li>
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

  <section class="contact-wrapper">
    <div class="cols-2">
      <form method="POST" action="contact/insertForm.php">
        <h3> Formulaire de contact </h3>
        <input type="name" placeholder="Nom..." required name="name" id="name" value="">
        <input type="number" placeholder="Numéro de téléphone..." required name="number" id="number" value="">
        <input type="email" placeholder="Email..." required name="mail" id="mail" value="">
        <?php
        include('panel_admin/connection.php');
        $query = "SELECT * FROM room_infos";
        $result = mysqli_query($con, $query);
        ?>
        <select class="dropdown-list" name="room" id ="room-select" required>
          <option style="display:none;" value=""> Selectionnez une chambre... </option>
          <?php
          while($row = mysqli_fetch_array($result))
          {
            ?>
            <option><?php echo $row['room_name']; ?></option>
            <?php
          }
          ?>
          </select>
        <textarea type="text" placeholder="Message..." required name="message" id="message" value=""></textarea>
        <button type="submit" class="submit" name="Appliquer"> Envoyer </button>
      </form>
    </div>

    <?php
      include('panel_admin/connection.php');
      $query = "SELECT * FROM contacts";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_assoc($result);
    ?>

    <div class="cols-2">
      
      <div class="box">
        <table>
            <td> Facebook: </td>
            <td> <?php echo $row['facebook'] ?> </td>
          </tr>
          <tr>
            <td> Twitter: </td>
            <td> <?php echo $row['twitter'] ?></td>
          </tr>
          <tr>
            <td> Email: </td>
            <td> <?php echo $row['mail'] ?> </td>
          </tr>
          <tr>
            <td> Number: </td>
            <td> <?php echo $row['numero'] ?> </td>
          </tr>
        </table>
      </div>
    </div>

  </section>
  <footer>
    <small> All rights Reserved GîteDeFiguies.com </small>
  </footer>
</body>
</html>