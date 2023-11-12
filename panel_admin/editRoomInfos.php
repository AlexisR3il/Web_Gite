<!DOCTYPE html>
<html>
<head>
    <title>Modifier les informations de la chambre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        .edit-room-form {
            max-width: 400px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
        include('connection.php');
        $id = $_GET['id'];
        $query = mysqli_query($con, "SELECT * FROM `room_infos` WHERE roomid='$id'");
        $row = mysqli_fetch_array($query);
    ?>

    <h2>Mofifier les Informations de la chambre</h2>
    <div class="edit-room-form">
        <form method="POST" action="updateRoomInfos.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="room_name">Chambre:</label>
                <input type="text" value="<?php echo $row['room_name']; ?>" name="room_name" id="room_name">
            </div>
            <div class="form-group">
                <label for="room_price">Prix:</label>
                <input type="text" value="<?php echo $row['room_price']; ?>" name="room_price" id="room_price">
            </div>
            <input type="submit" name="Appliquer" value="Appliquer">
            <button><a href="admin_panel.php">Retour</a></button>
        </form>
    </div>
</body>
</html>
