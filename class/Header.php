<?php

class Header {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function getHeader() {
        $head = "<!DOCTYPE html>
                <head>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
                <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' rel='stylesheet'>
                <title>ASETAR 08</title>
                <link rel='stylesheet' href='css/global.css'>
                </head>";

        if (isset($_SESSION['login'])) {
            $head .= "<div id='user'>Bienvenue " . $_SESSION['login'] . "</div>
                    <a class='img-fluid' href='index.php'><img src='images/AEM.png' width='15%' height='22%'></a> 
                    <nav class='navbar navbar-expand-lg navbar-light' style='background-color:#ffd130;'>
                    <a class='navbar-brand' href='../index.php'></a>
                    <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
                    <div class='navbar-nav'>
                    <a class='nav-item nav-link active' href='index.php'>Accueil</a>
                    <a class='nav-item nav-link active' href='deco.php'>Déconnexion</a>
                    <a class='nav-item nav-link active' href='services.php'>Services</a>";

            // Vérifiez si l'utilisateur a un type d'accès de 1
            if (isset($_SESSION['type_acces']) && $_SESSION['type_acces'] == 1) {
                $head .= "<a class='nav-item nav-link active' href='admin.php'>Administration</a>"; // Affiche le bouton Administration
            }

            $head .= "<a class='nav-item nav-link active' href='apropos.php'>A propos</a>
                    </div>
                    </div>
                    </nav>";
        } else {
            $head .= "<div id='user'>Non connecté.</div>
                    <a class='img-fluid' href='index.php'><img src='images/AEM.png' width='15%' height='22%'></a> 
                    <nav class='navbar navbar-expand-lg navbar-light' style='background-color:#ffd130;'>
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
