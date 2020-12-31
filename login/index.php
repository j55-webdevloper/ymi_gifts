<?php error_reporting(0); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <link rel="icon" type="image/png" href="../images/favicon.png"/>

    <title>Ymi Collection | Login</title>
  </head>
  <body>

    <!-- Navbar -->
    <!-- Just an image -->
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand mx-auto" href="#">
                <img src="../images/logo.jpeg" alt="YMi Collection Logo" width="100" height="100">
            </a>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3" data-aos="fade-up" data-aos-once="true">
                <form id="form" action="../inc/login.inc.php" method="POST">
                    <h3 class="text-black tinos">Please Login</h3>
                    <?php
                        if(isset($_GET['error'])){
                            if($_GET['error'] == 'emptyfields'){
                                echo '<div class="alert alert-danger border border-danger text-center" role="alert">
                                        Please complete all fields!
                                        </div>';
                            }
                            else if($_GET['error'] == 'sql'){
                                echo '<div class="alert alert-danger border border-danger text-center" role="alert">
                                        Database connection error!
                                        </div>';
                            }
                            else if($_GET['error'] == 'sqlexe'){
                                echo '<div class="alert alert-danger border border-danger text-center" role="alert">
                                        Database execution error!
                                        </div>';
                            }
                            else if($_GET['error'] == 'pwdincorrect'){
                                echo '<div class="alert alert-danger border border-danger text-center" role="alert">
                                        Password is incorrect!
                                        </div>';
                            }
                            else if($_GET['error'] == 'nouid'){
                                echo '<div class="alert alert-danger border border-danger text-center" role="alert">
                                        User does not exist!
                                        </div>';
                            }
                        }
                    ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit-login" class="btn btn-black">Login <i class="fas fa-sign-in-alt"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->

   

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  </body>
</html>