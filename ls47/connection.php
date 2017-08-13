<?php
class Connection {
    private $host = '127.0.0.1';
    private $db   = 'northwind';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8';
    private $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
  
    function __construct() {

    }

    /*
        result: run with the followind code:
        while ($row = $stmt->fetch())
        {
            echo $row['name'] . "\n";
        }
    */
    function executeStatement($stmt) {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $pdo = new PDO($dsn, $this->user, $this->pass, $this->opt);

        $stmt = $pdo->prepare($stmt);
        $stmt->execute();
        return $stmt;
      
    }
}
?>