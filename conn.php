<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16/10/2018
 * Time: 15:09
 * Affichage du formulaire connexion du site.
 */

// Inclut et exécute le fichier spécifié en argument.
require "import.php";

// Instancie les objets de haut de page et de pied de page.
$head = new Header();
$foot = new Footer();

// Instancie l'objet de connexion à la BDD et met en relation la connexion à la base de données.
$bdd = new BDD("localhost", "root", "root", "ASETAR08");

// Génère le formualaire de connexion à la base de données.
$conn = new Auth("ASETAR 08","Connexion d'un membre","Identifiant : ", "Mot de passe : ", "", "", "");

// Appelle la fonction et génère le haut de page et le pied de page.
echo $head->getHeader();
echo $foot->getFooter();

// Utilisation de la variable superglobale $_POST pour l'envoi des identifiants de l'utilisateur.
$login = $_POST['login'];
$pw = md5($_POST['pw']);

// Appelle la fonction de connexion de l'identifiant et de mot de passe de l'utilisateur.
$log1 = $bdd->SelectLogin($login);
$pw1 = $bdd->SelectMdp($pw);

    // Boucle if permettant de savoir si l'utilisateur a bien renseigné ses identifiants sinon erreur de connexion.
    if (isset($login) && isset($pw)) {
        if ($login == $log1 && $pw == $pw1) {
            $conn->Connect($login);
        }
        else {
            echo "Erreur d'identifiant/mot de passe.";
        }
    }
    else {
        echo $conn->Connexion();
    }