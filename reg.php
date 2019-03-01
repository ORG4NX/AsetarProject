<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16/10/2018
 * Time: 15:06
 * Affichage du formulaire d'inscription du site.
 */

// Inclut et exécute le fichier spécifié en argument.
require "import.php";

// Instancie l'objet de connexion à la BDD et met en relation la connexion à la base de données.
$bdd = new BDD("localhost:8889", "root", "root", "ASETAR08");

// Instancie les objets de haut de page et de pied de page.
$head = new Header();
$foot = new Footer();

// Appelle la fonction et génère le haut de page et le pied de page.
echo $head->getHeader();
echo $foot->getFooter();

// Génère le formulaire d'inscription du nouvel utilisateur à la base de données.
$reg = new Auth("ASETAR 08","Inscription de membre",
    "Identifiant :", "Mot de passe : ", "Nom : ", "Prénom : ", "Adresse Email : ");

echo $reg->Inscription();

$login = $_POST['login'];
$pw = md5($_POST['pw']);
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];


$bdd->Insert($login, $pw, $nom, $prenom, $email);
$reg->Paiement();