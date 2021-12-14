<?php


/**
 * Cette vue permet d'afficher la page d'accueil.
 */


include_once __DIR__ . "/../views/AbstractView.php"; 
include_once __DIR__ . "/../views/FooterView.php"; 
/**
 * Vue Home
 */
class AnnonceView extends AbstractView
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
            <div id="mainContainer">
                <h1>Poster une annonce</h1>

                <h2>Vous désirez publier une annonce?</h2>

                <?php if (!isset($this->result)) { ?>
                    <p>
                        Pour tester le formulaire d'annonces, écrivez un
                        message dans le formualaire ci dessous et validez.
                    </p>
                <?php } else if ($this->result === true) { ?>
                    <p>Votre annonce a bien été enregistrée.</p>
                <?php } else { ?>
                    <p>Une erreur s'est produite, veuillez réessayer.</p>
                <?php } ?>

                <form action="" method="POST">
                    <label for="marque">Marque:</label>
                    <input type="text" id="marque" name="marque" required />

                    <label for="prixReserve">Prix de réserve:</label>
                    <input type="number" id="prixReserve" name="prixReserve" required />

                    <label for="model">Modele:</label>
                    <input type="text" id="model" name="model" required />

                    <label for="puissance">Puissance:</label>
                    <input type="text" id="puissance" name="puissance" required />

                    <label for="annee">Année:</label>
                    <input type="number" id="annee" name="annee" required />

                    <label id="description">Description:</label>
                    <textarea name="description" id="description" required></textarea>

                    <label for="img">Image:</label>
                    <input type="text" id="img" name="img" required />

                    <label for="dateLimite">Date Limite:</label>
                    <input type="date" id="dateLimite" name="dateLimite" required />

                    <label for="titre">Titre:</label>
                    <input type="text" id="titre" name="titre" required />

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
