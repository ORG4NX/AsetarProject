<?php
session_start();
require_once 'import.php';

// Activation de l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Instanciation de DatabaseAccess
$db = new DatabaseAccess("sql303.infinityfree.com", "if0_37622906", "4Gd6kBQrG5", "if0_37622906_db_members");

// Instanciation de Auth
$auth = new Auth("ASETAR 08", "Connexion", "Identifiant :", "Mot de passe :", "", "", "", $db);

// Instanciation du Header et du Footer
$head = new Header();
$foot = new Footer();

// Affiche le haut de page
echo $head->getHeader();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $pw = $_POST['pw'] ?? '';

    error_log("Tentative de connexion pour : " . $login);

    $userData = $db->SelectLogin($login);

    error_log("Données utilisateur : " . print_r($userData, true));

    if ($userData) {
        if (password_verify($pw, $userData['pw'])) {
            error_log("Vérification du mot de passe réussie");
            // Connexion réussie
            $_SESSION['login'] = $login;
            $_SESSION['type_acces'] = $userData['type_acces'];
            header("Location: index.php");
            exit;
        } else {
            error_log("Échec de la vérification du mot de passe");
            echo "Mot de passe incorrect.";
        }
    } else {
        error_log("Utilisateur non trouvé");
        echo "Utilisateur non trouvé.";
    }
}

// Affiche le formulaire de connexion
echo $auth->Connection();

// Affiche le bas de page
echo $foot->getFooter();
