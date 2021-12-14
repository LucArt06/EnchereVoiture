<?php
/**
 * models/contact.php - Modèle Users
 * Cette classe modélise une entrée de la table contact de la base de donnée.
 */


/**
 * Modèle Users
 */
class UserModel
{

    /* Propriétés */
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;
    protected $dbh;


    /**
     * Constructeur
     */
    public function __construct($id, $nom, $prenom, $email, $password, $dbh)
    {
        /* Nettoyage des données */
        $this->id = $id;
        $this->nom = filter_var($nom, FILTER_SANITIZE_STRING);
        $this->prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
        $this->email = filter_var($email, FILTER_SANITIZE_STRING);
        $this->password = filter_var($password, FILTER_SANITIZE_STRING);
        $this->dbh = $dbh;
    }

    /**
     * Get
     */
    public function __get($property)
    {
        if ($property !== "dbh") {
            return $this->$property;
        }
    }

    /**
     * Set
     */
    public function __set($property, $value)
    {
        if ($property !== "dbh") {
            $this->$property = $value;
        }
    }


    /**
     * Insertion dans la base de données
     */
    public function insert()
    {

        $query = $this->dbh->prepare("INSERT INTO users (nom, prenom, email, password) VALUES (?,?,?,?)");
        return $query->execute([$this->nom, $this->prenom, $this->email, $this->password]);
    }


    public static function get_by_email($dbh, $email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $query = $dbh->prepare("SELECT * FROM users WHERE email=?");
        $query->execute([$email]);

        $user = $query->fetch();

        if(!$user) {
            return false;
        }

        return new UserModel($user['id_users'], $user['nom'], $user['prenom'], $user['email'], $user['password'], $dbh);
    }

    /**
     * Récupération de contact par email
     */
    public static function fetchByEmail($email, $dbh)
    {

        $email = filter_var($email, FILTER_SANITIZE_STRING);

        $query = $dbh->prepare("SELECT * FROM users WHERE email = ?");
        $results = $query->execute([$email])->fetchAll(PDO::FETCH_ASSOC);

        $users = [];

        foreach ($results as $result) {
            array_push($users, new UserModel($result['id'], $result['nom'], $result['prenom'], $result["email"], $result["password"], $dbh));
        }

        return $users;
    }
}
