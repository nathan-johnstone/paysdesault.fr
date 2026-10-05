<?php

namespace Controller;

use Model\Model;
use View\View;

class Controller
{
    //ATTRIBUTS
    private Model $model;
    private View $view;

    //CONSTRUCTEUR
    public function __construct(Model $model, View $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    //GETTER ET SETTER
    public function getModel(): Model
    {
        return $this->model;
    }

    public function getView(): View
    {
        return $this->view;
    }

    //METHODS
    public function render()
    {
        $this->view->displayAll();
    }
}
