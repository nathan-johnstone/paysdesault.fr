<?php

namespace View;

class ViewOrganisateur extends View
{
    //ATTRIBUTS
    private array $userEvents = [];

    //CONSTRUCTEUR

    //GETTER ET SETTER
    public function getUserEvents(): ?array
    {
        return $this->userEvents;
    }

    public function setUserEvents(array $data): self
    {
        $this->userEvents = $data;
        return $this;
    }

    //METHODS
    public function display(): void
    {
        ob_start();
?>
        <main>

            <nav aria-label="breadcrumb">
                <ul>
                    <li aria-label="Accueil"><a href="<?= $_ENV['accueil'] ?>">Accueil</a></li>
                    <li aria-current="page"><a>Espace organisateur</a></li>
                </ul>
            </nav>

            <h1>Espace organisateur</h1>

            <a href="<?= $_ENV['deconnexion'] ?>">Se déconnecter</a>

            <section>
                <h2>Mes informations</h2>
                <ul>
                    <li>Nom : <?= $this->getUserData()['name'] ?></li>
                    <li>Email : <?= $this->getUserData()['email'] ?></li>
                    <li>Date de création : <?= $this->getUserData()['created_at'] ?></li>
                    <li>Rôle : <?= $this->getUserData()['role'] ?></li>
                </ul>
            </section>

            <section>
                <h2>Mes événements</h2>
                <a href="<?= $_ENV['addEvent'] ?>">Ajouter un événement</a>
                <ul>
                    <?php
                    foreach ($this->getUserEvents() as $row) {
                    ?>
                        <li><?= $row['title'] ?> - <?= $row['start_date'] ?></li>
                    <?php
                    }
                    ?>
                </ul>

            </section>

        </main>
<?php
        ob_end_flush();
    }
}
