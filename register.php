<?php require ('./backend/registerAction.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <p>Inscription</p>
    <?php if (!empty($msgError)) { ?>
    <p><?= $msgError ?></p>
    <?php } ?>
    <form method="post">
        <input type="text" name="username" placeholder="Votre username">
        <input type="password" name="password" placeholder="Entre un mot de passe">
        <input type="password" name="confirm_password" placeholder="Confirmez le mot de passe">
        <button type="submit" name="signup">Inscription</button>
    </form>
</body>

</html>