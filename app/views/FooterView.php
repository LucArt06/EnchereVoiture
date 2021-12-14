<?php

/**
 * views/NotFound.php - Vue NotFound
 * Cette vue permet d'afficher la page par défaut quand aucune route ne correspond.
 */


include_once __DIR__ . "/../views/AbstractView.php"; 
/**
 * Vue Footer
 */
class FooterView extends AbstractView
{

    /**
     * Affichage de la page
     */
    public function render()
    { ?>
    <footer>
        Copyright Irina - Ludo - Lucas 2021
    </footer>
<?php
    }
}
?>