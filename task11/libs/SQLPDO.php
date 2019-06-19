<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 26.05.2019
 * Time: 20:33
 */

class SQLPDO extends ParentSQL
{
    private $dbh;

    public function __construct()
    {
        parent::__construct();
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME. ";charset=utf8", DB_USER, DB_PASS, $options);
    }

    public function query($sql){
        $stmt = $this->dbh->prepare($sql);
        $result = $stmt->execute();

        if ($result !== false){
            return $stmt->fetchAll();
        } else {
            return $stmt;
        }
    }


}