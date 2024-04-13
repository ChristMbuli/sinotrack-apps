<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/connexion.php';

// Afficher les informations du chauffeur avec les informations de sa voiture
if (isset($_GET['tag']) and !empty($_GET['tag'])) {
    $driverTag = $_GET['tag'];

    // Récupérer les informations du chauffeur
    $checkExist = $conn->prepare('SELECT * FROM drivers WHERE tag = ?');
    $checkExist->execute(array($driverTag));

    if ($checkExist->rowCount() > 0) {
        $driverInfo = $checkExist->fetch(PDO::FETCH_ASSOC);

        // Récupérer les informations de la voiture associée au chauffeur
        $checkCar = $conn->prepare('SELECT * FROM cars WHERE tag_driver = ?');
        $checkCar->execute(array($driverTag));

        if ($checkCar->rowCount() > 0) {
            $carInfo = $checkCar->fetch(PDO::FETCH_ASSOC);

            // Afficher les informations du chauffeur
            $fname = htmlspecialchars($driverInfo['fname']);
            $phone = htmlspecialchars($driverInfo['phone']);
            $tag = htmlspecialchars($driverInfo['tag']);
            $profil = htmlspecialchars($driverInfo['profil']);
            $qrcode = htmlspecialchars($driverInfo['qrcode']);

            // Afficher les informations de la voiture
            $marque = htmlspecialchars($carInfo['marque']);
            $vitesse = htmlspecialchars($carInfo['vitesse']);
            $reservoir = htmlspecialchars($carInfo['reservoir']);
            $image = htmlspecialchars($carInfo['photo']);

        } else {
            $errorMsg = "Aucune voiture associée à ce chauffeur.";
        }

        //Récuperer le trafique tu chauffeur
        $checkTrafic = $conn->prepare('SELECT * FROM tracer WHERE tag_driver = ?');
        $checkTrafic->execute(array($driverTag));

        if ($checkTrafic->rowCount() > 0) {

        } else {
            $traficError = "Pas de trafic";
        }
    } else {
        $errorMsg = "Chauffeur introuvable";
    }
} else {
    $errorMsg = "Tag non spécifié";
}