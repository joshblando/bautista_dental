
<?php
  include 'nav.php';
?>
  <link href='../assets/calendar/packages/core/main.css' rel='stylesheet' />
  <link href='../assets/calendar/packages/daygrid/main.css' rel='stylesheet' />
  <link href='../assets/calendar/packages/timegrid/main.css' rel='stylesheet' />
  <link href='../assets/calendar/packages/list/main.css' rel='stylesheet' />
  <div class="row">
    <div class="col-lg-4">
      <div class="form-group">
          <select class="form-control ml-3" name="employee" id="dentist-sched">
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
  </div>
  <br><br>
  <div id='dentist-sched-calendar'></div>

  <script src='../js/jquery.min.js'></script>
  <script src='../js/jquery-ui.min.js'></script>
  <script src='../assets/calendar/packages/core/main.min.js'></script>
  <script src='../assets/calendar/packages/interaction/main.min.js'></script>
  <script src='../assets/calendar/packages/daygrid/main.min.js'></script>
  <script src='../assets/calendar/packages/timegrid/main.min.js'></script>
  <script src='../assets/calendar/packages/list/main.min.js'></script>
  <script src='../js/time-sched.js'></script>

<?php
  include 'footer.php';
?>   
        