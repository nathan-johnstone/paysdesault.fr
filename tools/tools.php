<?php
class Tools
{
    public static function connect(): PDO
    {
        return new PDO(
            'mysql:host=' . BDD_HOST . ';dbname=' . BDD_NAME . ';charset=utf8mb4',
            BDD_USERNAME,
            BDD_PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    public static function sanitize(string $str): string // à changer
    {
        return htmlentities(
            strip_tags(
                trim($str)
            )
        );
    }

    public static function passwordHash(?string $password): array
    {
        if (empty($password)) {
            return ['message' => "Mot de passe invalide", 'code' => 'invalide'];
        }
        return ['message' => password_hash($password, PASSWORD_DEFAULT), 'code' => 'correct'];
    }
}
