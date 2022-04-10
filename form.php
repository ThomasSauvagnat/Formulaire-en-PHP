<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
</head>
<body>
    <?php
    // Vérification si une session existe ou si des cookies existent
    if ((isset($_SESSION['isConnected']) && $_SESSION['isConnected'] == TRUE) || (isset($_COOKIE['idt']) && $_COOKIE['idt'] === 'guest' && isset($_COOKIE['pwd']) && password_verify('1234', $_COOKIE['pwd']))) {
        // if ($_SESSION['token'] == urldecode($_GET['token'])) {}
            // Affichage du formulaire
        ?>
        <a href="deconnexion.php"><button>Se déconnecter</button></a>
        <h1>Nous contacter</h1>

        <p>Connexion réussie !</p>
        <p>Vous pouvez désormais remplir le formulaire afin de nous contacter</p>
        <?php
    } else {
        // Redirection vers le login si aucune session et aucun cookie n'existe
        header('location:login.php');
    }
    ?>
</body>
</html>