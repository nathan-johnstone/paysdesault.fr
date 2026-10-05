<?php

namespace View;

class ViewFooter
{
    //ATTRIBUTS

    //CONSTRUCTEUR

    //GETTER ET SETTER

    //METHODS
    public function display(): void
    {
        ob_start();
?>
        <footer>
            <menu aria-label="navigation secondiare">
                <li><a href="<?= $_ENV['histoire'] ?>">L'histoire du Pays de Sault</a></li>
                <li><a href="<?= $_ENV['espaceOrganisateur'] ?>">Espace organisateur</a></li>
                <li><a href="https://buymeacoffee.com/nathan.johnstone" target="_blank">Soutenir le projet</a></li>
                <li><a href="<?= $_ENV['mentionsLegales'] ?>">Mentions légales</a></li>
                <li><a href="<?= $_ENV['accessibilite'] ?>">Accessibilité : non conforme</a></li>
            </menu>
            <div aria-label="réseaux sociaux">
                <a href="https://www.facebook.com/paysdesaultfr" target="_blank"><img alt="facebook" src="/assets/media/rs/facebook-logo.png"></img></a>
                <a href="https://www.instagram.com/paysdesault/" target="_blank"><img alt="instagram" src="/assets/media/rs/instagram-logo.svg"></img></a>
                <a href="https://buymeacoffee.com/nathan.johnstone" target="_blank"><img alt="buy me a coffee" src="/assets/media/rs/bmc-button.png"></img></a>
            </div>
            <p>© 2026 Pays de Sault en Pyrénées Audoises. Site crée par <a href="https://github.com/nathan-johnstone" target="_blank">Nathan JOHNSTONE</a></p>
        </footer>
        </body>

        </html>
<?php
        ob_end_flush();
    }
}
