<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (empty($_SESSION['adminId'])) {
  echo "<script>window.location.replace('./login.php')</script>";
}
require "../config/control.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./style/general.css">
  <link rel="stylesheet" href="./style/main.css">
  <title>Document</title>
</head>

<body>
  <div class="main-container">
    <?php
    include 'nav.php'
    ?>
    <main class="main">
      <div class="card-container">
        <div class="card">CARD 1</div>
        <div class="card">CARD 2</div>
        <div class="card">CARD 3</div>
      </div>
      <div class="main-content white-bg">
        <h1><?php
            echo $_SESSION['lastName']
            ?></h1>
      </div>
    </main>
  </div>
</body>

</html>