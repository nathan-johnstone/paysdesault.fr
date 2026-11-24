<?php

namespace Model;

use PDO, EXCEPTION;

class ModelEvent extends Model
{
    //ATTRIBUTS
    private ?int $id;
    private ?string $title;
    private ?string $village;
    private ?string $address;
    private ?string $description;
    private ?string $start_date;
    private ?string $end_date;
    private ?string $start_time;
    private ?string $end_time;
    private ?int $user_id;
    private ?int $category_id;
    private ?string $name;
    private ?string $icon;
    private ?string $image;

    //CONSTRUCTEUR

    //GETTER ET SETTER
    public function setTitle(string $newTitle): self
    {
        $this->title = $newTitle;
        return $this;
    }

    public function getTitle(): ?array
    {
        return $this->title;
    }

    public function setVillage(string $newVillage): self
    {
        $this->village = $newVillage;
        return $this;
    }

    public function setAddress(string $newAddress): self
    {
        $this->address = $newAddress;
        return $this;
    }

    public function setDescription(string $newDescription): self
    {
        $this->description = $newDescription;
        return $this;
    }

    public function setStartDate(string $newStartDate): self
    {
        $this->start_date = $newStartDate;
        return $this;
    }

    public function setEndDate(string $newEndDate): self
    {
        $this->end_date = $newEndDate;
        return $this;
    }

    public function setStartTime(string $newStartDate): self
    {
        $this->start_time = $newStartDate;
        return $this;
    }

    public function setEndTime(string $newEndDate): self
    {
        $this->end_time = $newEndDate;
        return $this;
    }

    public function setUserId(string $newUserId): self
    {
        $this->user_id = $newUserId;
        return $this;
    }

    public function setCategoryId(string $newCategoryId): self
    {
        $this->category_id = $newCategoryId;
        return $this;
    }

    //METHODS
    function getAllEvents(): ?array
    {
        try {
            $req = $this->getBdd()->prepare('SELECT e.id, e.title, e.village, e.address, e.description, e.start_date, e.end_date, e.start_time, e.end_time, u.id, c.name, c.icon, c.image FROM `event` e INNER JOIN `user` u ON u.id = e.user_id INNER JOIN category c ON c.id = e.category_id');
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }
    }

    function getFutureEvents(): ?array
    {
        try {
            $req = $this->getBdd()->prepare('SELECT e.id, e.title, e.village, e.address, e.description, e.start_date, e.end_date, e.start_time, e.end_time, u.id, c.name, c.icon, c.image FROM `event` e INNER JOIN `user` u ON u.id = e.user_id INNER JOIN category c ON c.id = e.category_id WHERE e.start_date >= CURRENT_DATE ORDER BY e.start_date');
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }
    }

    function getNextEvents(): ?array
    {
        try {
            $req = $this->getBdd()->prepare('SELECT e.id, e.title, e.village, e.start_date, c.name, c.icon, c.image FROM `event` e INNER JOIN category c ON c.id = e.category_id WHERE e.start_date >= CURRENT_DATE ORDER BY e.start_date LIMIT 4');
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }
    }

    function getAllCategories(): array
    {
        try {
            $req = $this->getBdd()->prepare('SELECT id, `name`, icon, `image` FROM category ORDER BY id');
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }
    }

    public function addEvent()
    {
        try {
            $req = $this->getBDD()->prepare('INSERT INTO `event` (title, village, `address`, `description`, `start_date`, end_date, start_time, end_time, category_id, user_id) VALUES (?,?,?,?,?,?,?,?,?,?)');

            $req->bindParam(1, $this->title, PDO::PARAM_STR);
            $req->bindParam(2, $this->village, PDO::PARAM_STR);
            $req->bindParam(3, $this->address, PDO::PARAM_STR);
            $req->bindParam(4, $this->description, PDO::PARAM_STR);
            $req->bindParam(5, $this->start_date, PDO::PARAM_STR);
            $req->bindParam(6, $this->end_date, PDO::PARAM_STR);
            $req->bindParam(7, $this->start_time, PDO::PARAM_STR);
            $req->bindParam(8, $this->end_time, PDO::PARAM_STR);
            $req->bindParam(9, $this->category_id, PDO::PARAM_INT);
            $req->bindParam(10, $this->user_id, PDO::PARAM_INT);

            $req->execute();
        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }
    }
}
