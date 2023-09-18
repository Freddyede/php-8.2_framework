<?php

namespace Core\ORM\Repository\Requests;


use Core\Traits\ORM\Repository\Requests\FindTrait;
use PDO;

class RepositoryRequest
{

    /**
     * @var PDO|null
     * @access private
     * @static
     * @version 0.0.1
     */
    private static PDO|null $instance = null;
    private static string $tableName;

    public function __construct()
    {
    }


    /**
     * New Repository()
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     * @return RepositoryRequest|null
     * @version 0.0.1
     */
    // section instances
    public static function getInstance(): ?PDO
    {
        if (is_null(self::$instance)) {
            include_once __DIR__ . '/../../../../index.php';
            self::$instance = new PDO('mysql:host=localhost;dbname=' . DATABASES['database'], DATABASES['username'], DATABASES['password']);
        } else {
            self::$instance = NULL;
        }

        return self::$instance;
    }

    use FindTrait;

    /**
     * @method getRepository
     * @desc Method getRepository(): Get entity with ::class method
     * @version 0.0.1
     */
    public static function getRepository(string $tableName = NULL): void
    {
        self::$tableName = $tableName;
    }

}
