<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03/10/2018
 * Time: 14:44
 * Connexion à la base de données pour lire/stocker les informations du formulaire.
 */

class DatabaseAccess {
    private $host;
    private $user;
    private $password;
    private $bdd;
    private $pdo;

    public function __construct($host, $user, $password, $dbname) {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }


    // Méthodes set et get pour les propriétés
    public function setHost(string $host): void { $this->host = $host; }
    public function setUser(string $user): void { $this->user = $user; }
    public function setPassword(string $password): void { $this->password = $password; }
    public function setBdd(string $bdd): void { $this->bdd = $bdd; }
    public function setPdo(PDO $pdo): void { $this->pdo = $pdo; }
    public function getPdo(): PDO { return $this->pdo; }
    public function getHost(): string { return $this->host; }
    public function getUser(): string { return $this->user; }
    public function getPassword(): string { return $this->password; }
    public function getBdd(): string { return $this->bdd; }

        public function Insert($login, $pw, $nom, $prenom, $email) {
        // Hachage du mot de passe
        $hashedPassword = password_hash($pw, PASSWORD_DEFAULT);

        $req = "INSERT INTO Membre (id, login, pw, nom, prenom, email, type_acces, date_register, date_last_conn) 
                VALUES (0, :login, :pw, :nom, :prenom, :email, 1, NOW(), NULL)";
        if (isset($login) && isset($pw) && isset($nom) && isset($prenom) && isset($email)) {
            $stmt = $this->pdo->prepare($req);
            $stmt->execute([
                ':login' => $login,
                ':pw' => $hashedPassword, // Utilisez le mot de passe haché
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email
            ]);
            echo "Inscription réussie!";
            header("Location: conn.php");
            exit;
        }
    }

    // Requête SQL pour obtenir les détails d'un utilisateur par son login
    public function SelectLogin($login) {
        $sql = "SELECT id, login, pw, type_acces FROM Membre WHERE login = :login";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':login' => $login]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        error_log("Résultat de la requête pour $login : " . print_r($data, true));

        return $data; // Retourne les données ou false si aucun résultat
    }
}
