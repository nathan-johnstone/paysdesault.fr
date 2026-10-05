<?php

namespace View;

class ViewHeader
{
    //ATTRIBUTS
    private ?string $title;
    private ?string $css;
    private ?string $js;
    private ?string $links;

    //CONSTRUCTOR
    public function __construct(string $title, string $css, string $js, string $links)
    {
        $this->title = $title;
        $this->css = $css;
        $this->js = $js;
        $this->links = $links;
    }

    //GETTER ET SETTER

    //METHOD
    public function display()
    {
        ob_start();
?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $this->title ?> - Pays de Sault en Pyrénées Audoises</title>
            <link rel="apple-touch-icon" href="/assets/media/apple-touch-icon.png">
            <link rel="icon" href="/assets/media/favicon.ico">
            <?php if ($this->links) {
                echo $this->links;
            } ?>
            <link rel="stylesheet" href="/assets/css/style.css">
            <?php if ($this->css) { ?>
                <link rel="stylesheet" href="<?= $this->css ?>">
            <?php } ?>
            <script src="/assets/js/main.js" defer></script>
            <?php if ($this->js) { ?>
                <script src="<?= $this->js ?>" defer></script>
            <?php } ?>
        </head>

        <body>
            <header>
                <a href="<?= $_ENV['accueil'] ?>"><img alt="Logo du site" src="/assets/media/logo/PdsLogoVert.png"></a>
                <menu aria-label="navigation principale">
                    <li aria-label="Accueil">
                        <a href="<?= $_ENV['accueil'] ?>"><span aria-hidden="true" class="ms-24 ms-fill-hover">cottage</span>
                            <p>Accueil</p>
                        </a>
                    </li>
                    <li aria-label="Villages">
                        <a href="<?= $_ENV['villages'] ?>"><span aria-hidden="true" class="ms-24 ms-fill-hover">villa</span>
                            <p>Villages</p>
                        </a>
                    </li>
                    <li aria-label="Agenda">
                        <a href="<?= $_ENV['agenda'] ?>"><span aria-hidden="true" class="ms-24 ms-fill-hover">calendar_month</span>
                            <p>Agenda</p>
                        </a>
                    </li>
                    <li aria-label="Lieux">
                        <a href="<?= $_ENV['lieux'] ?>"><span aria-hidden="true" class="ms-24 ms-fill-hover">map_search</span>
                            <p>Lieux</p>
                        </a>
                    </li>
                </menu>
            </header>
    <?php
        ob_end_flush();
    }
}
