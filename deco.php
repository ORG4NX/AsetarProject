<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 06/11/2018
 * Time: 14:34
 */

// Démarre la session pour accéder aux variables de session
session_start();

// Vérifie si l'utilisateur est connecté (vous pouvez adapter cette logique selon votre application)
if (isset($_SESSION['login'])) {
    // Récupère l'ID de l'utilisateur
    $userId = $_SESSION['login'];

    // Supprime toutes les variables de session
    $_SESSION = [];

    // Détruit la session
    session_destroy();

	// Suppression du cookie PHPSESSID
    if (ini_get("session.use_cookies")) {
    // Obtenir les paramètres du cookie
    $params = session_get_cookie_params();
    // Supprimer le cookie de session
    setcookie(session_name("PHPSESSID"), '', time() - 3600, $params["/"], $params["asetar08.rf.gd"], $params[false], $params[false]);
}

    // Supprime le cookie associé
    // Assurez-vous de remplacer 'user_token' par le nom de votre cookie
    setcookie("login", '', time() - 3600, "/"); // Le chemin '/' pour s'assurer que le cookie est supprimé pour tout le site

    // Optionnel : Vous pouvez également supprimer d'autres cookies si nécessaire
    // setcookie("autre_cookie", '', time() - 3600, "/");
	// Si l'utilisateur n'est pas connecté, vous pouvez le rediriger
    echo "Aucune session active.";
    header("Location: index.php"); // Redirige vers la page d'accueil
    exit;
}
?>