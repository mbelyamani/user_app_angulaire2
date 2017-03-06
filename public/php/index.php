<?php
 	header("Access-Control-Allow-Origin: *");
	$data = array(
		array('id' => '1','firstName' => 'Cynthia','email' => 'user1@domain.com','password' => 'password1'),
		array('id' => '2','firstName' => 'Keith','email' => 'user2@domain.com','password' => 'password2'),
		array('id' => '3','firstName' => 'Robert','email' => 'user3@domain.com','password' => 'password3'),
		array('id' => '4','firstName' => 'Theresa','email' => 'user4@domain.com','password' => 'password4'),
		array('id' => '5','firstName' => 'Margaret','email' => 'user5@domain.com','password' => 'password5')
	);

 
	echo json_encode($data);
?>