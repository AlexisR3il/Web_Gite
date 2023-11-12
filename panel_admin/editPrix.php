<!DOCTYPE html>
<html>
<head>
    <title>Modifier les prix</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        .edit-prix-form {
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
        $query = mysqli_query($con, "SELECT * FROM `prix` WHERE id='$id'");
        $row = mysqli_fetch_array($query);
    ?>

    <h2>Modifier les prix</h2>
    <div class="edit-prix-form">
        <form method="POST" action="updatePrix.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="nuite_haute">Nuité Haute:</label>
                <input type="text" value="<?php echo $row['nuite_haute']; ?>" name="nuite_haute" id="nuite_haute">
            </div>
            <div class="form-group">
                <label for="semaine_haute">Semaine Haute:</label>
                <input type="text" value="<?php echo $row['semaine_haute']; ?>" name="semaine_haute" id="semaine_haute">
            </div>
            <div class="form-group">
                <label for="nuite_moyenne">Nuité Moyenne:</label>
                <input type="text" value="<?php echo $row['nuite_moyenne']; ?>" name="nuite_moyenne" id="nuite_moyenne">
            </div>
            <div class="form-group">
                <label for="semaine_moyenne">Semaine Moyenne:</label>
                <input type="text" value="<?php echo $row['semaine_moyenne']; ?>" name="semaine_moyenne" id="semaine_moyenne">
            </div>
            <input type="submit" name="Appliquer" value="Appliquer">
            <button><a href="admin_panel.php">Retour</a></button>
        </form>
    </div>
</body>
</html>
