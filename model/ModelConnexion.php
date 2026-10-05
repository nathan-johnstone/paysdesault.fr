<?php

namespace Model;

use PDO, EXCEPTION;

class ModelConnexion extends Model
{
    //ATTRIBUTS
    private ?int $id; // le ? signifie que l'attribut a le droit d'être null
    private ?string $email;
    private ?string $password;
    private ?string $createdAt;
    private ?string $role;

    //CONSTRUCTEUR

    //GETTER ET SETTER

    public function setEmail(string $newEmail): self
    {
        $this->email = $newEmail;
        return $this;
    }

    public function setPassword(string $newPassword): self
    {
        $this->password = $newPassword;
        return $this;
    }

    //METHODS
    public function findAll(): ?array
    {
        try {
            $req = $this->getBDD()->prepare('SELECT u.id, u.email, u.password, u.created_at, r.role FROM user u INNER JOIN role r ON r.id = u.role_id');

            $req->execute();

            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }
    }

    public function findByEmail(): array | bool | null
    {
        try {
            $req = $this->getBDD()->prepare('SELECT u.id, u.email, u.password, u.created_at, r.role FROM user u INNER JOIN role r ON r.id = u.role_id WHERE u.email = ?');

            $req->bindParam(1, $this->email, PDO::PARAM_STR);

            $req->execute();

            return $req->fetch(PDO::FETCH_ASSOC); //fetch => [id : 1, pseudo : "root", ...] : directement le tableau associatif

        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }
    }

    public function addUser()
    {
        try {
            $req = $this->getBDD()->prepare('INSERT INTO user (email, password) VALUES (?,?)');

            $req->bindParam(1, $this->email, PDO::PARAM_STR);
            $req->bindParam(2, $this->password, PDO::PARAM_STR);

            $req->execute();
        } catch (EXCEPTION $error) {
            die($error->getMessage());
        }
    }
}
