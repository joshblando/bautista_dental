<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_SESSION['userId'])) {
  echo "<script>history.back()</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="./style/nav.css" />
  <!-- <link rel="stylesheet" href="./style/general.css" /> -->
  <link rel="stylesheet" href="./style/login.css" />
  <link rel="stylesheet" type="text/css" href="./admin/style/bootstrap.min.css">

  <title>Document</title>
</head>

<body>
  <?php
  include "./component/navigation.php"
  ?>
  <main>
    <section class="section-login">
      <div class="login-background"></div>
      <div class="login-container overlay">
        <div class="login-container_form">
          <h3>Login your account</h3>
          <form action="./controller/loginControl.php" method="POST">
            <div class="form-input">
              <label for="email" class="input-label">Email</label>
              <input type="email" name="email" placeholder="Email..." />
            </div>
            <div class="form-input">
              <label for="password" class="input-label">Password</label>
              <input type="password" name="password" placeholder="Password..." />
            </div>
            <button type="submit" name="login" class="form-button">Submit</button>
          </form>
        </div>
      </div>
    </section>
  </main>
  <script src="js/nav.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>
  
</body>

</html>