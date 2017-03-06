<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once 'Database.php';
include_once 'User.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$user = new User($db);
 
// query users
$stmt = $user->readAll();
$num = $stmt->rowCount();
 
$data="";
 
// check if more than 0 record found
if($num>0){    
    $x=1;
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        // extract($row);
 
        $data .= '{';
            $data .= '"id":"'  . $row['ID'] . '",';
            $data .= '"firstName":"'  . $row['firstname'] . '",';
            $data .= '"lastName":"'  . $row['lastname'] . '",';
            $data .= '"phoneNumber":"'  . $row['phonenumber'] . '",';
            $data .= '"email":"'  . $row['email'] . '",';
            $data .= '"password":"' . $row['password'] . '"';
        $data .= '}';
 
        $data .= $x<$num ? ',' : '';
 
        $x++;
    }
}
 
// json format output
echo '[' . $data . ']';
?>