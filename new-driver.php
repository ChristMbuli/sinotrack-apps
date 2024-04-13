<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require ("./backend/addAction.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SinoTrack</title>
</head>

<body>

    <a href="index.php">Accueil</a>
    <a href="new-driver.php" style="margin-left: 1rem;color:black;">Ajouter un chauffeur</a>
    <a href="list-driver.php" style="margin-left: 1rem;">Liste des chauffeurs</a>

    <hr>

    <h1>Ajouter un chauffeur et sa voiture</h1>
    <br>
    <?php if (isset($errorMsg)) { ?>
    <p style="color: red;"><?= $errorMsg ?></p>
    <?php } elseif (isset($successMsg)) { ?>
    <p style="color: green;"><?= $successMsg ?></p>
    <?php } ?>
    <form method="post" enctype="multipart/form-data">
        <span>information Chauffeur</span>
        <br><br>
        <input type="text" name="fname" placeholder="nom complet chauffeur">
        <br><br>
        <input type="number" name="phone" placeholder="numéro chauffeur">
        <br><br>
        <input type="file" name="profil" placeholder="profil chauffeur">
        <br><br>
        <hr>
        <span>information de sa voiture</span><br><br>
        <input type="text" name="marque" placeholder="marque du vehicule">
        <br><br>
        <input type="number" name="vitesse" placeholder="vitesse du vehicule">
        <br><br>
        <input type="number" name="reservoir">
        <br><br>
        <input type="file" name="photo">
        <br><br>
        <button type="submit" name="save">Sauvegarder</button>
    </form>



</body>

</html>