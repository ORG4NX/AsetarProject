<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 06/11/2018
 * Time: 14:34
 * Effectue la déconnexion de l'utilisateur en détruisant la variable superglobale de session de PHP
 * et ramène l'utilisateur au fichier index du site.
 */
session_start();
session_destroy();
header("location:admin.php");