<?php
    include('config.php');
    session_start();
    $cat="";
    if(isset($_GET['cat'])){
        $cat=$_GET['cat'];
    }

    if(isset($_GET['url'])){
        $_SESSION['url']=$_GET['url'];
    }
    else if(isset($_SESSION['url'])){
        $_SESSION['url']=$_SESSION['url'];
    }
    else{
        $_SESSION['url']="";
    }

    if(!isset($_SESSION['email'])){
        header("location:index.php?msg=Register or Login First");
    }

    if (isset($_GET['type'])&& $_GET['type']!=''){
        $type=$_GET['type'];

        if($type=='status'){
            $operation=$_GET['operation'];
            $postid=$_GET['postid'];
            if($operation=='complete'){
                  $completed=1;
            }
            else{
               $completed=0;
            }
            $update_status="update remindPosts set completed='$completed' where postid='$postid'";
            mysqli_query($con,$update_status);
        }

        if($type=='delete'){
            $postid=$_GET['postid'];
            $delete_query="delete from remindPosts where postid='$postid'";
            mysqli_query($con,$delete_query);
        }


     }


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="./assets/img/logo.png">

<title>Dashboard</title>

<!-- -----------------------All The CSS Links Goes Here----------------------- -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="./assets/css/style.css">

<!-- -----------------------All The CSS Links Goes Here----------------------- -->
<!-- -----------------------All other External Links Goes Here----------------------- -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<!-- -----------------------All other External Links Goes Here----------------------- -->
</head>
<body>
<!-- -----------------------All the Individual Sections Goes Here----------------------- -->


<nav class="navbar navbar-expand-lg navbar-light bg-transperant">
  <a class="navbar-brand mb-0 h1 text-danger" style="font-size:2rem;" href="#">Re: Mind</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="logout.php"> <i class="fa fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </div>
</nav>

<section class="droplink">
    <div class="container">
    <div class="row justify-content-center flex-row-reverse">
        <div class="col-md-5">
            <div class="card linksubmit">
                <div class="card-body text-center">
                    <h3>
                        Drop your Link Here
                    </h3>
                    <hr>
                    <form method="POST" action="addItem.php">
                        <div class="form-group">
                            <label for="link">Link</label>
                            <?php 
                               // if(isset($_SESSION['url'])){
                            ?>
                            <input type="text" class="form-control" id="link" name="link" aria-describedby="emailHelp" placeholder="Enter the link" autocomplete="off" value="<?=$_SESSION['url']; ?>">
                            <?php
                                
                               // }else{
                              
                            ?>
                            <!-- <input type="text" class="form-control" id="link" name="link" oninput="getdetails('link')" aria-describedby="emailHelp" placeholder="Enter the link" autocomplete="off"> -->
                            <?php
                                      
                                    //}
                            ?>
                            <br>
                            <!-- <a class="btn btn-warning"> <i class="fas fa-rocket"></i> </a> -->
                        </div>
                        
                        <div class="hiddenparts">
                            <div class="form-group">
                                <label for="title">Title of Blog</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title of the Blog" required>
                            </div>
                            <div class="form-group">
                                <label for="shortdesc">Short Description</label>
                                <textarea class="form-control" id="shortdesc" name="shortdesc" placeholder="Short Description" rows="3" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="tags">Tags <small>(separated by comma)</small> </label>
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter the tags">
                            </div>
                            <div class="form-group">
                                <label for="cat">Category</label>
                                <select name="cat" class="form-control" id="cat">
                                    <option value="Article">Article</option>
                                    <option value="News">News</option>
                                    <option value="Podcast">Podcast</option>
                                    <option value="Other" selected>Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                 <input type="url" name="myurl" id="myurl" hidden>
                            </div>
                            
                            
                            <button type="submit" name="submit" value="submit" class="btn submitbt">Save the Blog</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>Your saved Items</h3>
                        </div>
                        <div class="card-footer">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="?"><button type="button" class="btn <?php echo ($cat == '') ? "btn-success" : "btn-outline-success"; ?>">All</button></a>
                                <a href="?cat=Article"><button type="button" class="btn <?php echo ($cat == 'Article') ? " btn-primary" : " btn-outline-primary"; ?>">Articles</button></a>
                                <a href="?cat=News"><button type="button" class="btn <?php echo ($cat == 'News') ? "btn-warning" : "btn-outline-warning"; ?>">News</button></a>
                                <a href="?cat=Podcast"><button type="button" class="btn <?php echo ($cat == 'Podcast') ? "btn-info" : "btn-outline-info"; ?>">Podcasts</button></a>
                                <a href="?cat=Other"><button type="button" class="btn <?php echo ($cat == 'Other') ? "btn-danger" : "btn-outline-danger"; ?>">Others</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
            <?php
                $email = $_SESSION['email'];

                if ($cat == '') {
                    $feed = "SELECT * FROM remindPosts WHERE email = '$email'  ORDER BY posttime DESC;";
                }
                else{
                    $feed = "SELECT * FROM remindPosts WHERE email = '$email' and cat= '$cat' ORDER BY posttime DESC;";
                }                
                $feed_result = mysqli_query($con,$feed) or die(mysqli_error($con));
                while($row = mysqli_fetch_assoc($feed_result)) {
                    $color="";
                    if($row['cat']=="Article"){
                        $color="primary";
                    }
                    else if($row['cat']=="News"){
                        $color="warning";
                    }
                    else if($row['cat']=="Podcast"){
                        $color="info";
                    }
                    else if($row['cat']=="Other"){
                        $color="danger";
                    }
            ?>
                <div class="col-md-12">
                    <div class="card card-blog <?="bg-".$color; ?> border-0 "><a href="blog-post.html">
                        <div class="card-body">
                                <p class="card-title "><a class="text-light" href="<?=$row['link']; ?>" target="_blank"><?=$row['title']; ?> </a></p>
                                <hr>
                                <p class="card-text text-light small"><?=$row['shortdesc']; ?></p>
                                <p>
                                <?php
                                    $tagslist = explode(',',$row['tags']);
                                    foreach ($tagslist as $tag)  {

                                ?>
                                <span class="badge badge-light"><?=$tag; ?></span>&nbsp;
                                <?php
                                    }
                                ?>
                                </p>
                                <p class="bold small text-light my-0"><?=$row['posttime']; ?></p>
                        </div>

                        <div class="card-footer">
                            
                            <?php echo "<a  href='?cat=".$cat."&type=delete&postid=".$row['postid']."' class='btn text-white' ><i class='fas fa-trash text-white'></i>&nbsp; Delete</a> &nbsp"; ?>
                            
                            <?php 
                                    if($row['completed']==1){
                                        echo "<a href='?cat=".$cat."&type=status&operation=incomplete&postid=".$row['postid']."' class='btn text-white'><i class='fas fa-clipboard-check text-white'></i>&nbsp; Mark as Incomplete</a>&nbsp&nbsp&nbsp";
                                    }
                                    else{
                                        echo "<a href='?cat=".$cat."&type=status&operation=complete&postid=".$row['postid']."' class='btn text-white'><i class='fas fa-clipboard-check text-white'></i>&nbsp; Mark as Complete</a>&nbsp&nbsp&nbsp";
                                    }
                            ?>
                        </div>
                    </div>
                </div>
                <?php  
                    }
                ?>

            </div>
            

        </div>
    </div>
    </div>
    
</section>




<!-- -----------------------All The Individual Sections Goes Here----------------------- -->
<!-- -----------------------All the JS Links Goes Here----------------------- -->

<script src="./assets/js/script.js"></script>
<script>
    window.onload = function() {
        
    };
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script>    
    document.getElementById("myurl").value = document.location.origin;
    function getdetails() {

        var link=document.getElementById("link").value;
        if(link!=''){
            console.log(link);
            $.ajax({
                url:"blogscrap.php",
                type:"POST",
                data:{link:link},
                success: function(data){
                    data=JSON.parse(data);
                    console.log(typeof data);
                    var hiddenparts = document.getElementsByClassName('hiddenparts');
                    hiddenparts[0].style.display = 'block';
                    var title = document.getElementById("title").setAttribute('value', data.title);
                    document.getElementById('shortdesc').value = data.shortdesc;
                    var link = document.getElementById("link").setAttribute('value', data.link);  
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log("Failed");
                }
                
            })


            
        }
    }

    if (document.getElementById("link").value!="") {
        getdetails();
    }

    document.getElementById("link").addEventListener("input", () => {
        getdetails();
    });

</script>
<!-- -----------------------All The JS Links Goes Here----------------------- -->

</body>
</html>