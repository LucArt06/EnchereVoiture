<?php


/**
 * Cette vue permet d'afficher la page d'accueil.
 */


include_once __DIR__ . "/../views/AbstractView.php"; 
include_once __DIR__ . "/../views/FooterView.php"; 
/**
 * Vue Home
 */
class InscriptionView extends AbstractView
{
    /* Propriétés */
    protected $result; // Résultat du stockage des informations du formulaire

    /**
     * Contructeur
     * Ce constructeur prend en paramètre une valeur booléenne contenant le résultat du traitement
     * des informations du formulaire de contact. Si le paramètre est null, la requête reçue
     * n'était pas une soumission de formulaire.
     */
    public function __construct($result)
    {
        // Si la variable $result n'est pas nulle
        if (isset($result)) {
            $this->result = $result; // Assignation de la valeur du résultat dans la propriété résultat
        }
    }


 

    /**
     * Affichage de la page
     */
    public function render()
    { ?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Atelier 19</title>

            <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
        </head>

        <body>

        <?php
                $navBar_view = new NavBarView ();
                $navBar_view ->displayNavBar() ;

            ?>

            <div id="mainContainer">
                <h1>S'inscrire</h1>

                <h2>Vous désirez vous inscrire pour publier une annonce ou encherir?</h2>

                <?php if (!isset($this->result)) { ?>
                    <p>
                        Pour tester le formulaire d'enregistrement, écrivez un
                        message dans le formulaire ci dessous et validez.
                    </p>
                <?php } else if ($this->result === true) { ?>
                    <p>Votre demande de contact a bien été enregistrée.</p>
                <?php } else { ?>
                    <p>Une erreur s'est produite, veuillez réessayer.</p>
                <?php } ?>

                <form action="" method="POST">
                    <label for="firstname">Prénom:</label>
                    <input type="text" id="firstname" name="nom" required />

                    <label for="lastname">Nom:</label>
                    <input type="text" id="lastname" name="prenom" required />

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required />

                    <label for="password">Mot de passe:</label>
                    <input type="text" id="phone" name="password" required />

                    <button>Valider</button>
                </form>
            </div>
        </body>
<?php


    $footer_view = new FooterView() ;
    $footer_view->render() ;
?>


        </html>

<?php
    }
}
