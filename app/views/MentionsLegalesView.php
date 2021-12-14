<?php

/**
 * views/Home.php - Vue Home
 * Cette vue permet d'afficher la page d'accueil.
 */


include_once __DIR__ . "/../views/AbstractView.php"; 
/**
 * Vue Home
 */
class MentionsLegalesView extends AbstractView
{

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
                <h1>Mentions légales</h1>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ullamcorper pretium leo vel bibendum. Suspendisse efficitur maximus laoreet. Aliquam molestie tempus risus, sit amet pharetra nibh. Maecenas lobortis elementum ligula vel malesuada. Pellentesque sed lacus elit. Aenean facilisis sagittis massa nec commodo. In hac habitasse platea dictumst. Donec vel condimentum arcu, vitae scelerisque justo. Donec in mollis risus. Mauris at malesuada felis, pellentesque rutrum lorem. Nam et sem posuere elit mollis facilisis. Proin condimentum imperdiet porttitor. Quisque nec elit eu nibh molestie tristique. Integer laoreet gravida fringilla. In et velit sit amet elit dictum scelerisque in eu dolor. Mauris dui ex, maximus in enim ac, facilisis pretium lorem.
                </p>
                <p>In egestas venenatis tellus faucibus tincidunt. Nulla vitae egestas arcu. Proin sit amet pharetra tellus. Nullam eget aliquet urna. Donec ac metus a eros imperdiet egestas. Donec tortor metus, finibus eget faucibus sit amet, lobortis et dui. Sed mollis, urna in rhoncus sodales, sem felis ullamcorper ex, a finibus risus magna ut metus. Phasellus tempus, odio nec dignissim condimentum, augue urna sagittis ipsum, suscipit tincidunt felis enim vel dui.
                </p>
                <p>Nullam commodo velit a erat ullamcorper ultricies. Etiam vestibulum volutpat lectus sed sollicitudin. Morbi porta, quam vitae rutrum consectetur, orci nisl consequat elit, nec sollicitudin nunc felis vel risus. Duis tincidunt leo convallis maximus fringilla. Mauris interdum consectetur ipsum, sed egestas diam rutrum eget. Integer non placerat ante. Maecenas blandit scelerisque justo, eget pretium nisl sollicitudin a. Cras rutrum ultrices enim, non luctus massa pellentesque sit amet. Pellentesque non dolor commodo, pretium dui ut, tincidunt orci. Vestibulum efficitur ac risus laoreet placerat. Mauris tempus magna non varius viverra. Nam feugiat ligula et risus mattis venenatis.
                </p>
                <p>Donec vitae quam non est feugiat porttitor at quis elit. Phasellus sit amet tellus mi. Proin nulla elit, blandit vel sem et, pellentesque porttitor turpis. Etiam eu auctor ante. Vivamus porta lectus sed nunc interdum, vel ullamcorper quam suscipit. Vestibulum id est interdum, molestie ligula at, sodales felis. Nam quis sodales tellus, et finibus elit. Duis ut aliquam justo, nec tincidunt justo.
                </p>
                <p>Aliquam ultrices diam sed dignissim commodo. Vivamus nec est at urna tincidunt sagittis non nec mauris. Aliquam sit amet nisi eu libero faucibus tincidunt. Nunc tempor euismod feugiat. Curabitur vel varius massa. Aliquam eleifend gravida lectus et mattis. Cras euismod et sapien eget sollicitudin. Mauris faucibus aliquam neque, at hendrerit nibh aliquam eget. Aliquam scelerisque lorem sit amet eros egestas pellentesque ac ac massa. Maecenas sit amet eleifend leo. Praesent tellus libero, consectetur in sagittis ac, ullamcorper sed nunc.
                </p>

            </div>
        </body>

        </html>

<?php
    }
}
