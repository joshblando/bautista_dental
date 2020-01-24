<link rel="stylesheet" href="./style/nav.css">
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
</script>