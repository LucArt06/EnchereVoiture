<?php
/**
 * views/Login.php - Vue de connexion
 */

/**
 * Vue Login
 */
class LoginView extends AbstractView {

    /* Propriété */
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Affichage de la page
     */
    public function render_login() 
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

            <div id="connexionContainer">


                <div id="mainContainer">

                    <div>
                    
                        <?php if(isset($this->message)) { ?>
                            <p><?= $this->message ?></p>
                        <?php } ?>


                        <h1 class="titleLog">Connexion</h1>

                        <form action="" class="logContain" action="" method="POST">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" />

                            <label for="password">Mot de passe:</label>
                            <input type="password" id="password" name="password" />

                            <button name="login">Se connecter</button>
                        </form>
                    </div>

                    <div id="connexionInscriptionContainer">

                        <h1 >Ou</h1>
                        <h1>Inscrivez-vous</h1>
                        <a href="<?= $this->base_url() ?>enregistrer">
                            <input type="button" value="Inscrivez-Vous" >
                        </a>

                    </div>
                
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
<?php }
}
