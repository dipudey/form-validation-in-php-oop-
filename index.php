<?php
  include "lib/form.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <?php
    $obj = new From;
    if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['submit'])){
      $msg = $obj->insert($_POST);
    }
  ?>

  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2 class="diplay-3 text-center">Registration Form</h2>
      </div>
      <div class="card-body">
        <div style="width:60%;margin:auto" class="my-5">
          <?php
            if (isset($msg)) {
              echo $msg;
            }
          ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input type="text" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
          </form>
        </div>
      </div>
      <div class="card-footer">
        <p class="text-left">Developed By: Dipu Chandra Dey.</p>
        <p class="text-right">copyright &copy;<a href="www.facebook.com/diponkordeydip/" target="_blank">Dipu</p>
      </div>
    </div>
  </div>


  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/popper.min.js"></script>
</body>
</html>
