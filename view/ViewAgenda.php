<?php

namespace View;

class ViewAgenda extends View
{
    //ATTRIBUTS
    private array $futureEvents = [];

    //CONSTRUCTEUR

    //GETTER ET SETTER
    public function getFutureEvents(): ?array
    {
        return $this->futureEvents;
    }

    public function setFutureEvents(array $data): self
    {
        $this->futureEvents = $data;
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
                <li aria-current="page"><a>Agenda</a></li>
            </ul>
        </nav>

        <main>

            <h1>Agenda</h1>

            <section id="prochainsEvents">

                <?php
                foreach ($this->getFutureEvents() as $row) {
                ?>

                    <article class="eventCard">
                        <picture>
                            <source srcset="<?= $row['image'] ?>">
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

            </section>

        </main>
<?php
        ob_end_flush();
    }
}
