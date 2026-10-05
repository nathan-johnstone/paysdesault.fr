<?php

namespace View;

class ViewAccessibilite extends View
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
                <li aria-current="page"><a>Accessibilité</a></li>
            </ul>
        </nav>

        <main>

            <h1>Déclaration d'accessibilité</h1>

            <p>[Nom de l’entité] s’engage à rendre ses sites internet, intranet, extranet et ses progiciels accessibles (et ses applications mobiles et mobilier urbain numérique) conformément à l’article 47 de la loi n°2005-102 du 11 février 2005.</p>

            <p>À cette fin, [Nom de l’entité] met en œuvre la stratégie et les actions suivantes :</p>

            <ul>
                <li>Schéma pluriannuel de mise en accessibilité 2022-2024 [url] ;</li>
                <li>Actions réalisées en 2020-2021 [url] ;</li>
                <li>Plan d’actions 2022-2024 [url].</li>
            </ul>

            <p>Cette déclaration d’accessibilité s’applique à [www.nomdusite.gouv.fr].</p>

            <h2>État de conformité</h2>

            <p>[Nom du site (url du site)] est non/partiellement/totalement conforme avec le référentiel général d’amélioration de l’accessibilité (RGAA), version 4 en raison des non-conformités et des dérogations énumérées ci-dessous.</p>

            <h3>Résultats des tests</h3>

            <p>L’audit de conformité réalisé par [nom de l’entité qui a réalisé l’audit] révèle que :</p>

            <ul>
                <li>[nn]% des critères du RGAA version 4 sont respectés ;</li>
                <li>(Facultatif) Le taux moyen de conformité du site s’élève à [nn]% ;</li>
                <li>(Facultatif) Accès à la grille d’audit RGAA [url] pour télécharger la grille d’audit.</li>
            </ul>

            <h2>Contenus non accessibles</h2>

            <h3>Non-conformités</h3>

            <p>Exemples :</p>

            <ul>
                <li>La vidéo de présentation de la demande d’aide n’a pas de transcription. Pour toute question sur cette démarche, vous pouvez contacter le NN NN NN NN NN. La version 2020 respectera les critères du RGAA sur les alternatives texte pour les documents multimédias.</li>
                <li>Le bouton d’envoi du formulaire de déclaration contient un intitulé « Retour » au lieu de « Envoi ». Cette erreur sera corrigée avant le 31 mars 2020</li>
                <li>La connexion au compte personnel contient une vérification que vous n’êtes pas un robot avec un captcha visuel. Il est possible d’effectuer sa démarche par téléphone ou au guichet pour les personnes empêchées d’accéder à leur compte...</li>
            </ul>

            <h3>Dérogations pour charge disproportionnée</h3>

            <p>Exemple : Les archives des comptes rendus des séances du conseil municipal jusqu’en 2010 sont au format PDF image. Il est cependant possible d’en demander un exemplaire texte par courriel</p>

            <h3>Contenus non soumis à l’obligation d’accessibilité</h3>

            <p>Exemples :</p>

            <ul>
                <li>Cartes de l’Institut géographique national associées à l’annuaire</li>
                <li>Reproduction du manuscrit du Moyen-Âge...</li>
            </ul>

            <h2>Établissement de cette déclaration d’accessibilité</h2>

            <p>Cette déclaration a été établie le [JJ/MM/AAAA]. Elle a été mise à jour le [JJ/MM/AAAA].</p>

            <h3>Technologies utilisées pour la réalisation du site</h3>

            <ul>
                <li>HTML5</li>
                <li>CSS</li>
                <li>...</li>
            </ul>

            <h3>Environnement de test</h3>

            <p>Les vérifications de restitution de contenus ont été réalisées sur la base de la combinaison fournie par la base de référence du RGAA, avec les versions suivantes :</p>

            <ul>
                <li>Firefox et NVDA</li>
                <li>Safari et VoiceOver</li>
                <li>...</li>
            </ul>

            <h3>Outils pour évaluer l’accessibilité</h3>

            <ul>
                <li>color contrast analyzer</li>
                <li>inspecteur de code</li>
                <li>...</li>
            </ul>

            <h3>Pages du site ayant fait l’objet de la vérification de conformité</h3>

            <ul>
                <li>page d’accueil [url]</li>
                <li>page contact [url]</li>
                <li>page mentions légales [url]</li>
                <li>page accessibilité [url]</li>
                <li>page plan du site [url]</li>
                <li>page d’aide [url]</li>
                <li>...</li>
            </ul>

            <h2>Retour d’information et contact</h2>

            <p>Si vous n’arrivez pas à accéder à un contenu ou à un service, vous pouvez contacter le responsable de [nom du site] pour être orienté vers une alternative accessible ou obtenir le contenu sous une autre forme.</p>

            <ul>
                <li>Envoyer un message [url du formulaire en ligne] ;</li>
                <li>Contacter [Nom de l’entité responsable du service en ligne et coordonnées].</li>
            </ul>

            <h2>Voies de recours</h2>

            <p>Si vous constatez un défaut d’accessibilité vous empêchant d’accéder à un contenu ou une fonctionnalité du site, que vous nous le signalez et que vous ne parvenez pas à obtenir une réponse de notre part, vous êtes en droit de faire parvenir vos doléances ou une demande de saisine au Défenseur des droits.</p>

            <p>Plusieurs moyens sont à votre disposition :</p>

            <ul>
                <li>Écrire un message au Défenseur des droits</li>
                <li>Contacter le délégué du Défenseur des droits dans votre région</li>
                <li>Envoyer un courrier par la poste (gratuit, ne pas mettre de timbre) :<br />
                    Défenseur des droits<br />
                    Libre réponse 71120<br />
                    75342 Paris CEDEX 07</li>
            </ul>

        </main>

<?php
        ob_end_flush();
    }
}
