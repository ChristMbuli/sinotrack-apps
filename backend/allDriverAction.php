<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/connexion.php';

//Afficher tous les chauffeurs
$allDriver = $conn->prepare('SELECT * FROM drivers');
$allDriver->execute();