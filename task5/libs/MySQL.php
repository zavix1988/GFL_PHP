<?php


class MySQL implements iWorkData
{

    /**
     * @var PDO
     */
    private $pdo;
    /**
     * @var
     */
    private $sql;
    /**
     * @var string
     */
    private $table;

    /**
     * MySQL constructor.
     */
    public function __construct()
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ];

        $this->pdo = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST, DB_USER, DB_PASSWORD, $options);

        $this->table = 'task5';
    }

    /**
     * @param $key
     * @param $val
     * @return bool
     */
    public function saveData($key, $val)
    {
        // TODO: Implement saveData() method.
        $this->sql = "INSERT INTO {$this->table} (id, value) VALUES (:key, :val)";
        $stmt = $this->pdo->prepare($this->sql);
        $stmt->bindParam(':key', $key);
        $stmt->bindParam(':val', $val);
        return $stmt->execute();
    }

    /**
     * @param $key
     * @return array
     */
    public function getData($key)
    {
        // TODO: Implement getData() method.
        $this->sql = "SELECT * FROM {$this->table} WHERE id = :key LIMIT 1";
        $stmt = $this->pdo->prepare($this->sql);
        $stmt->bindParam(':key', $key);
        if($stmt->execute())
        {
            $string = $stmt->fetchAll();
            return $string[0]['value'];
        }
        return false;

    }

    /**
     * @param $key
     * @return bool
     */
    public function deleteData($key)
    {
        // TODO: Implement deleteData() method.
        $this->sql = "DELETE FROM {$this->table} WHERE id = :key LIMIT 1";
        $stmt = $this->pdo->prepare($this->sql);
        $stmt->bindParam(':key', $key);
        return $stmt->execute();
    }


    /**
     * @return mixed
     */
    public function getSql()
    {
        return $this->sql;
    }

}