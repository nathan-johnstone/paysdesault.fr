<?php

namespace View;

class ViewVillages extends View
{
    //ATTRIBUTS
    private ?array $data;

    //CONSTRUCTEUR

    //GETTER ET SETTER
    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    //METHODS
    public function display(): void
    {
        ob_start();
?>
        <nav aria-label="breadcrumb">
            <ul>
                <li aria-label="Accueil"><a href="<?= $_ENV['accueil'] ?>">Accueil</a></li>
                <li aria-current="page"><a>Villages</a></li>
            </ul>
        </nav>

        <main>

            <h1>Les villages du Pays de Sault</h1>

            <div id="carteVillages"></div>

        </main>

        <!-- <section id="villageListe">
            <div>
                <label for="villageSelect">Trier les villages</label>
                <select id="villageSelect">
                    <option value="tout" selected>Tout afficher</option>
                    <option value="GrandPlateau">Grand plateau</option>
                    <option value="tout">Vallée du Rébenty</option>
                    <option value="tout">Petit plateau</option>
                    <option value="tout">Vallée de l'Aude</option>
                    <option value="tout">Plateau méridional</option>
                </select>
            </div>
        </section> -->
<?php
        ob_end_flush();
    }
}
