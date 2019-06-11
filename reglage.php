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

// Instancie l'objet de connexion à la BDD et met en relation la connexion à la base de données.
$bdd = new BDD("localhost", "root", "root", "ASETAR08");

// Instancie les objets de haut de page et de pied de page.
$head = new Header();
$foot = new Footer();

// Génère le formulaire de de paramètre utilisateur pour la base de données.
$par = new Auth("ASETAR 08","Réglages utilisateur","a", "Modification du mot de passe :", "a",
    "a", "Modification de l'email :");

// Appelle la fonction et génère le haut de page et le pied de page.
echo $head->getHeader();
echo $foot->getFooter();

// Utilisation de la variable superglobale $_POST pour l'envoi des identifiants de l'utilisateur.
$pw = $_POST['pw'];
$email = $_POST['email'];

// Appelle la fonction de connexion de l'identifiant et de mot de passe de l'utilisateur.
$pw1 = $bdd->UpdatePw($pw);
$email1 = $bdd->UpdateEmail($email);

// Boucle if permettant de savoir si l'utilisateur a bien renseigné ses identifiants sinon erreur de connexion.
if (isset($pw) && isset($email)) {
    if ($pw == $pw1 && $email == $email1) {
        $bdd->UpdatePw($pw);
        $bdd->UpdateEmail($email);
    }
    else {
        echo "Erreur d'identifiant/mot de passe.";
    }
}
else {
    echo $par->Update();
}