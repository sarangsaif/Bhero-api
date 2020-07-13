<?php
include_once('../config.php');
$conn = connect();

$error = array();
$Quantity = '';
$Fk_Patient = '';
$Doctor = '';
$PatientLocation = '';

$Quantity = $_REQUEST['Quantity'];
$Fk_Patient = $_REQUEST['Fk_Patient'];
$Doctor = $_REQUEST['Doctor'];
$PatientLocation = $_REQUEST['PatientLocation'];

if(empty($Doctor)){
    array_push($errors, "Please Insert Doctor's Name");
}
else if(validatePlainText($Doctor))
{
    array_push($errors, "Only letters and white space is allowed");
}

if(empty($Doctor)){
    array_push($errors, "Please Insert Doctor's Name");
}
else if(validatePlainText($Doctor))
{
    array_push($errors, "Only letters and white space is allowed");
}

if(empty($PatientLocation)){
    array_push($errors, "Please Insert Your Location");
}
else if(validatePlainText($Doctor))
{
    array_push($errors, "Flase");
}

if($errors == null){
    addRequest($Quantity, $Fk_Patient, $Doctor, $PatientLocation, $conn);
    echo true;
}
else{
    $json_array['errors'] = $error;
    echo $json_encode($json_array); 
}
