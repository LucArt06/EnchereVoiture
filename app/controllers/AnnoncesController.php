<?php

/**
 * controllers/Home.php - Controleur Home
 * Ce controleur regroupe les méthodes de la page d'accueil.
 */

/* Namespace */

/* Imports */
include_once __DIR__ . "/../core/Database.class.php"; // Utilitaire de connexion à la base de données
include_once __DIR__ . "/../views/HomeView.php"; // Vue Home
include_once __DIR__ . "/../models/EncheresModel.php"; // 
include_once __DIR__ . "/../views/AnnoncesView.php"; // 
include_once __DIR__ . "/../models/AnnoncesModel.php"; //

/**
 * Controleur Home
 */
class AnnoncesController
{

    /**
     * Affichage de la page d'accueil
     */
    public function render()
    {
        $annonces_view = new AnnoncesView(null); // Création d'une instance
        $annonces_view->render(); // Appel de la méthode de rendu (affichage)
    }

    
    /**
     * Traitement du formulaire de contact
     */
    public function process_annonces()
    {
        /**
         * Validation des données
         */

        /* Cette variable indique si les données sont validées */
       

            /* Création de la connexion vers la base de données */
            $dbh = Database::createDBConnection();

            /* Création d'un nouvel objet contact à partir du modèle */
            $offre= new AnnoncesModel(null, $_POST["marque"], $_POST["prixReserve"], $_POST["model"], $_POST["puissance"], $_POST["annee"], $_POST["description"], $_POST["img"], $_POST["dateLimite"], null, $_POST["titre"], $dbh);

            /* Insertion en base de données */
            $result = $offre->insert();

                    /* Affichage de la vue */
            $annonces_view = new AnnoncesView($result); // création d'une instance
            $annonces_view->render(); // appel de la méthode d'affichage
    }


}
