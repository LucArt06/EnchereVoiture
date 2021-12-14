<?php

/**
 * views/Home.php - Vue Home
 * Cette vue permet d'afficher la page d'accueil.
 */


include_once __DIR__ . "/../views/AbstractView.php"; 
/**
 * Vue Home
 */
class BlogPostsView extends AbstractView
{

    protected $posts ;

    public function __construct($posts)
    {
        $this->posts = $posts ;
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
            <title>Boilerplate MVC PHP</title>

            <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
        </head>

        <body>
            <div id="mainContainer">
                <h1>Mon blog du tonerre</h1>

                <?php foreach ($this->posts as $post) { ?>
                <p>
                   Article posté par <?= $post->author ?> le <?= $post->date ?><br>
                   <strong><?= $post->title ?></strong><br>
                   <?= utf8_encode($post->content) ?>
                </p>
                <?php } ?>
                

            </div>
        </body>

        </html>

<?php
    }
}
