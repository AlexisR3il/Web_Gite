<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="js/alexis.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/index.js" defer="defer"></script>
    <link rel="icon" type="image/x-icon" href="img/LOGO.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/carte.css">
    <link rel="stylesheet" href="css/login.css">
    <title> Gîte - Connexion </title>
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

  <div class ="conteneur-login">
  <div class="login-form">
    <h2>CONNEXION ADMIN</h2>
    <form method="POST">
        <div class="input-field">
            <img src="img/icone/user-icon.png">
            <input type="text" placeholder="Nom de l'Administrateur" name="AdminName">
        </div>
        <div class="input-field">
            <img src="img/icone/pwd-icon.png">
            <input type="password" placeholder="Mot de passe" name="AdminPassword">
        </div>
        
        <button type="submit" class="btn btn-primary" name="Signin">Connexion</button>

    </form>
  </div>
  </div>

  <?php
  require("panel_admin/connection.php");

  if(isset($_POST['Signin']))
  {
      $query="SELECT * FROM admin_login WHERE Admin_Name='$_POST[AdminName]' AND Admin_Password='$_POST[AdminPassword]'";

      if($result=mysqli_query($con, $query))
      {
          if(mysqli_num_rows($result)==1)
          {
            session_start();
            $_SESSION['AdminLoginId']=$_POST['AdminName'];
            header("location: panel_admin/admin_panel.php");
          }
          else
          {
              echo "<script>alert('incorrect password');</script>";
          }
      }
      else
      {
          echo "<script>alert('Error while trying to execute the query');</script>";
      }
  }

  ?>
  
  <footer>
    <small> All rights Reserved GîteDeFiguies.com </small>
  </footer>
</body>
</html>
