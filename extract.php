<?php
// Connexion à la base de données
try {
    $conn = new PDO('mysql:host=localhost;dbname=test;charset=utf8;', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion: ' . $e->getMessage());
}

// Vérifiez si la valeur du tag est reçue
if (!isset($_POST['tag']) || empty($_POST['tag'])) {
    echo "La valeur du tag est vide ou non définie.";
    exit;
}

// Récupération de la valeur du tag
$tag = $_POST['tag'];

// Préparation de la requête SQL
// Notez que j'ai changé 'matricule' par 'tag' dans la requête SQL, car il semble que vous vouliez insérer la valeur du tag dans une colonne nommée 'tag'
$stmt = $conn->prepare('INSERT INTO tags (tag, createdat) VALUES (:tag, :date)');

// Exécution de la requête et gestion des erreurs
try {
    $stmt->execute([':tag' => $tag, ':date' => date('Y-m-d')]);
    echo "Le tag du QR code a été inséré dans la base de données.";
} catch (PDOException $e) {
    echo "Une erreur est survenue lors de l'insertion du tag : " . $e->getMessage();
}