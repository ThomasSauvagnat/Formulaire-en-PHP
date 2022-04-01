<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
</head>
<body>
    <p>Voulez-vous vraiment vous déconnecter ?</p>
    <a href="deconnexion.php?deco=yes"><button>Oui</button></a>
    <a href="form.php"><button>Non</button></a>

    <?php
    if (isset($_GET['deco']) && $_GET['deco'] == 'yes') {
        session_destroy();
        setcookie('idt');
        unset($_COOKIE['idt']);
        setcookie('pwd');
        unset($_COOKIE['pwd']);
        header('location:login.php?deco');
    }
    ?>
</body>
</html>