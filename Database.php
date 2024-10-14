<?php

class Database
{
    public $conn;

    public function __construct($config)
    {
        $dsn = "mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'];

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try {
            $this->conn = new PDO($dsn, $config['user'], $config['pass'], $options);
        } catch (PDOException $e) {
            throw new PDOException('Database connection failed: ' . $e->getMessage());
        }
    }

    public function query(string $query, array $params = []): PDOStatement|PDOException
    {
        try {
            $statement = $this->conn->prepare($query);
            foreach ($params as $param => $value) {
                $statement->bindValue(':' . $param, $value);
            }
            $statement->execute();
            return $statement;
        } catch (PDOException $e) {
            throw new PDOException('Query failed: ' . $e->getMessage());
        }
    }
}
