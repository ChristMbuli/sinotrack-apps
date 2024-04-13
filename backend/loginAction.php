<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/connexion.php';


if (isset($_POST['connexion'])) {

    if (!empty($_POST['username']) && !empty($_POST['mdp'])) {

        //Stocker les donnée entrée dans les variable
        $userName = htmlspecialchars($_POST['username']);
        $mdp = htmlspecialchars($_POST['mdp']);

        //Verifier si l'email de existe
        $checkIfUser = $conn->prepare('SELECT * FROM admins WHERE username = ?');
        $checkIfUser->execute(array($userName));

        // la méthode rowcount nous permet de compter les nombre des donnée entré par l'utilisateur
        if ($checkIfUser->rowCount() > 0) {

            //recuperer toutes les infos  est stocker dans un tabelau
            $userInfos = $checkIfUser->fetch();

            //Section pour verifier si le mot de passe entrer par le admin correspond à celui de la BD
            if (password_verify($mdp, $userInfos['password'])) {

                // Vérifier si l'administrateur est déjà connecté
                if (!isset($_SESSION['auth'])) {
                    // Mettre à jour la colonne "online" à 1 pour indiquer qu'il est en ligne
                    $updateOnlineStatus = $conn->prepare('UPDATE admins SET status_online = 1 WHERE id_admin = :adminId');
                    $updateOnlineStatus->execute(array('adminId' => $userInfos['id_admin']));

                    //Section pour authentifier l'admin sur la plateforme avec les session
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $userInfos['id_admin'];
                    $_SESSION['pseudo'] = $userInfos['username'];
                    $_SESSION['statut'] = $userInfos['statut_online'];

                }

                header('Location: index.php');
                exit;

            } else {
                $msgError = "votre mot de passe est incorrect";
            }
        } else {
            $msgError = "Compte introuvable";
        }
    } else {
        $msgError = "Completez tous les champs";
    }
}