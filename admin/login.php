<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/admin-login.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/custom.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="clear-fix">

        </div>
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto" style="margin-top:11rem;">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Sign In</h5>
              <form action="./controller/authControl.php" method="POST" class="form-details form-signin">
                <div class="form-label-group">
                  <input type="text" name="employeeId" autocomplete="off" id="inputEmail employeeId" class="form-control" placeholder="EmployeeID" required autofocus>
                  <label for="inputEmail">EmployeeID</label>
                </div>

                <div class="form-label-group">
                  <input type="password" name="password" autocomplete="off" id="inputPassword password" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button name="login" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                <!-- <hr class="my-4">
                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  <script src="jquery-3.3.1.slim.min.js"></script>
</html>
