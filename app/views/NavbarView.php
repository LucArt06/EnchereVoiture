<?php

/**
 * views/NNavBarView.php - Vue NavBar
 * Cette vue permet d'afficher la page de la NavBar
 */


include_once __DIR__ . "/../views/AbstractView.php"; 
/**
 * Vue NavBar
 */
class NavBarView extends AbstractView
{

    /**
     * Affichage de la NavBar
     */
    public function displayNavBar()
    { ?>
        <div id="headerContain">
            <div class="imgLogo">
                <a href="<?= $this->base_url() ?>">
                    <img class="imgLogo" src="assets/img/logo.png" alt="logo enchere">
                </a>

            </div>
            <div class=titleNavBar>
                <h1>VROOM VROOM ENCHERES</h1>
            </div>
            <nav id="navBarContain">
                <ul>
                    <li><a href="<?= $this->base_url() ?>">Home</a></li>
                    <li><a href="<?= $this->base_url() ?>annonces">Annonce</a></li>
                    <li><a href="<?= $this->base_url() ?>login">Connexion</a></li>
                </ul>
            </nav>
        </div>

            

        


<?php
    }
}
?>
