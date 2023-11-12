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
        .edit-contact-form {
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
        $query = mysqli_query($con, "SELECT * FROM `contacts` WHERE idcontact='$id'");
        $row = mysqli_fetch_array($query);
    ?>

    <h2>Modifier Contacts</h2>
    <div class="edit-contact-form">
        <form method="POST" action="updateContacts.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input type="text" value="<?php echo $row['facebook']; ?>" name="facebook" id="facebook">
            </div>
            <div class="form-group">
                <label for="twitter">Twitter:</label>
                <input type="text" value="<?php echo $row['twitter']; ?>" name="twitter" id="twitter">
            </div>
            <div class="form-group">
                <label for="numero">Numero:</label>
                <input type="text" value="<?php echo $row['numero']; ?>" name="numero" id="numero">
            </div>
            <div class="form-group">
                <label for="mail">Mail:</label>
                <input type="text" value="<?php echo $row['mail']; ?>" name="mail" id="mail">
            </div>
            <input type="submit" name="Appliquer" value="Appliquer">
            <button><a href="admin_panel.php">Retour</a></button>
        </form>
    </div>
</body>
</html>
