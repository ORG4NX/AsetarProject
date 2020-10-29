<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/10/2018
 * Time: 16:29
 */

// Inclut et exécute le fichier spécifié en argument.
require "import.php";

// Instancie les objets de haut de page et de pied de page.
$head = new Header();
$page = new Page();
$foot = new Footer();

// Appelle la fonction et génère le haut de page et le pied de page.
echo $head->getHeader();
echo $page->getPage();
echo $foot->getFooter();
