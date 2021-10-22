<?php
    include('config.php');
    session_start();
    
    $title = $_POST['title'];
    $shortdesc = $_POST['shortdesc'];
    $link =  $_POST['link'];
    $tags =  $_POST['tags'];
    $email = $_SESSION['email'];
    $cat = $_POST['cat'];
    mysqli_query($con,"insert into remindPosts(email,link,title,shortdesc,cat,tags) values('$email','$link','$title','$shortdesc','$cat','$tags')");
    unset ($_SESSION["url"]);
    header("location:dashboard.php");
?>