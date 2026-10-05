<?php

namespace Model;

use PDO, EXCEPTION;
use Tools;

class Model
{
    //ATTRIBUTS
    private PDO $bdd;

    //CONSTRUCTEUR
    public function __construct()
    {
        $this->bdd = Tools::connect();
    }

    //GETTER ET SETTER
    public function getBdd()
    {
        return $this->bdd;
    }

    //METHODS

}
