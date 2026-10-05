<?php

namespace View;

class ViewAccueil extends View
{
    //ATTRIBUTS
    private array $nextEvents = [];

    //CONSTRUCTEUR

    //GETTER ET SETTER
    public function getNextEvents(): ?array
    {
        return $this->nextEvents;
    }

    public function setNextEvents(array $data): self
    {
        $this->nextEvents = $data;
        return $this;
    }

    //METHODS
    public function display(): void
    {
        ob_start();
?>
        <img class="cover" alt="paysage" height="400" src="./assets/media/img/belvis-la-soula-de-picaussel.png">

        <main>

            <h1>Pays de Sault en Pyrénées Audoises</h1>

            <p>Le Pays de Sault (aussi appelé le Plateau de Sault) est une région naturelle et un territoire historique situé dans le département de l’Aude dans le sud de la France. La région est connue aujourd’hui pour ses randonnées, ses châteaux et églises, et pour sa foire d’élevage départementale.</p>

            <a class="btnPrincipal" href="<?= $_ENV['histoire'] ?>">Découvrez l'histoire du Pays de Sault<span class="ms-24">chevron_right</span></a>

        </main>

        <img class="cover" alt="paysage" height="200" src="./assets/media/img/mazuby.jpg">

        <section id="prochainsEvents">

            <h2>Les prochains événements</h2>

            <?php
            foreach ($this->getNextEvents() as $row) {
            ?>

                <article class="eventCard">
                    <picture>
                        <source id="s1" srcset="<?= $row['image'] ?>">
                        <source srcset="./assets/media/placeholder-400x300.png">
                        <img alt="" src="./assets/media/placeholder-400x300.png">
                    </picture>
                    <div class="date">
                        <p><?= $this->jour($row['start_date']) ?></p>
                        <p><?= $this->mois($row['start_date']) ?></p>
                    </div>
                    <h3><?= $row['title'] ?></h3>
                    <div class="tags">
                        <a class="tag" href="#"><span class="ms">villa</span><?= $row['village'] ?></a>
                        <a class="tag" href="#"><span class="ms"><?= $row['icon'] ?></span><?= $row['name'] ?></a>
                    </div>
                    <a class="btnSecondaire" href="#">En savoir plus</a>
                </article>
            <?php
            }
            ?>

            <a class="btnPrincipal" href="<?= $_ENV['agenda'] ?>">Voir tous les événements<span class="ms-24">chevron_right</span></a>

        </section>

<?php
        ob_end_flush();
    }
}
