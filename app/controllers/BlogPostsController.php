<?php

/**
 * controllers/Home.php - Controleur Home
 * Ce controleur regroupe les méthodes de la page d'accueil.
 */

/* Namespace */

/* Imports */
include_once __DIR__ . "/../core/Database.class.php"; // Utilitaire de connexion à la base de données
include_once __DIR__ . "/../models/BlogPostModel.php"; // Modèle Contact
include_once __DIR__ . "/../views/BlogPostsView.php"; // Vue Home

/* Alias */

/**
 * Controleur Home
 */
class BlogPostsController
{

    /**
     * Affichage de la page d'accueil
     */
    public function render()
    {
        $dbh = Database::createDBConnection();
        $posts = BlogPostModel::fetchAllPosts($dbh) ;
        $blog_posts_view = new BlogPostsView($posts); // Création d'une instance
        $blog_posts_view->render(); // Appel de la méthode de rendu (affichage)
    }

}
