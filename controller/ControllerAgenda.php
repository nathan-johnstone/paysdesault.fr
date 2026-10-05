<?php

namespace Controller;

class ControllerAgenda extends Controller
{
    //ATTRIBUTS

    //CONSTRUCTEUR

    //GETTER ET SETTER

    //METHODS
    public function render()
    {
        $this
            ->getView()
            ->setFutureEvents($this->getModel()->getFutureEvents())
            ->displayAll();
    }
}
