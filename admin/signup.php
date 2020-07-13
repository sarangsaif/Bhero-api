<?php
include_once('../config.php');
$conn = connect();

$error = array();
$Username = '';
$Email = '';
$CNIC = '';
$ContactNumber = '';
$HospitalLocation = '';
$BloodGroup = '';
$UserType = null;
$Alergies = '';
$MajorDiseases = '';
$Disabilities = '';
$Age = null;
$LastBloodDonated = null;

$Username = $_REQUEST['Username'];
$Email = $_REQUEST['Email'];
$CNIC = $_REQUEST['CNIC'];
$ContactNumber = $_REQUEST['ContactNumber'];
$HospitalLocation = $_REQUEST['HospitalLocation'];
$BloodGroup = $_REQUEST['BloodGroup'];
$UserType = $_REQUEST['UserType'];
$Alergies = $_REQUEST['Alergies'];
$MajorDiseases = $_REQUEST['MajorDiseases'];
$Disabilities = $_REQUEST['Disabilities'];
$Age = $_REQUEST['Age'];
$LastBloodDonated = $_REQUEST['LastBloodDonated'];


if(empty($Username)){
    array_push($errors, "User name is required");
}
else if(validatePlainText($Username))
{
    array_push($errors, "Only letters and white space is allowed");
}

if(empty($Email)){
    array_push($errors, "Email is required");
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($errors, "Invalid Emaill provided");
}
else if(validateUsername($username))
{
    array_push($errors, "Invalid username provided");
}


if(empty($CNIC)){
    array_push($errors, "NIC is required");
}
else if(!check_existance("tbl_User", "Username", $studentId, $conn)){
    array_push($errors, "Student with this NIC already exists");
}
else if(validateAlphanumeric($CNIC))
{
    array_push($errors, "Invalid CNIC provided");
}

if(empty($password)){
    array_push($errors, "Password is required");
}
else if(validatePassword($password)){
    array_push($errors, "Password must be a combination of caps, smalls and numbers");
}

if($UserType == null){
    array_push($errors, "Please select User Type");

}

if($joiningDate == null){
    $joiningDate = date("Y-m-d");
}

if($errors == null){
    addUser($Username, $Email, $CNIC, $ContactNumber, $HospitalLocation, $BloodGroup, $UserType, $Alergies, $MajorDiseases, $Disabilities, $Age, $LastBloodDonated, $conn);    
    
    echo "true";
}
else{
    $json_array['errors'] = $error;
    echo $json_encode($json_array); 
}
?>