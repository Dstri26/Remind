<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));
include '../config.php';


$email = "";
$response="";
$link = "";
$title = "";
$shortdesc = "";
$status = false;

if(isset($_GET['email'])) {
    $email = $_GET['email'];
}

if($email != "" ) {
    $getPost = "select * from remindPosts where email='$email' and completed=0 ORDER BY RAND() LIMIT 1;";
    $getPostRes = mysqli_query($con,$getPost) or die(mysqli_error($con));

    if(mysqli_num_rows($getPostRes) > 0) {

        $getPostRow = mysqli_fetch_assoc($getPostRes);
        $response="Here's a random incomplete post.";
        $link = $getPostRow['link'];
        $title = $getPostRow['title'];
        $shortdesc = $getPostRow['shortdesc'];
        $status = true;

    } else {

        $response = "You are caught up.";
        $link = "None";
        $title = "None";
        $shortdesc = "None";
        $status = false;

    }

} else {
        $response = "No incomplete post to fetch.";
        $link = "None";
        $title = "None";
        $shortdesc = "None";
        $status = false;
}

$responseArray = array("status" => $status, "response" => $response, "link" => $link, "shortdesc" => $shortdesc,"title"=>$title);
echo json_encode($responseArray,JSON_PRETTY_PRINT);