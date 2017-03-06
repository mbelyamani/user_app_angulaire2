<?php 
class User{ 
    // database connection and table name 
    private $conn; 
    private $table_name = "user"; 
 
    // object properties 
    public $id; 
    public $firstname; 
    public $lastname; 
    public $phonenumber; 
    public $email; 
    public $password; 
 
    // constructor with $db as database connection 
    public function __construct($db){ 
        $this->conn = $db;
    }


    // create user
    function create(){     
    	// query to insert record
	$query = "INSERT INTO 
                " . $this->table_name . "
            SET 
                firstname=:firstname, lastname=:lastname, phonenumber=:phonenumber, email=:email, password=:password";
     
    	// prepare query
	$stmt = $this->conn->prepare($query);
 
    	// posted values
    	$this->firstname=htmlspecialchars(strip_tags($this->firstname));
    	$this->lastname=htmlspecialchars(strip_tags($this->lastname));
    	$this->phonenumber=htmlspecialchars(strip_tags($this->phonenumber));
    	$this->email=htmlspecialchars(strip_tags($this->email));
 
    	// bind values
    	$stmt->bindParam(":firstname", $this->firstname);
    	$stmt->bindParam(":lastname", $this->lastname);
    	$stmt->bindParam(":phonenumber", $this->phonenumber);
    	$stmt->bindParam(":email", $this->email);
    	$stmt->bindParam(":password", $this->password);
     
    	// execute query
    	if($stmt->execute()){
                return true;
    	}else{
        	//echo "<pre>";
            	//print_r($stmt->errorInfo());
        	//echo "</pre>";
 
        	return false;
    	}
    }

    function read($email){
	    // select user
	    $query = "SELECT
        	        id, firstname, lastname, phonenumber, email, password
	            FROM
	                " . $this->table_name . "
	            WHERE
	                email = '".$email."'";
 
	    // prepare query statement
	    $stmt = $this->conn->prepare( $query );
 
	    // execute query
	    $stmt->execute();
 
	    return $stmt;	
    }


    // read products
    function readAll(){
	    // select all query
	    $query = "SELECT
        	        id, firstname, lastname, phonenumber, email, password
	            FROM
	                " . $this->table_name . "
	            ORDER BY
	                id DESC";
 
	    // prepare query statement
	    $stmt = $this->conn->prepare( $query );
 
	    // execute query
	    $stmt->execute();
 
	    return $stmt;
    }
}
?>