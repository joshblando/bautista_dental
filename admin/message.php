
<?php
include "nav.php";
?>
<div class="row">
	<div class="col-lg-12">
		  <table class="display dt-responsive nowrap table table-striped" id="table_id" data-plugin="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile No.</th>
                <th>Body</th>
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

            foreach ($messages as $message) {
                $messageId = $message['messageId'];
                $name = $message['name'];
                $email = $message['email'];
                $mobile = $message['mobile'] == 0 ? 'none' : $message['mobile'];
                $body = base64_decode($message['body']);
                $date = date('Y-m-d H:i a', strtotime($message['createdAt']))

            ?>
                <tr>
                    <td><?php echo $messageId ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $mobile ?></td>
                    <td><?php echo $body ?></td>
                    <td><?php echo $date ?></td>
                    <td>
                        <button class="btn btn-info btn-message" data-name = "<?php echo $name ?>" data-email = "<?php echo $email ?>" data-mobile = "<?php echo $mobile ?>" data-body = "<?php echo $body ?>" data-toggle="modal" data-target="#messagesModal"><span class="icon"><i class="fas fa-eye view"></i></span></button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
	</div>
</div>
<script src="./js/messages.js"></script>

<?php
include "footer.php";
?>