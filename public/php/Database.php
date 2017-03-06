<?php 
class Database{ 
 
    // specify your own database credentials 
    private $host = "127.0.0.1:3388"; //127.0.0.1:3388  --   localhost
    private $db_name = "steathcom"; 
    private $username = "root"; 
    private $password = ""; 
    public $conn; 
 
    // get the database connection 
    public function getConnection(){ $this->conn = null;
         
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            //echo "Connection error: " . $exception->getMessage();
	    return false;
        }
         
        return $this->conn;
    }
}
?>