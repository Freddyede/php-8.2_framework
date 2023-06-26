<?php

namespace Core\Traits\ORM\Repository\Requests;

trait   FindTrait
{

    /**
     * @return bool|array
     * @version 0.0.1
     */
    public static function findAll(): bool|array
    {
        $query = 'SELECT * FROM ' . self::$tableName;
        $pdo = self::getInstance();
        return $pdo->query($query)->fetchAll();
    }

    /**
     * @return string
     * @version 0.0.1
     */
    public static function getTableName(): string {
        return self::$tableName;
    }

    /**
     * @param int $id
     * @return bool|array
     * @version 0.0.1
     */
    public function find(int $id): bool|array {
        $query = 'SELECT * FROM ' . self::$tableName . ' WHERE id = :id';
        $pdo = self::getInstance();
        $res = $pdo->prepare($query);
        $res->execute([
            ':id' => $id
        ]);
        return $res->fetchAll();
    }
}
