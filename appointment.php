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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
  <link rel="stylesheet" href="style/nav.css" />
  <link rel="stylesheet" href="./style/general.css" />
  <link rel="stylesheet" href="./style/appointment.css" />

  <title>Bautista Dental Center</title>
</head>

<body>
  <?php
  include "./component/navigation.php"
  ?>
  <main>
    <div class="section-appointment">
      <div class="appointment-background"></div>
      <div class="appointment-content">

        <div class="appointment-container">
          <h1>Make an Appointment</h1>
          <div class="form-select">
            <select name="service" id="service">
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
            <select name="employee" id="employee">
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
          <div class="appointment-datetime">
            <!-- <h4>available dates blue highlight</h4> -->
            <div id="datepicker"></div>
            <div class="time-container">
              <ul class="times" id="times"></ul>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- The Modal -->
    <div id="appointmentModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content modal-size_small">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>Appointment</h2>
        </div>
        <div class="modal-body appoint-modal_body">
          <form id="formSubmit" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="serviceHidden" id="inputServiceHidden" />
            <input type="hidden" name="empHidden" id="inputEmployeeHidden" />
            <div class="form-input">
              <span><i class="fas fa-tooth"></i>Service: </span>
              <input type="text" name="service" id="inputService" readonly="readonly" />
            </div>
            <div class="form-input">
              <span><i class="fas fa-clock"></i>Duration: </span>
              <input type="text" name="duration" id="inputDuration" readonly="readonly" />
            </div>
            <div class="form-input">
              <span><i class="fas fa-user-md"></i>Dentist: </span>
              <input type="text" name="employee" id="inputEmployee" readonly="readonly" />
            </div>
            <div class="form-input">
              <span><i class="fas fa-calendar"></i>Date: </span>
              <input type="text" name="date" id="inputDate" readonly="readonly" />
            </div>
            <div class="form-input">
              <span><i class="fas fa-clock"></i>Time: </span>
              <input type="text" name="time" id="inputTime" readonly="readonly" />
            </div>
            <div class="form-input text-area">
              <span><i class="fas fa-message"></i>Additional Message: </span>
              <textarea name="message" id="message" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" name="appointSubmit" id="appointSubmit">Submit</button>
          </form>
        </div>

      </div>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://kit.fontawesome.com/0c5646b481.js" crossorigin="anonymous"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/nav.js"></script>
  <script src="js/appointment.js"></script>


</body>

</html>