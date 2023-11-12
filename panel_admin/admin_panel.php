<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../js/fullcalendar/lib/main.css" rel="stylesheet" />
    <script src="../js/fullcalendar/lib/main.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
    <script src="../js/calendarAdmin.js"></script>
    <link rel="stylesheet" href="../css/admin_panel.css">
    <link rel="icon" type="image/x-icon" href="../img/LOGO.png">
    <title>Gîte - Panel Admin</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['AdminLoginId'])) {
            header("location: ../login.php");
            exit();
        }
    ?>

    <h1>Bienvenue - <?php echo $_SESSION['AdminLoginId']; ?></h1>
    <div class="container">
        <div class="add-room-form">
            <form method="POST" action="addRoomInfos.php">
                <h2>Ajouter une chambre:</h2>
                <label for="room_name">Chambre:</label>
                <input type="text" name="room_name" id="room_name">
                <label for="room_price">Prix:</label>	
                <input type="text" name="room_price" id="room_price">
                <input type="submit" name="add" value="Ajouter">
            </form>
        </div>
        <div>
        <table class="room-table">
        <h2>Liste des chambres disponibles:</h2>
            <thead>
                <tr>
                    <th>Chambre</th>
                    <th>Prix</th>
                    <th>Modifier / Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include('connection.php');
                    $query = mysqli_query($con, "SELECT * FROM `room_infos`");
                    while ($row = mysqli_fetch_array($query)) {
                        echo '<tr>';
                        echo '<td>' . $row['room_name'] . '</td>';
                        echo '<td>' . $row['room_price'] . '</td>';
                        echo '<td class="edit-delete-links">
                                <a href="editRoomInfos.php?id=' . $row['roomid'] . '">Modifier</a>
                                <a href="deleteRoomInfos.php?id=' . $row['roomid'] . '">Supprimer</a>
                            </td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <table class="prix-table">
        <h2>Prix par saison:</h2>
            <tr>
                <th>Nuité haute saison</th>
                <th>Semaine haute saison</th>
                <th>Nuité moyenne saison</th>
                <th>Semaine moyenne saison</th>
                <th>Modifier</th>
            </tr>
            <?php
                    $query = "SELECT * FROM prix";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['nuite_haute'] . '</td>';
                            echo '<td>' . $row['semaine_haute'] . '</td>';
                            echo '<td>' . $row['nuite_moyenne'] . '</td>';
                            echo '<td>' . $row['semaine_moyenne'] . '</td>';
                            echo '<td><a href="editPrix.php?id=' . $row['id'] . '">Modifier</a></td>';
                            echo '</tr>';
                    }
            ?>
        </table>
    </div>

    <div>
        <table class="contact-table">
        <h2>Contacts:</h2>
            <thead>
                <tr>
                    <th>Facebook</th>
                    <th>Twitter</th>
                    <th>Numero</th>
                    <th>Mail</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM contacts";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['facebook'] . '</td>';
                            echo '<td>' . $row['twitter'] . '</td>';
                            echo '<td>' . $row['numero'] . '</td>';
                            echo '<td>' . $row['mail'] . '</td>';
                            echo '<td><a href="editContacts.php?id=' . $row['idcontact'] . '">Modifier</a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo "No contacts available.";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <table class="message-table">
        <h2>Message de bienvenue:</h2>
            <tr>
                <th>Message</th>
                <th>Modifier</th>
            </tr>
            <?php
                    $query = "SELECT * FROM message_accueil";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['message'] . '</td>';
                            echo '<td><a href="editMessage.php?id=' . $row['id'] . '">Modifier</a></td>';
                            echo '</tr>';
                    }
            ?>
        </table>
    </div>

    <div>
        <table class="mail-table">
        <h2>Messagerie:</h2>
            <tr>
                <th>nom</th>
                <th>numéro</th>
                <th>email</th>
                <th>chambre</th>
                <th>message</th>
                <th>Supprimer</th>
            </tr>
            <?php
                    $query = "SELECT * FROM forms";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['number'] . '</td>';
                            echo '<td>' . $row['mail'] . '</td>';
                            echo '<td>' . $row['room'] . '</td>';
                            echo '<td>' . $row['message'] . '</td>';
                            echo '<td><a href="deleteMail.php?id=' . $row['id'] . '">Supprimer</a></td>';
                            echo '</tr>';
                    }
            ?>
        </table>
    </div>

    <div>
        <table class="image-table">
        <h2>Liste des images du carousel:</h2>
            <thead>
                <tr>
                    <th>Images</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <ibody>
                <?php 
                $query = "SELECT * FROM images ORDER BY id DESC";
                $result = mysqli_query($con,  $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($images = mysqli_fetch_assoc($result)) {  ?>
                    
                    <?php echo '<tr>'; ?>
                    <?php echo '<td>'; ?> <div class="alb"> <img src="../upload/<?=$images['image_url']?>"> </div> </td> 
                    <?php echo '<td><a href="deleteImage.php?id=' . $images['id'] . '">Supprimer</a></td>'; ?>
                    </tr>
                          
                 <?php } }?>
                
            </ibody>
        </table>

        <h2>Ajouter une image:</h2>

        <?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
        <?php endif ?>
        
        <form action="upload_image.php"
            method="post"
            enctype="multipart/form-data">

            <input type="file" 
                    name="my_image">

            <input type="submit" 
                    name="submit"
                    value="Upload">
            
        </form>
    </div>

    <div>
        <table class="calendar-table">
        <h2><br>Calendrier des réservations:</br></h2>
   		<div id="calendar"></div>
        </table>
  	</div>
</div>
<button class="home-button"><a href="../index.php">Accueil</a></button>
    </div>
</body>
</html>
