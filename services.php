<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/10/2018
 * Time: 10:28
 */

// Inclut et exécute le fichier spécifié en argument.
require "import.php";

// Instancie les objets de haut de page et de pied de page.
$head = new Header();
$foot = new Footer();

// Appelle la fonction et génère le haut de page et le pied de page.
$head->getHeader();

echo "<ul class='nav justify-content-center'>
  <li class='nav-item'>
    <a class='btn btn-warning' href='evenements.php'>Evenements</a>
  </li>
  <li class='nav-item'>
    <a class='btn btn-warning' href='tournois.php'>Tournois</a>
  </li>
  <li class='nav-item'>
    <a class='btn btn-warning' href='goodies.php'>Goodies</a>
  </li>
</ul>";

$foot->getFooter();
?>