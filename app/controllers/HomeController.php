<?php

/**
 * controllers/Home.php - Controleur Home
 * Ce controleur regroupe les méthodes de la page d'accueil.
 */

/* Namespace */

/* Imports */
include_once __DIR__ . "/../core/Database.class.php"; // Utilitaire de connexion à la base de données
include_once __DIR__ . "/../models/UtilisateursModel.php"; // Modèle utilisateur

include_once __DIR__ . "/../views/HomeView.php"; // Vue Home
include_once __DIR__ . "/../views/InscriptionView.php"; // Vue Inscription
include_once __DIR__ . "/../views/AnnoncesView.php"; // Vue Annonces


include_once __DIR__ . "/../views/MentionsLegalesView.php"; // Vue MentionsLegales

/**
 * Controleur Home
 */
class HomeController
{

    /**
     * Affichage de la page d'accueil
     */
    public function render_displayAnnonces()
    {
        $dbh = Database::createDBConnection();
        $results = AnnoncesModel::fetchAllPosts($dbh) ;
        $home_view = new HomeView($results); // Création d'une instance
        $home_view->render_displayAnnonces(); // Appel de la méthode de rendu (affichage)
    }

    public function mentions_legales()
    {
        $mentions_legales_view = new MentionsLegalesView(); // Création d'une instance
        $mentions_legales_view->render(); // Appel de la méthode de rendu (affichage)
    }

    /**
     * Traitement du formulaire de contact
     */
    public function process_contact_form()
    {
        /**
         * Validation des données
         */

        /* Cette variable indique si les données sont validées */
        $data_validated = true;

        /* Validation de l'adresse email */
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $data_validated = false; // Insertion impossible car email invalide
        }


        if ($data_validated) {

            /* Création de la connexion vers la base de données */
            $dbh = Database::createDBConnection();

            /* Création d'un nouvel objet contact à partir du modèle */
            $users = new UserModel(null, $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["password"], $dbh);

            /* Insertion en base de données */
            $result = $users->insert();
        }

        /* Affichage de la vue */
        //$home_view = new HomeView($result); // création d'une instance
        //$home_view->render(); // appel de la méthode d'affichage

    }

    



}
