<?php session_start();
// Vérification si POST est rempli
if (!empty($_POST)) {
    // Vérification si les POST existe et sont remplis
    if (isset($_POST['identifiant']) && !empty($_POST['identifiant']) && isset($_POST['mdp']) && !empty($_POST['mdp'])) {
        // Vérification si l'identifiant et le mot de passe concordent
        if ($_POST['identifiant'] === 'guest' && $_POST['mdp'] === '1234') {
            // Active la session
            $_SESSION['isConnected'] = TRUE;
            // Si la checkbox 'rester connecté' est coché
            if(isset($_POST['stay']) && $_POST['stay'] === 'on') {
                // Création des cookies (durée de 1 an) de l'identifiant et du mot de passe (avec hashage)
                setcookie('idt', $_POST['identifiant'], ['expires' => time()+365*24*3600]);
                setcookie('pwd', password_hash($_POST['mdp'], PASSWORD_DEFAULT), ['expires' => time()+365*24*3600]);
            }
            // Redirige vers le formulaire
            header('location:form.php');
        } else {
            header('location:login.php?erreurConnexion');
        }
    } else {
        header('location:login.php?erreurChamp&identifiant='.urlencode($_POST['identifiant']));
    }
}