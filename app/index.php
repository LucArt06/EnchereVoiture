<?php
session_start();

/**
 * index.php - Point d'entrée de l'application
 * Ce fichier défini les routes et les méthodes des controleurs qui dervont être appelées
 */

/* Imports */
require_once __DIR__ . "/core/Router.class.php"; // Routeur
include_once __DIR__ . "/controllers/HomeController.php"; // Controleur Home
include_once __DIR__ . "/controllers/NotFoundController.php"; // Controlleur NotFound
include_once __DIR__ . "/controllers/BlogPostsController.php"; 
include_once __DIR__ . "/controllers/UsersController.php"; 
include_once __DIR__ . "/controllers/AnnoncesController.php"; 









/*********************/
/*      Requête      */
/*********************/
$method = $_SERVER['REQUEST_METHOD']; // Récupération du verbe
$uri = $_GET['uri']; // Récuépération de l'URI



/*********************/
/*       Router      */
/*********************/

/* Création du routeur */
$router = new Router($uri, $method);



/*********************/
/*       Routes      */
/*********************/

/*** Page d'accueil ***/
$homeController = new HomeController();
$blogpostsController = new BlogPostsController();
$usersController = new UsersController();
$annoncesController = new AnnoncesController();

$router->get("/",  [$homeController, 'render_displayAnnonces']); // GET /
$router->get("/enregistrer",  [$usersController, 'render']); // GET /

$router->post("/", [$homeController, 'process_contact_form']); // POST /
$router->post("/enregistrer", [$usersController, 'process_user_form']); // POST /

$router->get("/annonces",  [$annoncesController, 'render']); // GET /
$router->post("/annonces", [$annoncesController, 'process_annonces']); // POST /


/*********************/
$router->get("/mentions-legales",  [$homeController, 'mentions_legales']); // GET /
$router->get("/blog",  [$blogpostsController, 'render']);

$router->get("/login", [$usersController, 'render_login']);
$router->post("/login", [$usersController, 'process_credentials']);

// Ajoutez vos routes ici


/*** Route par défaut ***/
$router->default([new NotFoundController(), 'render']);
/*********************/



/***************************************/
/* Recherche de routes correspondantes */
/***************************************/

/* Démarrage du routeur */
$router->start();


