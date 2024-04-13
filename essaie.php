<?php
require './backend/vendor/autoload.php';

use PHPZxing\PHPZxingDecoder;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["qrcode"])) {
    try {
        // Chemin temporaire du fichier image du QR code
        $imagePath = $_FILES["qrcode"]["tmp_name"];

        // Créer un lecteur QR
        $qrReader = new PHPZxingDecoder();

        // Lire le contenu du QR code à partir de l'image
        $qrData = $qrReader->decode($imagePath);

        // Afficher les données du QR code
        if ($qrData->isFound()) {
            $qrValue = $qrData->getImageValue();
            $qrFormat = $qrData->getFormat();
            $qrType = $qrData->getType();

            echo "Les informations du QR code sont : $qrValue";
        } else {
            echo "Aucun QR code trouvé dans l'image.";
        }
    } catch (\Throwable $e) {
        // Gérer les erreurs
        echo "Erreur lors de la lecture du QR code : " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Reader (File Input)</title>
</head>

<body>
    <h3>Extraire les informations du QR code</h3>
    <form enctype="multipart/form-data" method="post">
        <input type="file" name="qrcode" accept="image/*">
        <hr>
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>