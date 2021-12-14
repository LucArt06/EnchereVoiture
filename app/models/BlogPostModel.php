<?php

/**
 * models/contact.php - Modèle Contact
 * Cette classe modélise une entrée de la table contact de la base de donnée.
 */


/* Alias */
//use PDO;


/**
 * Modèle Contact
 */
class BlogPostModel
{

    /* Propriétés */
    protected $id;
    protected $title;
    protected $content;
    protected $author;
    protected $date;
    protected $dbh;


    /**
     * Constructeur
     */
    public function __construct($id, $title, $content, $author, $date,  $dbh)
    {
        /* Nettoyage des données */
        $this->id = $id;
        $this->title = filter_var($title, FILTER_SANITIZE_STRING);
        $this->content = filter_var($content, FILTER_SANITIZE_STRING);
        $this->author = filter_var($author, FILTER_SANITIZE_STRING);
        $this->date = filter_var($date, FILTER_SANITIZE_STRING);
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
    /*
    public function insert()
    {

        $query = $this->dbh->prepare("INSERT INTO contacts (firstname, lastname, email, phone, message) VALUES (?,?,?,?,?)");
        return $query->execute([$this->firstname, $this->lastname, $this->email, $this->phone, $this->message]);
    }*/


    /**
     * Récupération de contact par email
     */
    public static function fetchAllPosts($dbh)
    {

        $query = $dbh->prepare("SELECT * FROM blog_posts");
        $query->execute() ;
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];

        foreach ($results as $result) {
            array_push($posts, new BlogPostModel($result['id'], $result['title'], $result['content'], $result["author"], $result["date"], $dbh));
        }

        return $posts;
    }
}
