<?php

namespace View;

class View404 extends View
{
    //ATTRIBUTS

    //CONSTRUCTEUR

    //GETTER ET SETTER

    //METHODS
    public function display(): void
    {
        ob_start();
?>
        <main>
            <h1>Erreur 404 : page non trouveé</h1>
            <a href="<?= $_ENV['accueil'] ?>">Retourner à l'accueil</a>
        </main>
<?php
        ob_end_flush();
    }
}
