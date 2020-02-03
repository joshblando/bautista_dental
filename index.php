<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once "./config/control.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <!-- <link rel="stylesheet" href="./style/nav.css" /> -->
  <!-- <link rel="stylesheet" href="./style/general.css" /> -->
  <link rel="stylesheet" href="./style/main.css" /> 
  <link rel="stylesheet" type="text/css" href="./admin/style/bootstrap.min.css">
  <style>
    .btn-outline{
      background: transparent;
      color: #fff;
      border-color: #fff;
    }
  </style>

  <title>Document</title>
</head>

<body>
  <header>
    <?php
    include "./component/navigation.php";
    ?>
    <div class="landing">
      <div class="background-image"></div>
      <div class="landing-overlay">
        <div class="landing-overlay_header">
          Bautist Dental Center
        </div>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, quam?
          Id ducimus debitis cum quos!
        </p>
        <button class="btn btn-outline">Request Now!</button>
      </div>
    </div>
  </header>
  <main>
    <section class="section-one">
      <div class="section-one_content">
        <div class="details">
          <div class="card-content">
            <div class="card-header">New Patient Promo</div>
            <div class="card-description">
              <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Optio, nihil?
              </p>
            </div>
          </div>
          <div class="card-content">
            <button class="btn btn-outline">Make appointment</button>
          </div>
        </div>
        <div class="image">
          <img src="https://sa1s3optim.patientpop.com/assets/images/provider/photos/1957630.png" alt="dental" />
        </div>
      </div>
    </section>
  </main>
  <script src="https://kit.fontawesome.com/0c5646b481.js" crossorigin="anonymous"></script>
  <script src="js/nav.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>
  
</body>

</html>