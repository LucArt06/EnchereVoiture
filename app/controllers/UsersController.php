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
include_once __DIR__ . "/../views/InscriptionView.php"; // Vue Home
include_once __DIR__ . "/../views/ConnexionView.php"; // Vue Home


include_once __DIR__ . "/../views/MentionsLegalesView.php"; // Vue Home

/**
 * Controleur Home
 */
class UsersController
{

    /**
     * Affichage de la page d'accueil
     */
    public function render()
    {
        $user_view = new InscriptionView(null); // Création d'une instance
        $user_view->render(); // Appel de la méthode de rendu (affichage)
    }



    /**
     * Traitement du formulaire de contact
     */
    public function process_user_form()
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



            $users = new UserModel(null, $_POST["nom"], $_POST["prenom"], $_POST["email"], password_hash($_POST["password"], PASSWORD_BCRYPT), $dbh);
            /* Insertion en base de données */
            $result = $users->insert();
        }

        /* Affichage de la vue */
        $user_view = new InscriptionView($result); // création d'une instance
        $user_view->render(); // appel de la méthode d'affichage

    }

    public function render_login()
    {
        $login_view = new LoginView(null); // Création d'une instance
        $login_view->render_login(); // Appel de la méthode de rendu (affichage)
    }

    public function process_credentials()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];


        $dbh = Database::createDBConnection();
        $user = UserModel::get_by_email($dbh, $email);
        $_SESSION["id"] = $user->id;


        if ($user && password_verify($password, $user->password)) {
            header("location:/AtelierBocal/Voiture/");


            // header("Location:/");
        } else {

            if (empty($email) || empty($password)) {
                $login_view = new LoginView("Veuillez renseigner les identifiants - Les champs sont vides !");
                $login_view->render_login();
            } else {

                $login_View = new LoginView("Email ou mot de passe incorrect.");
                $login_View->render_login();
            }
        }
    }
}
