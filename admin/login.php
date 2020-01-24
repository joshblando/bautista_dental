<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/zf-6.4.3/dt-1.10.20/r-2.2.3/rg-1.1.1/sc-2.0.1/datatables.min.css" />
    <link rel="stylesheet" href="./style/general.css">
    <link rel="stylesheet" href="./style/login.css">
    <title>Document</title>
</head>

<body>
    <div class="login-container">
        <div class="login-content">
            <form action="./controller/authControl.php" method="POST" class="form-details">
                <div class="form-input">
                    <input type="text" name="employeeId" id="employeeId" autocomplete="off">
                    <label for="employeeId" class="label-input">
                        <span class="content-input_name">EmployeeID</span>
                    </label>
                </div>
                <div class="form-input">
                    <input type="password" name="password" id="password" autocomplete="off">
                    <label for="password" class="label-input">
                        <span class="content-input_name">Password</span>
                    </label>
                </div>
                <button type="submit" class="button" name="login">Login</button>
            </form>
        </div>
    </div>
</body>

</html>