<?php 
include_once('../config.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$conn = connect();

$admin = mysqli_fetch_assoc(getAdmin($username,$password, $conn));

if(isset($admin)){

    $json_array['admin'] = $admin;

    echo json_encode($json_array);
    
}
else{
    echo 'false';
}
?>