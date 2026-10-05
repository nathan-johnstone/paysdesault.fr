<?php

namespace View;

class ViewLieux extends View
{
    //ATTRIBUTS

    //CONSTRUCTEUR

    //GETTER ET SETTER

    //METHODS
    public function display(): void
    {
        ob_start();
?>
        <nav aria-label="breadcrumb">
            <ul>
                <li aria-label="Accueil"><a href="<?= $_ENV['accueil'] ?>">Accueil</a></li>
                <li aria-current="page"><a>Lieux</a></li>
            </ul>
        </nav>

        <main>

            <h1>Lieux</h1>

            <p>En construction</p>

        </main>
<?php
        ob_end_flush();
    }
}
