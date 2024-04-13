<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=test;charset=utf8;', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion: ' . $e->getMessage());
}

if (isset($_POST['send'])) {
    if (!empty($_FILES['qrcode']['name'])) { // Vérifie si un fichier a été envoyé
        $file_name = $_FILES['qrcode']['name'];

        // Valider le format du nom de fichier avec une expression régulière
        if (preg_match('/^[A-Z]\d{2}[A-Z]\d{2}\.png$/', $file_name)) {
            $matricule = substr($file_name, 0, strpos($file_name, '.png')); // Extraire le matricule avant ".png"

            $date = date('Y-m-d');
            $stmt = $conn->prepare('INSERT INTO tags (tag, createdat) VALUES (:tag, :date)');
            $stmt->bindParam(':tag', $matricule);
            $stmt->bindParam(':date', $date);
            $stmt->execute();

            echo "Matricule inséré avec succès: $matricule";
        } else {
            echo 'Le format du nom de fichier est invalide. Utilisez le format suivant: M78N78.png';
        }
    } else {
        echo 'Insérer un fichier';
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
    <h3>Extraire la propriété des QR codes</h3>
    <form enctype="multipart/form-data" method="post">
        <input type="file" name="qrcode">
        <hr>
        <input type="submit" value="Envoyer" name="send">
    </form>
</body>

</html>