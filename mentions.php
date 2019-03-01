<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018-12-04
 * Time: 14:41
 * Affiche les mentions légales du site.
 */

// Inclut et exécute le fichier spécifié en argument.
require "import.php";

// Instancie les objets de haut de page et de pied de page.
$head = new Header();
$page = new Page();
$foot = new Footer();

// Appelle la fonction et génère le haut de page et le pied de page.
$head->getHeader();
 echo "<article class='node-6905 node node-page view-mode-full clearfix' about='/page/mentions-legales' typeof='foaf:Document'>
<div>Hébergement</div>
<div>OVH</div>
<div>2 Rue Kellermann, 59100 Roubaix</div>
<div>www.ovh.net</div><br>

<div>L’utilisateur est notamment informé que conformément à l’article 32 de la loi Informatique et libertés du 6 janvier 1978 modifiée, les informations qu’il communique par les formulaires présents sur le Site de ASETAR 08 sont nécessaires pour répondre à sa demande et sont destinées aux services en charge de répondre à sa demande à des fins de suivi de cette demande.</div>
<div>Conformément aux dispositions des articles 39 et 40 de la loi « Informatique et Libertés » du 6 janvier 1978 modifiée en 2004, l’utilisateur bénéficie d’un droit d’accès, de rectification, de mise à jour et d’effacement des informations qui le concernent, qu’il peut exercer en s’adressant àcil@masociete.com, ou par courrier à ASETAR 08, 25 rue de mon adresse, 75002 Paris, en précisant dans l’objet du courrier « Droit des personnes » et en joignant la copie de son justificatif d’identité.</div>
<div>Vous bénéficiez également du droit de donner des directives sur le sort de vos données après votre décès.</div>
<div>Conformément aux dispositions de l’article 38 de la loi « Informatique et Libertés » du 6 janvier 1978 modifiée en 2004, l’utilisateur peut également s’opposer, pour des motifs légitimes à ce que ses données fassent l’objet d’un traitement et sans motif et sans frais, à ce que ses données soient utilisées à des fins de prospection commerciale.</div>
<div>L’utilisateur est informé que lors de ses visites sur le Site www.masociete.com, un cookie peut s’installer automatiquement sur son logiciel de navigation.</div>
<div>Les informations recueillies sur ce site seront conservées pendant une durée de trois ans.</div>
<div>Le cookie est un bloc de données qui ne permet pas d’identifier les utilisateurs mais sert à enregistrer des informations relatives à la navigation de celui-ci sur le site. Le paramétrage du logiciel de navigation permet d’informer de la présence de cookie et éventuellement, de la refuser de la manière décrite à l’adresse suivante www.cnil.fr.</div>
<div>L’utilisateur dispose d’un droit d’accès, de retrait et de modification des données à caractère personnel communiquées par le biais des cookies dans les conditions indiquées ci-dessus.</div>
L’utilisateur du Site de ASETAR 08 est tenu de respecter les dispositions de la loi Informatique et libertés du 6 janvier 1978 modifiée dont la violation est passible de sanctions pénales. Il doit notamment s’abstenir, s’agissant des informations nominatives auxquelles il accède, de toute collecte, de toute utilisation détournée, et d’une manière générale, de tout acte susceptible de porter atteinte à la vie privée ou à la réputation des personnes.</div>
</article>";
$foot->getFooter();