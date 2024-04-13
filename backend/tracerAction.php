<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/connexion.php';

$errorMsg = '';
$successMsg = '';

if (isset($_POST['submit'])) {
    $litres = $_POST['litres'];
    $qrcodeFile = $_FILES['qrcode']['tmp_name'];
    $tag = !empty($_POST['tag']) ? $_POST['tag'] : null; // Récupérer la tag manuellement saisie, si disponible

    // Vérifier si un QR code a été fourni
    if (!empty($qrcodeFile)) {
        // Valider le format du nom de fichier
        $file_name = $_FILES['qrcode']['name'];

        // Valider le format du nom de fichier avec une expression régulière
        if (!preg_match('/^[A-Z]\d{2}[A-Z]\d{2}\.png$/', $file_name)) {
            $errorMsg = 'Le format du nom de fichier est invalide. Utilisez le format suivant: M78N78.png';
            goto end;
        }

        // Extraire la tag du nom de fichier
        $tag = substr($file_name, 0, strpos($file_name, '.png'));
    } else {
        if (empty($tag)) { // Vérifier si la tag a été saisie manuellement si aucun fichier QR code n'a été fourni
            $errorMsg = 'Veuillez fournir un fichier QR code ou saisir une tag manuellement.';
            goto end;
        }
    }

    // Vérifier si la tag existe
    $checkTag = $conn->prepare('SELECT * FROM drivers WHERE tag = ?');
    $checkTag->execute([$tag]);
    if ($checkTag->rowCount() == 0) {
        $errorMsg = "Erreur : Tag invalide ou chauffeur introuvable.";
        goto end;
    }

    // Récupérer les informations de la voiture associée au chauffeur
    $checkCar = $conn->prepare('SELECT * FROM cars WHERE tag_driver = ?');
    $checkCar->execute([$tag]);
    if ($checkCar->rowCount() == 0) {
        $errorMsg = "Erreur : Voiture introuvable.";
        goto end;
    }

    // Récupérer les informations de la voiture
    $carInfo = $checkCar->fetch(PDO::FETCH_ASSOC);

    // Récupérer la quantité totale de litres déjà ajoutée
    $totalLitresQuery = $conn->prepare('SELECT SUM(liter) AS total_litres FROM tracer WHERE tag_driver = ?');
    $totalLitresQuery->execute([$tag]);
    $totalLitresResult = $totalLitresQuery->fetch(PDO::FETCH_ASSOC);
    $totalLitres = $totalLitresResult['total_litres'];

    // Calculer la capacité restante du réservoir
    $remainingCapacity = $carInfo['reservoir'] - $totalLitres;

    // Vérifier si le nombre de litres est autorisé
    if ($litres > $remainingCapacity) {
        $errorMsg = "Erreur : Vous ne pouvez pas ajouter plus de litres que le réservoir de votre voiture.";
        goto end;
    }

    // Générer un nom de station au hasard
    $stations = ['Station A', 'Station B', 'Station C', 'Station D'];
    $station = $stations[array_rand($stations)];

    // Récupérer la date actuelle
    $date = date("F j, Y, g:i a");

    // Insertion dans la base de données uniquement si le nombre de litres est valide
    if ($litres <= $remainingCapacity) {
        $insertTracer = $conn->prepare('INSERT INTO tracer(station, tag_driver, liter, dates) VALUES(?, ?, ?, ?)');
        if ($insertTracer->execute([$station, $tag, $litres, $date])) {
            $successMsg = "Le plein a été effectué avec succès.";
        } else {
            $errorMsg = "Erreur : Impossible d'enregistrer l'action.";
        }
    }
}

end: