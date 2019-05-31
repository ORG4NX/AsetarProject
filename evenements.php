<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/10/2018
 * Time: 10:28
 */

// Inclut et exécute le fichier spécifié en argument.
require 'import.php';

// Instancie les objets de haut de page et de pied de page.
$head = new Header();
$foot = new Footer();

// Appelle la fonction et génère le haut de page et le pied de page.
echo $head->getHeader();

echo "<div class='position-relative overflow-hidden p-3 text-center bg-medium' style='background-image: '>
<div class='col-md-5 p-lg-5 mx-auto my-5'>
    <h1 class='display-4 font-weight-normal'>Evènements</h1>
    <p class='lead font-weight-normal'>Voici la page dédiée aux évènements organisés par l'association.</p>
    <a class='btn btn-outline-secondary' href='#'>Coming soon</a>
  </div>
  <div class='product-device shadow-sm d-none d-md-block'></div>
  <div class='product-device product-device-2 shadow-sm d-none d-md-block'></div>
</div>";

echo $foot->getFooter();

?>