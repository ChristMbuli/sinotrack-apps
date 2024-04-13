<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require __DIR__ . '/connexion.php';

$msgError = '';

if (isset($_POST['signup'])) {
    if (
        !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])
    ) {

        $userAdmin = htmlspecialchars($_POST['username']);
        $userPassword = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        if ($userPassword !== $confirmPassword) {
            $msgError = "Les mots de passe ne correspondent pas.";
        } else {
            $userMdp = password_hash($userPassword, PASSWORD_DEFAULT);

            $ifUserExists = $conn->prepare('SELECT username FROM admins WHERE username = ?');
            $ifUserExists->execute(array($userAdmin));

            if ($ifUserExists->rowCount() == 0) {

                $insertUser = $conn->prepare('INSERT INTO admins(username , password) VALUES (?, ?)');
                $insertUser->execute(array($userAdmin, $userMdp));

                // Authentifier automatiquement l'utilisateur après l'inscription
                $_SESSION['auth'] = true;
                $_SESSION['pseudo'] = $userAdmin;

                header('Location: login.php');
                exit;
            } else {
                $msgError = "Vous avez déjà un compte.";
            }
        }
    } else {
        $msgError = "Complétez tous les champs.";
    }
}
?>