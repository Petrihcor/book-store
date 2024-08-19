<?php

namespace App;

use Src\Book;

class Database
{
    private \PDO $pdo;
    public function __construct()
    {
        $options = require_once __DIR__ . '/../Config/db.php';
        try {
            $this->pdo = new \PDO(
                "mysql:host={$options['host']};dbname={$options['dbname']}",
                $options['username'],
                $options['password'],
                $options['options']
            );
        } catch (\PDOException $exception){
            exit($exception->getMessage());
        }
    }


    public function find(string $table, string $column, $value) {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $column = :{$column}");
        $stmt->execute([
            $column => $value,
        ]);
        return $stmt->fetch();
    }
    public function findall($table, $column=null, $value=null) {
        $sql = "SELECT * FROM $table ";
        if ($column) {
            $sql .= "WHERE $column = :{$column}";
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $column => $value
        ]);


        return $stmt->fetchAll();
    }

    public function insert(string $table, array $data)
    {
        $keys = array_keys($data);
        $columns = implode(', ', $keys);
        $values = implode(', :', $keys);
        $sql = "INSERT INTO $table($columns) VALUES (:$values)";

        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute($data);
        } catch (\PDOException $exception) {
            exit($exception->getMessage());
        }
        return $stmt->rowCount();
    }

    public function update(string $table, array $data, int $id)
    {
        $data['id'] = $id;
        $keys = array_keys($data);
        $setters = array_map(function ($key) {
            return "$key = :$key";
        }, $keys);
        $settersString = implode(', ', $setters);

        $sql = "UPDATE $table SET $settersString WHERE id = :id";


        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute($data);
        } catch (\PDOException $exception) {
            exit($exception->getMessage());
        }
        return $stmt->rowCount();
    }

    public function delete(string $table, string $column, $value)
    {
        $sql = "DELETE FROM $table WHERE $column = $value";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute();
        } catch (\PDOException $exception) {
            exit($exception->getMessage());
        }
        return $stmt->rowCount();
    }

    public function leftJoin($t1, $t2, array $columns1, array $columns2, $column1, $column2, array $conditions)
    {

        $c1 = "$t1." . implode(", $t1.", $columns1);

        $c2 = "$t2." . implode(", $t2.", $columns2);

        $sql = "SELECT $c1, $c2 FROM $t1
                LEFT JOIN $t2 ON $t1.$column1 = $t2.$column2 ";

        if (!empty($conditions)) {
            $conditionsString = [];
            foreach ($conditions as $key => $condition) {

                if (is_array($condition)) {

                    $subCondition = [];
                    foreach ($condition as $value) {

                        if ($value) {
                            $subCondition[] = "$t1.$key = $value ";
                        } else {
                            $subCondition[] = "$t1.$key IS NULL ";
                        }
                    }

                    $conditionsString[] = implode(" OR ", $subCondition);
                } elseif ($condition == null) {
                    $conditionsString[] = "$t1.$key IS NULL ";
                } else {
                    $conditionsString[] = "$t1.$key = $condition ";
                }
            }

            $sql .= "WHERE " .implode(" AND ", $conditionsString);
        }

        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute();
        } catch (\PDOException $exception) {
            exit($exception->getMessage());
        }
        return $stmt->fetchAll();
    }

    public function like(string $table, string $column, string $value)
    {
        $sql = "SELECT * FROM $table WHERE $column LIKE '%$value%'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }



}