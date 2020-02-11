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
  <link rel="stylesheet" href="./style/register.css" />
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
      <div class="login-container">
        <div class="login-container_form">
          <h3>Register Account</h3>
          <form action="./controller/registerControl.php" method="POST">
            <div class="form-input">
              <label for="firstName" class="input-label">First Name</label>
              <input type="text" name="firstName" id="firstName" placeholder="First Name..." />
            </div>
            <div class="form-input">
              <label for="lastName" class="input-label">Last Name</label>
              <input type="text" name="lastName" id="lastName" placeholder="Last Name..." />
            </div>

            <div class="form-group">
              <div class="form-input">
                <label for="contact" class="input-label">Contact</label>
                <input type="text" name="contact" id="contact" placeholder="Contact..." />
              </div>
              <div class="form-input">
                <label for="email" class="input-label">Email</label>
                <input type="email" name="email" id="email" placeholder="Email..." />
              </div>
            </div>

            <div class="form-input">
              <label for="password" class="input-label">Password</label>
              <input type="password" name="password" id="password" placeholder="Password..." />
            </div>
            <div class="form-input">
              <label for="confirmPassword" class="input-label">Confirm Password</label>
              <input type="password" name="confirmPassword" placeholder="Confirm Password..." />
            </div>

            <button type="submit" name="register" class="form-button">Submit</button>
          </form>
        </div>
      </div>
    </section>
  </main>
  <script src="js/nav.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>
  
</body>

</html>