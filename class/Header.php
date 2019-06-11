<?php
/**
 * Created by PhpStorm  
 * User: index
 * Date: 26/09/2018
 * Time: 16:20
 * Classe du header en Objet
 */

class Header {

    public function getHeader() {
        $head = "<head>
                    <meta charset='utf-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1'>
                    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
                    <title>ASETAR 08</title>
                    <link rel='stylesheet' href='css/global.css'>
                </head>";
        /*
         * Utilise la variable supergloblale de session de PHP et affiche l'identifiant de l'utilisateur
         * pour définir qui est connecté sur le site actuellement.
        */
        if (session_start() == true && isset($_SESSION['login'])) {
            $head .= "<div id='user'>Bienvenue " . $_SESSION['login'] . "</div>
                <a class='img-fluid' href='index.php'><img src='images/AEM.png' width='15%' height='22%'></a> 
                <nav class='navbar navbar-expand-lg navbar-light' style='background-color:#ffd130;'
                  <a class='navbar-brand' href='../index.php'></a>
                  <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
                    <div class='navbar-nav'>
                      <a class='nav-item nav-link active' href='index.php'>Accueil</a>
                      <a class='nav-item nav-link active' href='deco.php'>Déconnexion</a>
                      <a class='nav-item nav-link active' href='services.php'>Services</a>
                      <a class='nav-item nav-link active' href='apropos.php'>A propos</a>";

            if ($_SESSION['type_acces'] == 1) {
                $head .= "<a class='nav-item nav-link active' href='admin.php'>Administration</a>";
            }
            $head .= "</div>
                          </div>
                        </nav>";
        }

        else {
            $head .= "<div id='user'>Non connecté.</div>" .

                "<a class='img-fluid' href='index.php'><img src='images/AEM.png' width='15%' height='22%'></a> 
                <nav class='navbar navbar-expand-lg navbar-light' style='background-color:#ffd130;'
                  <a class='navbar-brand' href='../index.php'></a>
                  <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
                    <div class='navbar-nav'>
                      <a class='nav-item nav-link active' href='index.php'>Accueil</a>
                      <a class='nav-item nav-link active' href='conn.php'>Connexion</a>
                      <a class='nav-item nav-link active' href='reg.php'>Inscription</a>
                      <a class='nav-item nav-link active' href='apropos.php'>A propos</a>
                    </div>     
                  </div>
                </nav>";
                }
                return $head;
    }
}