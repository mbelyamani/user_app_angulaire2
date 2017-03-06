<?php

	header("Access-Control-Allow-Origin: *"); 
	header('Content-type: application/x-www-form-urlencoded');
	header("Access-Control-Allow-Headers: X-Requested-With");
	header("Access-Control-Request-Headers: X-Requested-With");

	// Get posted data
	$json = file_get_contents('php://input');
	$obj = json_decode($json);

	$firstName = $obj->{'firstName'};
	$lastName = $obj->{'lastName'};
	$phoneNumber = $obj->{'phoneNumber'};
	$email = $obj->{'email'};
	$password = $obj->{'password'};

	// include database and object files
	include_once 'Database.php';
	include_once 'User.php';
 
	// get database connection
	$database = new Database();
	$db = $database->getConnection();
 
	// instantiate product object
	$user = new User($db);

	$user->firstname = $firstName;
	$user->lastname = $lastName;
	$user->phonenumber = $phoneNumber;
	$user->email = $email;
	$user->password = $password;

	$data = '"status":"Fail"'; 
	// create the user
	if($user->create() == true){
		$data = '"status":"Success"';
	}

	$data = '{'.$data.', "email":"'.$email.'", "$password":"'.$password.'"}';
	echo json_encode($data);

?>