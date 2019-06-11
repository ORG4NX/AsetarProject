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

    // Constructeur contenant les différentes variables pour la génération des formulaires de connexion et d'inscription.
    function __construct($header, $title, $login, $pw, $nom, $prenom, $email) {
        $this->header = $header;
        $this->title = $title;
        $this->login = $login;
        $this->pw = $pw;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
    }

    // Formulaire de connexion au site
    public function Connexion() {
        echo "<title>$this->header</title>  
            <link rel='stylesheet' href='css/global.css'>  
            </head>
            <body>
            <form action= 'conn.php' method='POST'>
            <div class='form-group'>
            <legend>$this->title</legend>  
            <span>$this->login</span>
            <input type='text' class='form-control' id='exampleInputEmail1'  aria-describedby='emailHelp' name='login' required><br>
            <span>$this->pw</span>
            <input type='password' class='form-control' id='exampleInputEmail1'  aria-describedby='emailHelp' name='pw' required><br> 
            <input type='submit' name='send' value='Envoyer'>
            </div>
            <a href='reg.php'>Nouveau membre ?</a>
            </form>";
    }

    // Formulaire de réglage pour l'utilisateur
    public function Update() {
        echo " <title>$this->header</title>
            <link rel='stylesheet' href='css/global.css'>  
            </head>
            <body>
            <form action= 'reglage.php' method='POST'>
            <div class='form-group'>
            <legend>$this->title</legend>  
            <span>$this->pw</span>
            <input type='password' class='form-control' id='exampleInputEmail1'  aria-describedby='emailHelp' name='email' required><br>
            <span>$this->email</span>
            <input type='text' class='form-control' id='exampleInputEmail1'  aria-describedby='emailHelp' name='pw' required><br> 
            <input type='submit' name='send' value='Envoyer'>
            </div>
            </form>";
    }

    // Utilise la variable globale $_SESSION de PHP, démarre une nouvelle session ou reprend une session existante.
    public function Connect($login) {
        session_start();
        $_SESSION['login'] = $login;
        header("location:index.php");
    }

    // Formulaire d'inscription au site
    public function Inscription() {
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
    public function Paiement() {
        echo "<div id='paypal-button'>
                <script src='https://www.paypalobjects.com/api/checkout.js'></script>
                <script>
                  paypal.Button.render({
                    // Configure environment
                    env: 'sandbox',
                    client: {
                      sandbox: 'demo_sandbox_client_id',
                      production: 'demo_production_client_id'
                    },
                    // Customize button (optional)
                    locale: 'fr_FR',
                    style: {
                      size: 'small',
                      color: 'gold',
                      shape: 'pill',
                    },
                    // Set up a payment
                    payment: function(data, actions) {
                      return actions.payment.create({
                        transactions: [{
                          amount: {
                            total: '15',
                            currency: 'EUR'
                          }
                        }]
                      });
                    },
                    // Execute le paiement
                    onAuthorize: function(data, actions) {
                      return actions.payment.execute().then(function() {
                        // Affiche un message de confirmation à l'acheteur
                        window.alert('Merci pour le pigeonnage!');
                      });
                    }
                  }, '#paypal-button');
                </script>
                </div>";
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
     * @param mixed $setpw
     */
    public function setSetpw($setpw)
    {
        $this->setpw = $setpw;
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