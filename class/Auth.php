<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/10/2018
 * Time: 16:19
 * ASETAR 08 : Authentification
 */

class Auth {

    private $header;
    private $title;
    private $login;
    private $pw;
    private $reg;
    private $nom;
    private $prenom;
    private $email;
    private $db;

    // Constructeur contenant les différentes variables pour la génération des formulaires de connexion et d'inscription.
    function __construct($header, $title, $login, $pw, $nom, $prenom, $email, DatabaseAccess $db) {
        $this->header = $header;
        $this->title = $title;
        $this->login = $login;
        $this->pw = $pw;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->db = $db;
    }

        // Formulaire de connexion au site
    public function Connection() {
        echo "<!DOCTYPE html>
                <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>$this->header</title>
            <link rel='stylesheet' href='css/global.css'>  
        </head>
        <body>
            <form action='conn.php' method='POST'>
                <div class='form-group'>
                    <legend>$this->title</legend>  
                    <span>" . htmlspecialchars($this->login) . "</span>
                    <input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' name='login' required><br>
                    <span>" . htmlspecialchars($this->pw) . "</span>
                    <input type='password' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='De préférence avec des caractères spéciaux' name='pw' required><br> 
                    <input type='submit' name='send' value='Envoyer'>
                </div>
                <a href='reg.php'>Nouveau membre ?</a>
            </form>
        </body>
        </html>";
    }


    // Utilise la variable globale $_SESSION de PHP, démarre une nouvelle session ou reprend une session existante.
    public function Connect($login, $pw) {
    session_start();
    
    // Récupérez les données de l'utilisateur, y compris le type d'accès
    $userData = $this->db->SelectLogin($login);

    if ($userData && password_verify($pw, $userData['pw'])) {
        $_SESSION['login'] = $login;
        $_SESSION['type_acces'] = $userData['type_acces'];
        setcookie("login", md5($login), time() + 3600, "/");
        header("location:index.php");
        exit;
        }
        else {
            return "Erreur d'identifiant ou de mot de passe.";
        }
    }


    // Formulaire d'inscription au site
    public function Register() {
        echo "<title>$this->header</title> 
            <link rel='stylesheet' href='css/global.css'>
            <form action= 'reg.php' method='POST'> 
            <fieldset>
            <legend>$this->title</legend> 
            <span>$this->login</span> 
            <input type='text' name='login' required><br> 
            <span>$this->pw</span> 
            <input type='password' name='pw' required><br>
            <span>$this->nom</span> 
            <input type='text' name='nom' required><br>
            <span>$this->prenom</span> 
            <input type='text' name='prenom' required><br>  
            <span>$this->email</span>
            <input type='email' name='email' required><br> 
            <input type='submit' name='send' value='Envoyer'> 
            </fieldset>
            </form>
            <div id='info'>
                Pour finaliser l'inscription de votre compte et devenir membre de l'association, il faudra payer une somme de 15€
            </div>";
    }

    /**
     * @return mixed
     * Bouton spécialement destiné à Paypal pour le paiement des nouveaux membres qui sont inscrits ou souhaitent s'inscrire.
     */
    public function Payment() {
        echo "<div id='paypal-button' class='paypal-disabled'></div>
                <script src='https://www.paypalobjects.com/api/checkout.js'></script>
                <style>
                    /* Style pour griser et désactiver le bouton */
                    .paypal-disabled {
                        opacity: 0.5;  /* Grise le bouton */
                        pointer-events: none;  /* Empêche les clics */
                    }
                </style>
                <script>
                    function isProductAvailable() {
                        // Exemple : mettre votre logique ici pour vérifier la disponibilité
                        return false; // Exemple : retour false pour le tester comme indisponible
                    }

                    paypal.Button.render({
                        env: 'sandbox', // ou 'production'
                        client: {
                            sandbox: 'VOTRE_CLIENT_ID_SANDBOX',
                            production: 'VOTRE_CLIENT_ID_PRODUCTION'
                        },
                        payment: function(data, actions) {
                            return actions.payment.create({
                                transactions: [
                                    {
                                        amount: { total: '10.00', currency: 'USD' }
                                    }
                                ]
                            });
                        },
                        onAuthorize: function(data, actions) {
                            return actions.payment.execute().then(function() {
                                window.alert('Merci pour votre paiement!');
                            });
                        }
                    }, '#paypal-button').then(function() {
                        // Griser le bouton si le produit est indisponible
                        if (!isProductAvailable()) {
                            document.getElementById('paypal-button').classList.add('paypal-disabled');
                        }
                    });
                </script>";
            }

    /**
     * @param mixed $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @param mixed $pw
     */
    public function setPw($pw)
    {
        $this->pw = $pw;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getPw()
    {
        return $this->pw;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getReg()
    {
        return $this->reg;
    }

}