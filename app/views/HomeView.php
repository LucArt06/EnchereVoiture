<?php

/**
 * views/Home.php - Vue Home
 * Cette vue permet d'afficher la page d'accueil.
 */


include_once __DIR__ . "/../views/AbstractView.php"; 
include_once __DIR__ . "/../views/FooterView.php"; 
include_once __DIR__ . "/../views/NavbarView.php";




/**
 * Vue Home
 */
class HomeView extends AbstractView
{
    /* Propriétés */
    protected $result; // Résultat du stockage des informations du formulaire
    protected $posts;

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
    public function render_displayAnnonces()
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
                
                <h2>Bienvenue sur le site d'enchères de voitures!</h2>
                <p>
                    Bienvenue sur la page d'accueil. Vous trouverez ici les plus belles voitures de nos particuliers.
                </p>

                <div id="annonces">
                            <h1>Nos annonces:</h1>
                           

            
                            <?php foreach ($this->result as $post) { ?>
                            <ul class="annonceContain">
                                <div class="elementAnnonce">
                                    <strong><li class= "listeAnnonce"><?= $post->titre ?></strong><br>
                                    Marque: <?= $post->marque ?><br>
                                    <?= $post->model ?><br>
                                    Prix actuel: <?= $post->prixReserve ?> € 
                                    <?php if($_SESSION["id"]){?>
                                    <input value= "<?=$post->prixReserve+100?>"/> ou <input placeholder="Ma proposition"/> <button>Enchérir</button><br>
                                    <?php }?>
                                    Moteur: <?= $post->puissance ?> ch<br>
                                    Modèle sorti en: <?= $post->annee ?><br>
                                    Fin d'enchères: <?= $post->dateLimite ?>
                                    <?php
                                    $dateActuelle= time();
                                    $dateLimite = strtotime( $post->dateLimite);
                                    $jours_restants =  ceil(abs($dateLimite - $dateActuelle) / 86400);
                                    $minutes_restants = (($dateLimite - $dateActuelle) / 60);

                                    ?>
                                     ~ Jours restants: <?= $jours_restants?> (soit <?= ceil($minutes_restants)?> min).

                                    <br><br></li>
                                    <i><?= utf8_encode($post->description) ?></i>
                                </div>
                                <div class="imgAnnonce">
                                    <img src="<?= $post->img ?>" alt="photovoiture">
                                </div>
                            </ul>
                            <?php } ?>

                <div class="btnFooter">
                    <!-- <button action="<?= $this->base_url() ?>" class="enregistrer">S'enregistrer </button> -->
                    <a href="<?= $this->base_url() ?>enregistrer"><button class="enregistrer">S'enregistrer </button></a>
                    <a href="<?= $this->base_url() ?>login"><button class="connexion">Se connecter </button></a>
                    <a href="<?= $this->base_url() ?>annonces"><button class="annonces">Postez votre annonce</button></a>
                </div>


            </div>
            <footer>
            <?php
                $footer_view = new FooterView() ;
                $footer_view->render() ;
                echo ($_SESSION["id"]);
            ?>

            </footer>
        </body>



        </html>

<?php
    }
}
