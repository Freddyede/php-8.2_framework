<?php

namespace Core\Modules;

use PDO;

class ObjectRelationMappingModules
{
    private static array $multipleDatabases = [];

    public static function getPdo(bool $activatedArray, ?array $multipleDatabases = NULL): array|null|PDO
    {

        require __DIR__ . '/../../bin/init/databases.php';
        if ($activatedArray) {
            for ($i = 0; $i < count($multipleDatabases); $i++) {
                (
                    !empty($multipleDatabases[$i]['username']) &&
                    !empty($multipleDatabases[$i]['password']) &&
                    !empty($multipleDatabases[$i]['databases'])
                ) ? $multipleDatabases[$i] = new PDO('mysql:host=localhost;dbname=' . $multipleDatabases[$i]['databases'], $multipleDatabases[$i]['username'], $multipleDatabases[$i]['password']) : NULL;
            }

            return $multipleDatabases;
        }
        return (
            !empty(DATABASES['username']) &&
            !empty(DATABASES['password']) &&
            !empty(DATABASES['databases'])
        ) ? new PDO('mysql:host=localhost;dbname=' . DATABASES['databases'], DATABASES['username'], DATABASES['password']) : NULL;
    }
}