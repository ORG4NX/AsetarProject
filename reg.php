<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16/10/2018
 * Time: 15:06
 * Affichage du formulaire d'inscription du site.
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclut et exécute le fichier spécifié en argument.
require "import.php";

// Instancie les objets de haut de page et de pied de page.
$head = new Header();
$foot = new Footer();

// Appelle la fonction et génère le haut de page et le pied de page.
echo $head->getHeader();
echo $foot->getFooter();

        // Vérifiez si la classe DatabaseAccess existe
        if (!class_exists('DatabaseAccess')) {
            die("La classe DatabaseAccess n'a pas été chargée correctement.");
        }

        // Essayez de créer l'objet DatabaseAccess
        try {
            $db = new DatabaseAccess("sql303.infinityfree.com", "if0_37622906", "4Gd6kBQrG5", "if0_37622906_db_members");
        } catch (Exception $e) {
            die("Erreur lors de la création de l'objet DatabaseAccess : " . $e->getMessage());
        }

        // Vérifiez si la classe Auth existe
        if (!class_exists('Auth')) {
            die("La classe Auth n'a pas été chargée correctement.");
        }

        // Essayez de créer l'objet Auth
        try {
            $reg = new Auth("ASETAR 08", "Inscription de membre",
                "Identifiant :", "Mot de passe : ", "Nom : ", "Prénom : ", "Adresse Email : ", $db);
        } catch (Exception $e) {
            die("Erreur lors de la création de l'objet Auth : " . $e->getMessage());
        }

echo $reg->Register();

        // Vérifiez si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Utilisez isset() pour vérifier si les clés existent, sinon utilisez une valeur par défaut
        $login = isset($_POST['login']) ? $_POST['login'] : '';
        $pw = isset($_POST['pw']) ? $_POST['pw'] : '';
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';

        // Vérifiez si toutes les valeurs nécessaires sont présentes
        if ($login && $pw && $nom && $prenom && $email) {
            // Insérez les données dans la base de données
            $db->Insert($login, $pw, $nom, $prenom, $email);
            // Note: L'echo "Inscription réussie !" est déjà dans la méthode Insert()
        } else {
            echo "Veuillez remplir tous les champs du formulaire.";
        }
    }

$reg->Payment();
