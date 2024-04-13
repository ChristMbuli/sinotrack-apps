<?php

try {

    $conn = new PDO('mysql:host=bg5zs2ozur1yedyhjewm-mysql.services.clever-cloud.com;dbname=bg5zs2ozur1yedyhjewm;charset=utf8;', 'uk9nk1j4dbvbyild', 'fa7x8PUj5hPGrfTHr1BF');

} catch (Exception $e) {
    die('Erreur de connexion: ' . $e->getMessage());
}
