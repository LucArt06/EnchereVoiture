<?php



/**
 * Modèle Annonce
 */
class AnnoncesModel
{

    /* Propriétés */
    protected $id_car;
    protected $marque;
    protected $prixReserve;
    protected $model;
    protected $puissance;
    protected $annee;
    protected $description;
    protected $img;
    protected $dateLimite;
    protected $id_proprietaire;
    protected $titre;
    protected $dbh;


    /**
     * Constructeur
     */
    public function __construct($id_car, $marque, $prixReserve, $model, $puissance, $annee, $description, $img, $dateLimite,  $id_proprietaire, $titre, $dbh)
    {
        /* Nettoyage des données */
        $this->id_car = $id_car;
        $this->marque = filter_var($marque, FILTER_SANITIZE_STRING);
        $this->prixReserve = filter_var($prixReserve, FILTER_SANITIZE_STRING);
        $this->model = filter_var($model, FILTER_SANITIZE_STRING);
        $this->puissance = filter_var($puissance, FILTER_SANITIZE_STRING);
        $this->annee = filter_var($annee, FILTER_SANITIZE_STRING);
        $this->description = filter_var($description, FILTER_SANITIZE_STRING);
        $this->img = filter_var($img, FILTER_SANITIZE_STRING);
        $this->dateLimite = filter_var($dateLimite, FILTER_SANITIZE_STRING);
        $this->id_proprietaire = filter_var($id_proprietaire, FILTER_SANITIZE_STRING);
        $this->titre = filter_var($titre, FILTER_SANITIZE_STRING);
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

        $query = $this->dbh->prepare("INSERT INTO annonce (marque, prixReserve, model, puissance, annee, description, img, dateLimite, titre) VALUES (?,?,?,?,?,?,?,?,?)");
        return $query->execute([$this->marque, $this->prixReserve, $this->model, $this->puissance, $this->annee, $this->description, $this->img, $this->dateLimite, $this->titre]);
    }

 /**
     * Récupération des annonces
     */
    public static function fetchAllPosts($dbh)
    {

        $query = $dbh->prepare("SELECT * FROM annonce");
        $query->execute() ;
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];

        foreach ($results as $result) {
            array_push($posts, new AnnoncesModel($result['id_car'], $result['marque'], $result['prixReserve'], $result["model"], $result["puissance"], $result["annee"],$result["description"],$result["img"],$result["dateLimite"], $result["id_proprietaire"], $result["titre"], $dbh));
        }
      
        return $posts;
        
    }

   
    
}
