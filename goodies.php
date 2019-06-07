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
echo $head->getHeader();

echo "<div class='position-relative overflow-hidden p-3 text-center bg-medium'>
  
    <h1 class='display-4 font-weight-normal'>Goodies</h1>
    <p class='lead font-weight-normal'>Voici la page dédiée aux goodies mis en vente par l'association.</p>
        <div class='tab-content'>
            <div class='tab-pane active' id='1'>
                <div class='row'>
                    <div class='col-sm-8 col-md-4'>
                        <div class='thumbnail'>
                            <img src='images/m1.png' alt='...'>
                            <div class='price'>15,00€</div>
                            <div class='caption'>
                                <h4>T-Shirt AEM</h4>
                                <p>Arborez ce magnifique t-shirt aux couleurs de l'association!</p>
                                <a href='#' class='btn btn-order' role='button'><span class='glyphicon glyphicon-shopping-cart'></span>Commander</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-6 col-md-4'>
                        <div class='thumbnail'>
                            <img src='images/m2.png' alt='...'>
                            <div class='price'>15,00€</div>
                            <div class='caption'>
                                <h4>Sweat AEM</h4>
                                <p>Arborez ce magnifique sweat aux couleurs de l'association!</p>
                                <a href='#' class='btn btn-order' role='button'><span class='glyphicon glyphicon-shopping-cart'></span>Commander</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-6 col-md-4'>
                        <div class='thumbnail'>
                            <img src='images/m3.png' alt='...'>
                            <div class='price'>15,00€</div>
                            <div class='caption'>
                                <h4>Porte-clé AEM</h4>
                                <p>Arborez ce magnifique porte-clé aux couleurs de l'association!</p>
                                <a href='#' class='btn btn-order' role='button'><span class='glyphicon glyphicon-shopping-cart'></span>Commander</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>";

echo $foot->getFooter();
?>