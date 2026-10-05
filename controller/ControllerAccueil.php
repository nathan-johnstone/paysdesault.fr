<?php

namespace Controller;

class ControllerAccueil extends Controller
{
    //ATTRIBUTS

    //CONSTRUCTEUR

    //GETTER ET SETTER

    //METHODS
    public function render()
    {
        $this
            ->getView()
            ->setNextEvents($this->getModel()->getNextEvents())
            ->displayAll();
    }
}
