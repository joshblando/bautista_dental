<nav class="navigation">
    <div class="brand">
        <img src="./logo/tooth.png" alt="" />
    </div>
    <div class="menu_navigation">
        <ul class="nav-top">
            <?php

            if (!isset($_SESSION['userId'])) {
            ?>
                <li class="nav-top_item"><a href="login.php">Login</a></li>
                <li class="nav-top_item"><a href="register.php">Register</a></li>

            <?php } else {
                $userId = $_SESSION['userId'];
                $userAvatar = $connect->prepare("SELECT email, photo FROM user WHERE userId = :userId");
                $userAvatar->execute(["userId" => $userId]);
                $userAvatarRow = $userAvatar->fetch(PDO::FETCH_ASSOC);
                $photo = $userAvatarRow['photo'];
                $email = $userAvatarRow['email'];

            ?>

                <div class='nav-top_avatar'>
                    <img src=<?php echo $photo ? "$photo" : "https://images.pexels.com/photos/736842/pexels-photo-736842.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" ?> alt="">
                    <span id="showTopMenu"><?php echo $email ?><i class="fas fa-caret-down"></i></span>

                    <div class="nav-top_menu" id="navTopMenu">
                        <ul class="top-menu_list">
                            <li class="top-menu_items"><i class="fas fa-user-cog">&nbsp;</i><a href="userAccount.php">My&nbsp;Account</a></li>
                            <li class="top-menu_items"><i class="fas fa-sign-out-alt">&nbsp;</i><a href="?logout">Log out</a></li>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>

        </ul>
        <hr />
        <ul class="nav-list">
            <li class="nav-list_item "><a class="current" href="index.php">Home</a></li>
            <li class="nav-list_item"><a href="#">About</a></li>
            <li class="nav-list_item"><a href="#">Services</a></li>
            <li class="nav-list_item"><a href="#">Gallery</a></li>
            <li class="appoint-block">
                <a href="?appoint">Make&nbsp;Appointment</a>
            </li>
        </ul>

    </div>


</nav>

<?php
if (isset($_GET['appoint'])) {
    if (!isset($_SESSION['id'])) {
        echo "<script>alert('Please sign in to continue to set an appointment. Thank you!'); window.location ='login.php'</script>";
    } else {
        echo "<script>window.location = 'appointment.php'</script>";
    }
}

if (isset($_GET['logout'])) {

    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy();

    echo "<script>window.location.replace('index.php')</script>";
}
?>