<?php
error_reporting(0);



include_once __DIR__ . "/../views/AbstractView.php"; 
/**
 * Vue Home
 */
class AnnoncesView extends AbstractView
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


   
    public function render()
    { ?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Boilerplate MVC PHP</title>

            <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
        </head>

        <body>

            <?php
                $navBar_view = new NavBarView ();
                $navBar_view ->displayNavBar() ;

            ?>

            <div id="mainContainer">            
                <div class="annonces">
                    <?php 
                    if (!$_SESSION["id"]) { ?>

                        <h2>Vous devez être connecté pour pouvoir publier une annonce</h2>
                    
                    <?php
                    } else { ?>

                    <h1>Déposez votre annonce ici</h1>
                    <?php if (!isset($this->result)) { ?>
                            
                        <?php } else if ($this->result === true) { ?>
                            <p>Votre demande de contact a bien été enregistrée.</p>
                        <?php } else { ?>
                            <p>Une erreur s'est produite, veuillez réessayer.</p>
                        <?php } ?>

                        
                    
                        <form action="" method="POST">
                            <label for="titre">Titre:</label>
                            <input type="text" id="titre" name="titre" required />

                            <label for="marque">Marque:</label>
                            <input type="text" id="marque" name="marque" required />

                            <label for="prixReserve">Prix de réserve:</label>
                            <input type="number" id="prixReserve" name="prixReserve" required />

                            <label for="model">Modele:</label>
                            <input type="text" id="model" name="model" required />

                            <label for="puissance">Puissance:</label>
                            <input type="number" id="puissance" name="puissance" required />

                            <label for="annee">Année:</label>
                            <input type="number" id="annee" name="annee" required />

                            <label id="description">Description:</label>
                            <textarea name="description" id="description" required></textarea>

                            <label for="img">Image:</label>
                            <input type="text" id="img" name="img" required />

                            <label for="dateLimite">Date Limite:</label>
                            <input type="date" id="dateLimite" name="dateLimite" required />


                            <button>Valider</button>
                        
                        
                        
        
                        </form>

                    <?php } ?>
                    

                </div>
            </div>
            <footer>
                <?php
                    $footer_view = new FooterView() ;
                    $footer_view->render() ;
                ?>
            </footer>
        </body>

        </html>

<?php
    }
}
