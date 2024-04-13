<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/connexion.php';

if (isset($_POST['logout'])) {
    // Vérifier si le admin est connecté
    if (isset($_SESSION['auth'])) {
        // Mettre à jour la colonne "online" à 0 pour indiquer que le user est hors ligne
        $updateOnlineStatus = $conn->prepare('UPDATE admins SET status_online = 0 WHERE id_admin = :userId');
        $updateOnlineStatus->execute(array('userId' => $_SESSION['id']));

        // Détruire la session
        session_destroy();

        // Rediriger vers la page de connexion
        header('Location: ./index.php');
    }
}