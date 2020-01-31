<?php
include 'nav.php'
?>

  <table class="display dt-responsive nowrap table table-striped" id="table_id">
    <thead>
      <tr>
        <th>ID</th>
        <th>Patient</th>
        <th>Service</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $getAppointments = $connect->prepare("SELECT * from appointment ORDER BY createdAt DESC");
      $getAppointments->execute();
      $appointments = $getAppointments->fetchAll();

      foreach ($appointments as $appointment) {
        $appointmentId = $appointment['appointmentId'];
        $userId = $appointment['userId'];
        $serviceId = $appointment['serviceId'];
        $employeeId = $appointment['employeeId'];
        $date = new DateTime($appointment['date']);
        $dateFormat = $date->format("d M Y");
        $start = $appointment['start'];
        $duration = $appointment['duration'];
        $status = $appointment['status'];

        // GET THE USER DETAILS
        $sqlUsers = $connect->prepare("SELECT firstName, lastName FROM user WHERE userId = :userId");
        $sqlUsers->execute(["userId" => $userId]);
        $userRow = $sqlUsers->fetch(PDO::FETCH_ASSOC);
        $userName = $userRow['firstName'] . " " . $userRow['lastName'];

        // GET THE SERVICE DETAILS
        $sqlService = $connect->prepare("SELECT name FROM service WHERE serviceId = :serviceId");
        $sqlService->execute(["serviceId" => $serviceId]);
        $serviceRow = $sqlService->fetch(PDO::FETCH_ASSOC);
        $serviceName = $serviceRow['name'];
        // GET DENTIST DETAILS
        $sqlEmployee = $connect->prepare("SELECT title,firstName,lastName FROM employee WHERE employeeId = :employeeId");
        $sqlEmployee->execute(["employeeId" => $employeeId]);
        $employeeRow = $sqlEmployee->fetch(PDO::FETCH_ASSOC);
        $employeeName = $employeeRow['title'] . " " . $employeeRow['firstName'] . " " . $employeeRow['lastName'];

      ?>
        <tr>
          <td><?php echo $appointmentId ?></td>
          <td><?php echo $userName ?></td>
          <td><?php echo $serviceName ?></td>
          <td><?php echo $dateFormat ?></td>
          <td><?php echo $start ?></td>
          <td><?php echo $status ?></td>
          <td>
            <a href="#"><span class="icon"><i class="fas fa-eye view"></i></span></a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
     
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/0c5646b481.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/zf-6.4.3/dt-1.10.20/r-2.2.3/rg-1.1.1/sc-2.0.1/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      // dataTable
      $('#table_id').DataTable({
        responsive: true,
        pageLength: 5,
        "aaSorting": [],
        "lengthChange": false,
        "language": {
          search: '<i class="fas fa-search" aria-hidden="true"></i>',
          searchPlaceholder: 'Search...'
        },
        columnDefs: [{
            targets: [0, 6],
            orderable: false
          },
          {
            responsivePriority: 1,
            targets: 0
          },
          {
            responsivePriority: 2,
            targets: 5
          }
        ],
      });
      // end dataTable
    });
  </script>

<?php
include 'footer.php'
?>