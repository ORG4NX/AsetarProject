<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03/10/2018
 * Time: 14:44
 * Connexion à la base de données pour stocker les informations du formulaire.
 */

class BDD {
    private $host;
    private $user;
    private $password;
    private $bdd;
    private $pdo;

    // Constructeur permettant la connexion à la base de données.
    public function __construct($host, $user, $password, $bdd)
    {
        try {
            $this->pdo = new PDO("mysql:host={$host};dbname={$bdd};charset=utf8", $user, $password);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * @param string $host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $bdd
     */
    public function setBdd(string $bdd): void
    {
        $this->bdd = $bdd;
    }

    /**
     * @param PDO $pdo
     */
    public function setPdo(PDO $pdo): void
    {
        $this->pdo = $pdo;
    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getBdd(): string
    {
        return $this->bdd;
    }

    // Requête SQL permettant l'inscription d'un nouveau membre dans la base de données.
    public function Insert($login, $pw, $nom, $prenom, $email) {
        $req = "INSERT INTO Membre VALUES (0, '$login', '$pw', '$nom', '$prenom', '$email', 3, NULL, NOW(), NULL)";
        if (isset($login) && isset($pw) && isset($nom) && isset($prenom) && isset($email)) {
            $this->pdo->exec($req);
            echo "Inscription réussie!";
            header("location:conn.php");
        }
    }

    // Requête SQL permettant la connexion d'un membre existant (identifiant) dans la base de données.
    public function SelectLogin($login) {

        $bdd = new BDD("localhost", "root", "root", "ASETAR08");
        $sql = "SELECT * FROM Membre WHERE login = '$login'";
        $req = $bdd->getPdo()->query($sql);

        while($data = $req->fetch()) {
            $log = $data["login"];
        }
        return $log;
    }

    // Requête SQL permettant la connexion d'un membre existant (mot de passe) dans la base de données.
    public function SelectMdp($pw) {

        $bdd = new BDD("localhost", "root", "root", "ASETAR08");
        $sql = "SELECT * FROM Membre WHERE pw = '$pw'";
        $req = $bdd->getPdo()->query($sql);

        while($data = $req->fetch()) {
            $pwd = $data["pw"];
        }
        return $pwd;
    }
}