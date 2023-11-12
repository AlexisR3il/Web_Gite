<!DOCTYPE html>
<html>
<head>
    <title>Modifier les contacts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        .edit-message-form {
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
        $query = mysqli_query($con, "SELECT * FROM `message_accueil` WHERE id='$id'");
        $row = mysqli_fetch_array($query);
    ?>

    <h2>Modifier le message</h2>
    <div class="edit-message-form">
        <form method="POST" action="updateMessage.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="message">Message:</label>
                <input type="text" value="<?php echo $row['message']; ?>" name="message" id="message">
            </div>

            <input type="submit" name="Appliquer" value="Appliquer">
            <button><a href="admin_panel.php">Retour</a></button>
        </form>
    </div>
</body>
</html>
