<?php

namespace Controller;

class ControllerConnexion extends Controller
{
    //ATTRIBUTS

    //CONSTRUCTEUR

    //GETTER ET SETTER

    //METHODS
    public function seConnecter(): void
    {
        if (isset($_POST['connexion'])) {

            if (empty($_POST['email']) || empty($_POST['password'])) {
                $this->getView()->setMessage('Veuillez remplir tous les champs');
                return;
            }

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $this->getView()->setMessage('Email pas au bon format');
                return;
            }

            $email = \Tools::sanitize($_POST['email']);
            $password = \Tools::sanitize($_POST['password']);

            $data = $this->getModel()->setEmail($email)->findByEmail();

            if (!$data) {
                $this->getView()->setMessage('Email et/ou Mot de Passe incorrect');
                return;
            }

            if (!password_verify($password, $data['password'])) {
                //si l'email ne correspond à aucun compte
                $this->getView()->setMessage('Email et/ou Mot de Passe incorrect');
                return;
            }

            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['createdAt'] = $data['created_at'];

            $this->getView()->setMessage('Vous êtes bien connecté.');
        }
    }

    public function registerUser(): void
    {
        if (isset($_POST['inscription'])) {

            if (empty($_POST['emailInscription']) || empty($_POST['passwordInscription']) || empty($_POST['passwordVerify'])) {
                $this->getView()->setMessage('Veuillez remplir tous les champs.');
                return;
            }

            if (!filter_var($_POST['emailInscription'], FILTER_VALIDATE_EMAIL)) {
                $this->getView()->setMessage("L'Email n'est pas au bon format.");
                return;
            }

            if ($_POST['passwordInscription'] !== $_POST['passwordVerify']) {
                $this->getView()->setMessage("Vos mots de passe ne correspondent pas.");
                return;
            }

            $email = \Tools::sanitize($_POST['emailInscription']);
            $password = \Tools::sanitize($_POST['passwordInscription']);

            $password = password_hash($password, PASSWORD_DEFAULT);

            $this->getModel()->setEmail($email)->setPassword($password);

            $data = $this->getModel()->findByEmail();
            if ($data) {
                $this->getView()->setMessage("Cet email est déjà pris.");
                return;
            }

            $this->getModel()->addUser();

            $this->getView()->setMessage("Vous avez bien été enregistré.");
        }
    }

    public function render()
    {
        if (isset($_SESSION) && !empty($_SESSION['id'])) {
            header('location:' . $_ENV['espaceOrganisateur']);
            exit;
        }
        $this->getView()->displayAll();
    }
}
