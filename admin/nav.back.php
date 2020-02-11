<!-- <link rel="stylesheet" href="./style/nav.css">
<div class="topnav">
  <div class="burger">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>
  <div class="topnav-content">
    <div class="header-icons">
      <span class="icon-container bell" id="bell"><i class="fas fa-bell"></i>
        <div id="bell-count">
          <span class="bounce bell-count_number">0</span>
        </div>
      </span>
      <span class="icon-container envelope" id="envelope"><i class="fas fa-envelope"></i>
        <div id="envelope-count">
          <span class="bounce envelope-count_number">0</span>
        </div>
      </span>

    </div>
    <div class="logout-container">
      <a href="./controller/logout.php?logout=<?php echo $_SESSION['id'] ?>"><span class="logout-content"><i class="fas fa-sign-out-alt logout"></i></span></a>
    </div>
  </div>
</div>
<div class="sidenav dodgerBlue-bg">
  <div class="close-nav">&times</div>
  <div class="logo dodgerBlue-bg">
    <?php
    $adminId = $_SESSION['adminId'];
    $getAdmin = $connect->prepare("SELECT * FROM admin WHERE adminId=:adminId");
    $getAdmin->execute(["adminId" => $adminId]);
    $admin = $getAdmin->fetch(PDO::FETCH_ASSOC);
    $photo = $admin['photo'];
    $name = $admin['firstName'] . " " . $admin['lastName'];
    ?>
    <div class="avatar-container_img">
      <img src=<?php echo $photo ? "'" . $photo . "'" : 'https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt=""' ?> />
    </div>
    <div class="avatar-details">

      <span><?php echo $name ? $name : "John Doe" ?></span>
    </div>
  </div>
  <div id="accord" class="side-nav-content">
    <div class="sidenav-list"><a href="index.php">Dashboard</a></div>

    <div class="sidenav-list"><a href="appointment.php">Appointment</a></div>
    <div class="sidenav-list"><a href="calendar.php">Calendar</a></div>
    <div class="sidenav-list"><a href="message.php">Messages</a></div>
    <div class="sidenav-list accord-toggle">
      Accounts
    </div>
    <div class="accord-content">
      <ul class="accord-list">
        <a href="./users.php">
          <li class="accord-list_item">Users</li>
        </a>
        <a href="admin.php">
          <li class="accord-list_item">Admins</li>
        </a>

      </ul>
    </div>

    <div class="sidenav-list accord-toggle">
      Content Management
    </div>
    <div class="accord-content">
      <ul class="accord-list">
        <a href="#">
          <li class="accord-list_item">Home</li>
        </a>
        <a href="#">
          <li class="accord-list_item">About</li>
        </a>
        <a href="#">
          <li class="accord-list_item">Gallery</li>
        </a>
        <a href="#">
          <li class="accord-list_item">Contact Us</li>
        </a>
      </ul>
    </div>
    <div class="sidenav-list accord-toggle">
      File Maintenance
    </div>
    <div class="accord-content">
      <ul class="accord-list">
        <a href="employees.php">
          <li class="accord-list_item">Employees</li>
        </a>
        <a href="services.php">
          <li class="accord-list_item">Services</li>
        </a>
      </ul>
    </div>
    <div class="sidenav-list">Reports</div>
  </div>
</div>

<script src="./js/app.js"></script>
<script src="https://kit.fontawesome.com/0c5646b481.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $("#accord")
      .find(".accord-toggle")
      .click(function() {
        $(this)
          .next()
          .slideToggle("fast");
        $(".accord-content")
          .not($(this).next())
          .slideUp("slow");
      });
  });
</script> -->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
