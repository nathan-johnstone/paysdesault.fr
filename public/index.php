<?php
//SESSION
session_start();

//TOOLS
include('../tools/env.php');
include('../tools/tools.php');

//PATHS
$_ENV['accueil'] = "/";
$_ENV['villages'] = "/villages";
$_ENV['agenda'] = "/agenda";
$_ENV['lieux'] = "/lieux";
$_ENV['espaceOrganisateur'] = "/espace-organisateur";
$_ENV['addEvent'] = $_ENV['espaceOrganisateur'] . "/add-event";
$_ENV['histoire'] = "/histoire";
$_ENV['connexion'] = "/connexion";
$_ENV['deconnexion'] = "/deconnexion";
$_ENV['accessibilite'] = "/accessibilite";
$_ENV['mentionsLegales'] = "/mentions-legales";

//AUTOLOADER
spl_autoload_register(function (string $class) {
    if (str_starts_with($class, 'Controller')) {
        $class = explode('\\', $class);
        include(dirname(__DIR__) . "/controller/" . $class[1] . ".php");
    } elseif (str_starts_with($class, 'Model')) {
        $class = explode('\\', $class);
        include(dirname(__DIR__) . "/model/" . $class[1] . ".php");
    } elseif (str_starts_with($class, 'View')) {
        $class = explode('\\', $class);
        include(dirname(__DIR__) . "/view/" . $class[1] . ".php");
    }
});

//ROUTEUR
$url = parse_url($_SERVER['REQUEST_URI']);
$path = isset($url['path']) ? $url['path'] : '/';
switch ($path) {
    case $_ENV['accueil']:
        $controller = new Controller\ControllerAccueil(new Model\ModelEvent, new View\ViewAccueil("Acceuil"));
        $controller->render();
        break;
    case $_ENV['histoire']:
        $controller = new Controller\Controller(new Model\Model, new View\ViewHistoire("Histoire"));
        $controller->render();
        break;
    case $_ENV['villages']:
        $controller = new Controller\Controller(new Model\Model, new View\ViewVillages("Villages", "", "./assets/js/villages.js", '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>'));
        $controller->render();
        break;
    case $_ENV['lieux']:
        $controller = new Controller\Controller(new Model\Model, new View\ViewLieux("Lieux"));
        $controller->render();
        break;
    case $_ENV['agenda']:
        $controller = new Controller\ControllerAgenda(new Model\ModelEvent, new View\ViewAgenda("Agenda"));
        $controller->render();
        break;
    case $_ENV['espaceOrganisateur']:
        $controller = new Controller\ControllerOrganisateur(new Model\ModelOrganisateur, new View\ViewOrganisateur("Espace Organisateur"));
        $controller->render();
        break;
    case $_ENV['addEvent']:
        $controller = new Controller\ControllerAddEvent(new Model\ModelEvent, new View\ViewAddEvent("Ajouter un événement"));
        $controller->newEvent();
        $controller->render();
        break;
    case $_ENV['accessibilite']:
        $controller = new Controller\Controller(new Model\Model, new View\ViewAccessibilite("Accessibilité"));
        $controller->render();
        break;
    case $_ENV['mentionsLegales']:
        $controller = new Controller\Controller(new Model\Model, new View\ViewMentionsLegales("Mentions Légales"));
        $controller->render();
        break;
    case $_ENV['connexion']:
        $controller = new Controller\ControllerConnexion(new Model\ModelConnexion, new View\ViewConnexion("Connexion"));
        $controller->seConnecter();
        $controller->render();
        break;
    case $_ENV['deconnexion']:
        session_destroy();
        header('location:'.$_ENV['accueil']);
        exit;
    default:
        $controller = new Controller\Controller(new Model\Model, new View\View404("404"));
        $controller->render();
        break;
};
