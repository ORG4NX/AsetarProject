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
        <div class='col-md-5 p-lg-5 mx-auto my-5'>
            <h1 class='display-4 font-weight-normal'>Tournois</h1>
            <p class='lead font-weight-normal'>Voici la page dédiée aux tournois organisés par l'association.</p>
            <div class='tab-content'>
            <div class='tab-pane active' id='1'>
                <div class='row'>
                    <div class='col-sm-8 col-md-6'>
                        <div class='thumbnail'>
                            <img src='images/e1.png' alt='...'>
                            <div class='caption'>
                                <h4>Tournoi Futsal</h4>
                                <p>Vous pouvez inscrire votre équipe de 5 personnes + 2 de remplacent optionnels au tournoi de futsal qui à lieu mercredi 3 avril 2019 de 15h à 18h à l'air couverte de la Warenne</p>
                                <a href='#' class='btn btn-order' role='button'><span class='glyphicon glyphicon-shopping-cart'></span>En savoir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-8 col-md-6'>
                        <div class='thumbnail'>
                            <img src='images/e2.png' alt='...'>
                            <div class='caption'>
                                <h4>Bubble Foot</h4>
                                <p>Vous pouvez vous inscrire au tournoi de Bubble Foot qui à lieu 23 mars 2019 de 13h à 19h au gymnase Rouget de Lisle.</p>
                                <a href='#' class='btn btn-order' role='button'><span class='glyphicon glyphicon-shopping-cart'></span>En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
     </div>";

echo $foot->getFooter();
?>