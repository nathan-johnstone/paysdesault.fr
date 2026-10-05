<?php

namespace Model;

use PDO, EXCEPTION;

class ModelOrganisateur extends Model
{
    //ATTRIBUTS
    private ?int $id;
    private ?string $title;
    private ?string $email;
    private ?string $created_at;
    private ?int $role_id;
    private ?string $role;
    private ?int $user;

    //CONSTRUCTEUR
    public function __construct()
    {
        parent::__construct();
        $this->user = $_SESSION['id'] ?? null;
    }

    //GETTER ET SETTER

    //METHODS
    function getUserData(): ?array
    {
        try {
            $req = $this->getBdd()->prepare('SELECT u.id, u.name, u.email, u.created_at, r.role FROM user u INNER JOIN `role` r ON r.id = u.role_id');
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }
    }

    function getUserEvents(): ?array
    {
        try {
            $req = $this->getBdd()->prepare('SELECT e.id, e.title, e.village, e.address, e.description, e.start_date, e.end_date, e.start_time, e.end_time, u.id, c.name, c.icon, c.image FROM `event` e INNER JOIN `user` u ON u.id = e.user_id INNER JOIN category c ON c.id = e.category_id WHERE u.id = ? ORDER BY e.start_date DESC');
            $req->execute([$this->user]);
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }
    }
}
