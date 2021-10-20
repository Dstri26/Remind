<?php
    session_start();
    if(isset($_SESSION['email'])){
        header("location:dashboard.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Store all your incomplete, favourite and save-for-later articles, blogs, news, podcasts and many more at one place.">
<meta name="keywords" content="Article, Blog, Podcasts">
<meta name="author" content="Trideep Barik">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="./assets/img/logo.png">

<title>Re: Mind</title>

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

<nav class="navbar fixed-top">
  <a class="navbar-brand" href="#">
    <div class="headingText">Re: Mind</div>
  </a>
</nav>
<section class="jumbotron landing d-flex align-items-center justify-content-center">
    <div class="row d-flex align-items-end">
        <div class="col-md-2 text-center">
            <div id="c1" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                  <div class="carousel-item">
                    <h2 class="rotate">Login</h2>
                  </div>
                  <div class="carousel-item active">
                    <h2 class="rotate">Register</h2>
                  </div>
                </div>
                <a class="carousel-control-prev" style="display:none;" href="#c1" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" style="display:none;" href="#c1" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            
        </div>
        <div class="col-md-10 form">
            
            <div class="card formscard" style="width: 30rem;">
                <div class="card-header text-center">
                  <div class="row justify-content-end">
                    <div class="col-1">
                      <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="col-2">
                      <label class="switch">
                        <input type="checkbox" onchange="logreg(this)">
                        <span class="slider round"></span>
                      </label>
                    </div>
                    <div class="col-1">
                      <i class="fas fa-sign-in-alt"></i>
                    </div>
                    <div class="col-1">
                      
                    </div>
                  </div>
                  
                  
                </div>
                <div class="card-body">
                    <div id="c2" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner">
                          <div class="carousel-item ">
                            <form class="login" method="POST" action="./login.php">
                                <div class="form-group" style="margin-top: 0;margin-bottom:0;">
                                    <h1>Hey there,</h1>
                                    <small style='color:var(--lgreen);'>
                                    <?php 
                                    if(isset($_GET['msg']))
                                    echo $_GET['msg']; 
                                    ?>
                                    </small>
                                    
                                    
                                </div>
                                <div class="form-group">
                                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                  <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg submitbt">Submit</button>
                              </form>
                          </div>
                          <div class="carousel-item active">
                            <form class="register" method="POST" action="./register.php">
                                <div class="form-group" style="margin-top: 0;margin-bottom:0;">
                                    <h1>Let's Get Started</h1>
                                    <small style='color:var(--lgreen);'>
                                    <?php 
                                    if(isset($_GET['msg']))
                                    echo $_GET['msg']; 
                                    ?>
                                    </small>
                                </div>
                                <div class="form-group ">
                                    <input type="text" class="form-control" id="exampleName" name="name" placeholder="Enter your name">
                                  </div>
                                <div class="form-group">
                                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                  <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg submitbt">Submit</button>
                              </form>
                          </div>

                        </div>
                        <a class="carousel-control-prev" style="display:none;" href="#c2" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" style="display:none;" href="#c2" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>

                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- -----------------------All The Individual Sections Goes Here----------------------- -->
<!-- -----------------------All the JS Links Goes Here----------------------- -->


<script src="./assets/js/script.js"></script>
<script>
  $('.carousel').carousel({
    interval: false,
  });
  
  function logreg(i){
    if (i.checked == true){
      $('.carousel').carousel('next')
      console.log("Login")
    }
    else{
      $('.carousel').carousel('prev')       
      console.log("Register")
    }
  }

  
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<!-- -----------------------All The JS Links Goes Here----------------------- -->

</body>
</html>