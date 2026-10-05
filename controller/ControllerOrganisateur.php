<?php

namespace Controller;

class ControllerOrganisateur extends Controller
{
    //ATTRIBUTS

    //CONSTRUCTEUR

    //GETTER ET SETTER

    //METHODS
    public function render()
    {
        if (!isset($_SESSION) || empty($_SESSION['id'])) {
            header('location:' . $_ENV['connexion']);
            exit;
        }
        $this
            ->getView()
            ->setUserData($this->getModel()->getUserData())
            ->setUserEvents($this->getModel()->getUserEvents())
            ->displayAll();
    }
}
