<?php

namespace View;

class View
{
    //ATTRIBUTS
    private ViewHeader $viewHeader;
    private ViewFooter $viewFooter;
    private array $futureEvents = [];
    private array $userData = [];

    //CONSTRUCTEUR
    public function __construct(string $titre, string $css = "", string $js = "", string $links = "")
    {
        $this->viewHeader = new ViewHeader($titre, $css, $js, $links);
        $this->viewFooter = new ViewFooter();
    }

    //GETTER ET SETTER

    public function getUserData(): ?array
    {
        return $this->userData;
    }

    public function setUserData(array $data): self
    {
        $this->userData = $data;
        return $this;
    }

    public function getHeader(): ViewHeader
    {
        return $this->viewHeader;
    }

    public function getFooter(): ViewFooter
    {
        return $this->viewFooter;
    }

    //METHODS
    public function jour(string $date): int
    {
        $date = new \DateTimeImmutable($date);
        $jour = date_format($date, 'd');
        return $jour;
    }

    public function mois(string $date): string
    {
        $date = new \DateTimeImmutable($date);
        $mois = date_format($date, 'n');
        switch ($mois) {
            case 1:
                $mois = "Jan.";
                break;
            case 2:
                $mois = "Fev.";
                break;
            case 3:
                $mois = "Mars";
                break;
            case 4:
                $mois = "Avr.";
                break;
            case 5:
                $mois = "Mai";
                break;
            case 6:
                $mois = "Juin";
                break;
            case 7:
                $mois = "Jui.";
                break;
            case 8:
                $mois = "Août";
                break;
            case 9:
                $mois = "Sep.";
                break;
            case 10:
                $mois = "Oct.";
                break;
            case 11:
                $mois = "Nov.";
                break;
            case 12:
                $mois = "Déc.";
                break;
        }
        return $mois;
    }

    public function display(): void
    {
        ob_start();
?>
        <main>

        </main>
<?php
        ob_end_flush();
    }

    public function displayAll(): void
    {
        $this->viewHeader->display();
        $this->display();
        $this->viewFooter->display();
    }
}
