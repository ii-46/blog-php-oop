<?php

define("DB_HOST", "localhost");
define("DB_NAME", "dev_planet");
define("DB_USER", "root");
define("DB_PASS", "");


class Database
{

    public $connection;

    function __construct()
    {
        $this->connect_db();
    }
    private function connect_db()
    {
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (mysqli_error($this->connection)) {
            die("connect to database failed " . mysqli_connect_error($this->connection));
        } else {
            $this->connection->set_charset("utf8mb4");
        }
    }
    public function query($sql)
    {
        // $sql = $this->escape_string($sql);
        $result = mysqli_query($this->connection, $sql);
        $this->confirm_query($result);
        return $result;
    }
    public function escape_string($sql)
    {
        return mysqli_real_escape_string($this->connection, $sql);
    }

    private function confirm_query($result)
    {
        if (!$result) {
            die("query failed " . mysqli_error($this->connection));
        }
    }
    public function fatch_assoc($result)
    {
        return mysqli_fetch_assoc($result);
    }
    public function fatch_all($result)
    {
        return mysqli_fetch_all($result);
    }
}

$db = new Database();

// $query = $db->query("SELECT * FROM posts;");
// $result = $db-fetch_all($db->query("SELECT * FROM posts;"));

// foreach ($result as $key) {
//   foreach ($key as $keys => $value) {
//     echo $keys. " " . $value;
//   }
//   echo "<br>";
// }