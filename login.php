<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
<?php
    // Si il y a une session active
    if (isset($_SESSION['isConnected']) && $_SESSION['isConnected'] == TRUE) {
        // Redirection vers le formulaire
        header ('location:form.php');
    // Si il existe des cookies
    } else if (isset($_COOKIE['idt']) && $_COOKIE['idt'] === 'guest' && isset($_COOKIE['pwd']) && password_verify('1234', $_COOKIE['pwd'])){
        // Indiquation d'un reconnexion via cookies
        echo 'Reconnexion via cookies';
        // Affichage d'un lien vers le formulaire de contact
        echo '<a href="form.php">Formulaire de contact</a>';
    // Affichage du formulaire de login
    } else {
        ?>
        <h1>Bienvenue</h1>

        <form action="login-traitement.php" method="post">
            <label for="identifiant">Identifiant : </label>
            <input type="text" name="identifiant" <?php keep('identifiant') ?>>
    
            <label for="mdp">Mot de passe : </label>
            <input type="password" name="mdp">

            <label for="stay">Rester connecté</label>
            <input type="checkbox" name="stay">
    
            <input type="submit" value="Se connecter">
        </form>
        <?php
    }

    // Affichage de l'erreur lorsqu'il manque un champ
    if (isset($_GET['erreurChamp'])) {
        echo 'Veuillez remplir tous les champs';
    }

    // Affichage de l'erreur lorsque l'identifiant ou mot de passe ne concordent pas
    if (isset($_GET['erreurConnexion'])) {
        echo 'Mauvais mot de passe/identifiant';
    }

    if (isset($_GET['deco'])) {
        echo 'Déconnexion réussie !';
    }

    /** Fonction qui permet de sauvegarder ce qu'on a entrer dans l'input
     *  en cas d'erreur pour éviter de tout retaper
     * @param mixed $value string
     */
    function keep(string $value): void {
        echo (!empty($_GET[$value])) ? 'value="'.htmlentities($_GET[$value]).'"' : '';
    }

    ?>
</body>
</html>