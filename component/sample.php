

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand mr-4" href="#">
    <img src="./logo/tooth.png" width="100" height="100" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse navbar-right" id="navbarNavDropdown">
    <ul class="navbar-nav navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item" style="margin-left: auto;">
        <a class="nav-link" href="index.php">Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?appoint">Make Appoinment</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav">
        <?php

        if (!isset($_SESSION['userId'])) {
        ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>

        <?php } else {
            $userId = $_SESSION['userId'];
            $userAvatar = $connect->prepare("SELECT email, photo FROM user WHERE userId = :userId");
            $userAvatar->execute(["userId" => $userId]);
            $userAvatarRow = $userAvatar->fetch(PDO::FETCH_ASSOC);
            $photo = $userAvatarRow['photo'];
            $email = $userAvatarRow['email'];

        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="img circle" width="30" height="30" src=<?php echo $photo ? "$photo" : "https://images.pexels.com/photos/736842/pexels-photo-736842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" ?> alt="">
            <span id="showTopMenu"><?php echo $email ?></span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="userAccount.php">My Account</a>
            <a class="dropdown-item" href="?logout">Logout</a>
            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
          </div>
        </li>

       <li class="nav-item dropdown pl-2 pr-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell"></i>
        </a>
        <div class="dropdown-menu message__container" style="left:-185px !important;" aria-labelledby="navbarDropdownMenuLink2">
            <a class="dropdown-item" href="userAccount.ph">this is a sample message</a>
        </div>
      </li>
      <?php
        }
      ?>
      </ul>
    </div>
  </div>
</nav>