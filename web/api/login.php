<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));
include '../config.php';


$email = "";
$password = "";
$loggedInUser = "";
$status = false;
$response = "";
$userId="";
if(isset($_POST['email'])) {
    $email = $_POST['email'];
}

if(isset($_POST['password'])) {
    $password = md5($_POST['password']);
}
if($email != "" && $password != "") {
    $getUser = "select * from remindUsers where email='$email' and pass='$password'";
    $getUserRes = mysqli_query($con,$getUser) or die(mysqli_error($con));

    if(mysqli_num_rows($getUserRes) > 0) {

        $getUserRow = mysqli_fetch_assoc($getUserRes);
        $dbPassword = $getUserRow['pass'];
        if($dbPassword == $password) {
            $status = true;
            $response = "Successfully logged in!";
            $loggedInUser = $email;
            $userId = $getUserRow['id'];

        } else {
            
            $status = false;
            $response = "Password is invalid";
            $loggedInUser = "None";
            $userId = "None";

        }

    } else {

        $status = false;
        $response = "No such user exists!";
        $loggedInUser = "None";
        $userId = "None";

    }

} else {
    $status = false;
    $response = "Please fill all the details!";
}

$responseArray = array("status" => $status, "response" => $response, "user" => $loggedInUser, "userId" => $userId);
echo json_encode($responseArray,JSON_PRETTY_PRINT);

?>