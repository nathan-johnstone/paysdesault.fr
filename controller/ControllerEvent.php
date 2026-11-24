<?php

namespace Controller;

class ControllerEvent extends Controller
{
    //ATTRIBUTS

    //CONSTRUCTEUR

    //GETTER ET SETTER

    //METHODS
    public function newEvent(): void
    {
        if (isset($_POST['ajouter'])) {

            if (empty($_POST['title']) || empty($_POST['village']) || empty($_POST['address']) || empty($_POST['description']) || empty($_POST['start_date']) || empty($_POST['end_date']) || empty($_POST['start_time']) || empty($_POST['end_time']) || empty($_POST['category_id'])) {
                $this->getView()->setMessage('Veuillez remplir tous les champs.');
                return;
            }

            if (strtotime($_POST['start_date']) > strtotime($_POST['end_date'])) {
                $this->getView()->setMessage('La date de début doit être inférieure à la date de fin.');
                return;
            }

            if (strtotime($_POST['start_date']) === strtotime($_POST['end_date']) && strtotime($_POST['start_time']) > strtotime($_POST['end_time'])) {
                $this->getView()->setMessage('L\'heure de début doit être inférieure à l\'heure de fin.');
                return;
            }

            if (strtotime($_POST['start_date']) === strtotime($_POST['end_date']) && strtotime($_POST['start_time']) === strtotime($_POST['end_time'])) {
                $this->getView()->setMessage('L\'heure de début doit être différente de l\'heure de fin.');
                return;
            }

            if (strtotime($_POST['start_date']) < strtotime(date("Y-m-d"))) {
                $this->getView()->setMessage('La date de début doit être supérieure ou égale à la date du jour.');
                return;
            }

            $title = \Tools::sanitize($_POST['title']);
            $village = \Tools::sanitize($_POST['village']);
            $address = \Tools::sanitize($_POST['address']);
            $description = \Tools::sanitize($_POST['description']);
            $start_date = \Tools::sanitize($_POST['start_date']);
            $end_date = \Tools::sanitize($_POST['end_date']);
            $start_time = \Tools::sanitize($_POST['start_time']);
            $end_time = \Tools::sanitize($_POST['end_time']);
            $category_id = \Tools::sanitize($_POST['category_id']);

            $this->getModel()
            ->setTitle($title)
            ->setVillage($village)
            ->setAddress($address)
            ->setDescription($description)
            ->setStartDate($start_date)
            ->setEndDate($end_date)
            ->setStartTime($start_time)
            ->setEndTime($end_time)
            ->setCategoryId($category_id)
            ->setUserId($_SESSION["id"]);

            $this->getModel()->addEvent();

            $this->getView()->setMessage("L'événement a bien été enregistré.");
        }
    }

    public function render()
    {
        if (!isset($_SESSION) || empty($_SESSION['id'])) {
            header('location:' . $_ENV['connexion']);
            exit;
        }
        $this
            ->getView()
            ->setCategories($this->getModel()->getAllCategories())
            ->displayAll();
    }
}
