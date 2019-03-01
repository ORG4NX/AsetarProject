<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/10/2018
 * Time: 10:28
 * Page type destinée aux informations de l'association.
 */
require 'import.php';

// Instancie les objets de haut de page, milieu de page et de pied de page.
$head = new Header();
$page = new Page();
$foot = new Footer();

// Appelle la fonction du haut de page.
$head->getHeader();

echo "<div>Le site de l'association des étudiants ASETAR 08 - AEM fait partie du Lycée Monge.</div>
<div>Le lycée Gaspard MONGE, établissement de centre ville situé au cœur de MEZIERES, riche d’une histoire de plus d’un siècle a connu de nombreuses restructurations et évolutions depuis la construction des bâtiments en 1888 par Olivier PROTIN. A l’époque, ceux-ci accueillaient l’Ecole Primaire Supérieure.</div><br>

<div>Ce lycée d’enseignement général et technologique présente la particularité de proposer à ses élèves des formations générales de la Seconde à la Terminale et des formations technologiques tertiaires de la Première au Brevet de Technicien Supérieur.</div><br>

<div>Adresse : 2, Avenue de Saint Julien<br>
08000 CHARLEVILLE-MEZIERES<br>
ce.0080027l@ac-reims.fr<br>
Tél. 03 24 52 69 69 - Fax. 03 24 52 69 78<br>
Horaires : ouverture du lundi au vendredi<br>
de 07h30 à 12h00 et de 13h00 à 18h00</div><br>
<div>Fait par Mitranescu Alexandre</div>";

// Appelle la fonction du pied de page.
$foot->getFooter();
