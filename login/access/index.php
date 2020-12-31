<?php 
    error_reporting(0); 
    session_start();

    if(isset($_SESSION['userId'])){

    }
    else if(!isset($_SESSION['userId'])){
      header("Location: ../");
      exit();
    }
    
?>
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
    <link rel="stylesheet" href="../../css/style.css">

    <link rel="icon" type="image/png" href="../../images/favicon.png"/>

    <title>Ymi Collection | Access</title>
  </head>
  <body>

    <!-- Navbar -->
    <!-- Just an image -->
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand mx-auto" href="#">
                <img src="../../images/logo.jpeg" alt="YMi Collection Logo" width="100" height="100">
            </a>
        </div>
    </nav>

    <!-- Results Table -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <form action="../../inc/export.inc.php" class="mb-2" method="POST">
              <button type="submit" class="btn btn-black" name="submit-export"><i class="fas fa-file-excel"></i> Export</button>
          </form>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Cell No.</th>
                <th scope="col">Address</th>
                <th scope="col">Gift</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  require '../../inc/db.inc.php';
                  $sql = "SELECT * FROM ymi_gifts;";
                  $result = $conn->query($sql);

                  while($row = $result->fetch_assoc()):  

              ?>
              <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['surname']; ?></td>
                  <td><?php echo $row['cell']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['gift']; ?></td>
              </tr>
                <?php endwhile; ?>
            </tbody>
          </table>
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