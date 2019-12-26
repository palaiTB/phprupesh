<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost:8080";
    private $db_name = "Apo8JTOkea";
    private $username = "Apo8JTOkea";
    private $password = "RsEuqvZ4t6";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn  = new PDO("mysql:host=remotemysql.com;port=3306;dbname=Apo8JTOkea", $this->username, $this->password); 
            //$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>