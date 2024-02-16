<?php

class HomeController
{
    public function displayHome()
    {
        // Logique de contrôleur ici
        $pageTitle = 'Bienvenue sur mon Blog';

        // Affichage de la vue
        require_once '/templates/home/index.php';
    }
}
