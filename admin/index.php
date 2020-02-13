<?php
include 'nav.php';
?>
  <link href='../assets/calendar/packages/core/main.css' rel='stylesheet' />
  <link href='../assets/calendar/packages/daygrid/main.css' rel='stylesheet' />
  <link href='../assets/calendar/packages/timegrid/main.css' rel='stylesheet' />
  <link href='../assets/calendar/packages/list/main.css' rel='stylesheet' />
  <link href='style/dashboard.css' rel='stylesheet' />

  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">    
          <h4 class="card-title">APPOINTMENTS</h4>  
          <hr>  
           <div class="container mb-2">
              <div id='calendar'></div>
          </div> 
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">INQUIRIES</h4>
          <div class="container pb-4">
            <table class="display dt-responsive nowrap table table-striped" style="font-size: 12px;" id="table_id" data-plugin="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../config/control.php";

                    $getMessages = $connect->prepare("SELECT * from message");
                    $getMessages->execute();
                    $messages = $getMessages->fetchAll();

                    foreach ($messages as $key => $message) {
                        $messageId = $message['messageId'];
                        $name = $message['name'];
                        $email = $message['email'];
                        $mobile = $message['mobile'];
                        $body = base64_decode($message['body']);
                        $date = date('Y-m-d H:i a', strtotime($message['createdAt']));

                        if ($key != 7) {    
                        ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $email ?></td>
                                <td><?php echo $date ?></td>
                                <td class="text-rigth">
                                    <button class="btn btn-info btn-message btn-sm" data-name = "<?php echo $name ?>" data-email = "<?php echo $email ?>" data-mobile = "<?php echo $mobile ?>" data-body = "<?php echo $body ?>" data-toggle="modal" data-target="#messagesModal"><span class="icon"><i class="fas fa-eye view"></i></span></button>
                                </td>
                            </tr>
                        <?php
                      }
                    }
                    ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">REPORTS</h4>
        </div>
      </div>
    </div>
  </div>
  
  <script src='../assets/calendar/packages/core/main.js'></script>
  <script src='../assets/calendar/packages/interaction/main.js'></script>
  <script src='../assets/calendar/packages/daygrid/main.js'></script>
  <script src='../assets/calendar/packages/timegrid/main.js'></script>
  <script src='../assets/calendar/packages/list/main.js'></script>
  <script src='../js/calendar-dentist.js'></script>
  <script src="./js/messages.js"></script>

<?php
include 'footer.php';
?>