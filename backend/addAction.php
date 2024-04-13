<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/connexion.php';
require __DIR__ . '/vendor/autoload.php';

if (isset($_POST['save'])) {
    if (
        !empty($_POST['fname']) && !empty($_POST['phone']) && !empty($_FILES['profil']['name']) &&
        !empty($_POST['marque']) && !empty($_POST['vitesse']) && $_POST['reservoir'] != 0 &&
        !empty($_FILES['photo']['name'])
    ) {
        $fname = htmlspecialchars($_POST['fname']);
        $phone = htmlspecialchars($_POST['phone']);
        $marque = htmlspecialchars($_POST['marque']);
        $vitesse = htmlspecialchars($_POST['vitesse']);
        $reservoir = htmlspecialchars($_POST['reservoir']);

        $currentYear = date("F j, Y");

        // Générer une lettre aléatoire entre A et Z
        $randomLetter = chr(rand(65, 90));
        $Lettre = chr(rand(90, 65));

        // Générer un nombre aléatoire entre 10 et 99
        $randomNumber = rand(10, 99);

        $tag = $randomLetter . $randomNumber . $Lettre . $randomNumber;

        // Génération du contenu du QR code
        $qrCodeContent = $fname . ' - ' . json_encode([
            'Nom et Prénom:' => $fname,
            'Voiture: ' => $marque,
            'Tag' => $tag,
        ]);

        // Génération du QR code
        $qrCode = new chillerlan\QRCode\QRCode(new chillerlan\QRCode\QROptions([
            'outputType' => chillerlan\QRCode\QRCode::OUTPUT_IMAGE_PNG,
        ]));

        // Chemin où le fichier QR code sera sauvegardé
        $qrCodeImagePath = 'images/';
        // Nom de fichier pour le QR code généré
        $fileName = $tag . '.png';

        // Génération et sauvegarde du fichier QR code
        $qrCode->render($qrCodeContent, $qrCodeImagePath . $fileName);

        // Insérer le QR code dans la base de données
        // Notez que vous pouvez utiliser le chemin du QR code généré comme valeur
        $qrcodePath = $qrCodeImagePath . $fileName;

        // Insérer le QR code dans le fichier 
        $qrcode = $_FILES['profil']['name'];
        $qrcode_tmp = $_FILES['profil']['tmp_name'];
        $qrcode_path = 'images/' . $qrcode;
        move_uploaded_file($qrcode_tmp, $qrcode_path);

        // Insérer l'image du profil du chauffeur 
        $picture = $_FILES['profil']['name'];
        $picture_tmp = $_FILES['profil']['tmp_name'];
        $picture_path = 'images/' . $picture;
        move_uploaded_file($picture_tmp, $picture_path);

        // Insérer l'image du véhicule 
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_path = 'images/' . $photo;
        move_uploaded_file($photo_tmp, $photo_path);

        // Vérifier si le chauffeur existe déjà
        $ifDriverExists = $conn->prepare('SELECT * FROM drivers WHERE fname = ?');
        $ifDriverExists->execute([$fname]);

        if ($ifDriverExists->rowCount() == 0) {
            // Insérer les informations du chauffeur
            $insertDriver = $conn->prepare('INSERT INTO drivers(fname, phone, profil, tag, qrcode, created_at) VALUES(?, ?, ?, ?, ?, ?)');
            if ($insertDriver->execute([$fname, $phone, $picture_path, $tag, $qrcodePath, $currentYear])) {
                // Insérer les informations du véhicule
                $insertCar = $conn->prepare('INSERT INTO cars(marque, vitesse, reservoir, tag_driver, photo) VALUES(?, ?, ?, ?, ?)');
                if ($insertCar->execute([$marque, $vitesse, $reservoir, $tag, $photo_path])) {

                    $successMsg = "Chauffeur ajouté avec succès";

                    // Télécharger automatiquement le QR code
                    header("Content-type: image/png");
                    header("Content-Disposition: attachment; filename=" . $fileName);
                    readfile($qrCodeImagePath . $fileName);
                    exit;
                } else {
                    $errorMsg = "Erreur lors de l'insertion des informations du véhicule";
                }
            } else {
                $errorMsg = "Erreur lors de l'insertion des informations du chauffeur";
            }
        } else {
            $errorMsg = "Ce chauffeur existe déjà";
        }
    } else {
        $errorMsg = "Veuillez remplir tous les champs";
    }
}
?>