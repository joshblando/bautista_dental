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
  <link rel="stylesheet" href="style/jquery-ui.min.css" />
 <!--  <link rel="stylesheet" href="style/nav.css" />
  <link rel="stylesheet" href="./style/general.css" />
  <link rel="stylesheet" href="./style/appointment.css" /> -->
  <link href='assets/calendar/packages/core/main.css' rel='stylesheet' />
  <link href='assets/calendar/packages/daygrid/main.css' rel='stylesheet' />
  <link href='assets/calendar/packages/timegrid/main.css' rel='stylesheet' />
  <link href='assets/calendar/packages/list/main.css' rel='stylesheet' />
  <link rel="stylesheet" type="text/css" href="admin/style/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin/style/dropzone.css">

  <title>Bautista Dental Center</title>
</head>
<style type="text/css">
  .app__header{
    margin-top:30%;
    color: #fff;
    margin-bottom: 10%;
  }
  body{
    overflow-x: hidden;
    width: 100%;
    height: 100%;
    background-image: url("https://images.pexels.com/photos/908602/pexels-photo-908602.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
    /* background-image: url('logo/back.jpg'); */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  .appointment__cont{
    background-color: rgba(0, 0, 0, .3);
    min-height: 595px !important;
  }
  #datepicker{
    background: rgba(0,0,0,.3);
    padding: 10px;
    display: none;
    color: #fff;
  }
  .fc-today{
    color:#414344;
  }
  .badge-info{
    background-color: #545b62;
    padding: 9px;
    text-align: center;
    font-size: 10px;
    margin: 2px;
    width: 70px;
  }
</style>
<body>

<div class="modal fade" id="newAppoinmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formSubmit" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <?php
                $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $shuffled = str_shuffle($str);
                $generatedID = substr($shuffled, 0, 8);
             ?>
            <div class="col-lg-12">
              <input type="hidden" name="serviceHidden" id="inputServiceHidden" />
              <input type="hidden" name="empHidden" id="inputEmployeeHidden" />
              <input type="hidden" name="ap_id" value="<?php echo $generatedID ?>" id="ap_id">
            <div class="form-group">
              <label>Pre Diagnostics</label>
              <input class="form-control" type="file" name="pre_diagnostics" id="pre_diagnostics" />
            </div>
            <div id="dropzone"></div>
            <div class="form-group">
              <input class="form-control" type="text" name="service" id="inputService" readonly="readonly" />
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="duration" id="inputDuration" readonly="readonly" />
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="employee" id="inputEmployee" readonly="readonly" />
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="date" id="inputDate" readonly="readonly" />
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="time" id="inputTime" readonly="readonly" />
            </div>
            <div class="form-group text-area">
              <textarea class="form-control" name="message" id="message" cols="30" rows="10"></textarea>
            </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addCategory" name="appointSubmit" id="appointSubmit">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <?php
  include "./component/navigation.php";
  ?>
  <main>
    <div class="row">
      <div class="col-lg-8 mt-4">
        <div class="container">
            <div id="datepicker"></div>
        </div>
      </div>
      <div class="col-lg-4 appointment__cont">
        <div class="container">
           <h1 class="text-center app__header">Make an Appointment </h1>
         <div class="col-lg-12">
          <div class="form-group">
            <select class="form-control" name="service" id="service">
              <option disabled selected>Service</option>
              <?php
              $getServices = $connect->prepare("SELECT * FROM service");
              $getServices->execute();
              $services = $getServices->fetchAll();

              foreach ($services as $service) {
                $serviceId = $service['serviceId'];
                $name = $service['name'];
                $duration = $service['duration'];
              ?>
                <option value="<?php echo $serviceId  . " | " . $duration ?>"><?php echo $name ?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <select class="form-control" name="employee" id="employee">
              <option disabled selected>Dentist</option>
              <?php
              $getEmployees = $connect->prepare("SELECT * FROM employee");
              $getEmployees->execute();
              $dentists = $getEmployees->fetchAll();

              foreach ($dentists as $dentist) {
                $name = $dentist['title'] . " " . $dentist['firstName'] . " " . $dentist['lastName'];
              ?>
                <option value="<?php echo $dentist['employeeId'] ?>"><?php echo $name ?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="container">
            <div class="time-container">
              <ul class="times" id="times"></ul>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
    </div>
  </main>
  <script src="admin/js/dropzone.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src='assets/calendar/packages/core/main.js'></script>
  <script src='assets/calendar/packages/interaction/main.js'></script>
  <script src='assets/calendar/packages/daygrid/main.js'></script>
  <script src='assets/calendar/packages/timegrid/main.js'></script>
  <script src='assets/calendar/packages/list/main.js'></script>
  <script src="admin/js/fontawesome.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/nav.js"></script>
  <script src="js/appointment.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>


</body>

</html>
