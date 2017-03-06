<?php
	header("Access-Control-Allow-Origin: *"); 
	header('Content-type: application/x-www-form-urlencoded');
	header("Access-Control-Allow-Headers: X-Requested-With");
	header("Access-Control-Request-Headers: X-Requested-With");

	// include database and object files
	include_once 'Database.php';
	include_once 'User.php';

	// Passing data
	$json = file_get_contents('php://input');
	$obj = json_decode($json);
	$email = $obj->{'email'};
	$password = $obj->{'password'};


	// instantiate database and user object
	$database = new Database();
	$db = $database->getConnection();
 
	// initialize object
	$user = new User($db);
 
	// query users
	$stmt = $user->read($email);
	$num = $stmt->rowCount();

	$pwd="";
 
	// check if more than 0 record found
	if($num>0){
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        		// extract row
        		// this will make $row['password'] to
        		// just $name only
        		// extract($row);
			$pwd = $row['password'];
 			break; 	
    		}
	}

	$data = '"status":"Fail"';
	if ($password == $pwd)
		$data = '"status":"Success"';

	$data = '{'.$data.', "email":"'.$email.'", "$password":"'.$password.'", "$pwd":"'.$pwd.'"}';
	echo json_encode($data);
?>