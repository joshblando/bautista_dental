<?php 
    if (isset($_POST['inquirybtn'])) {
        require_once "../config/control.php";

        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($str);
        $generatedID = substr($shuffled, 0, 8);

        $message_result = [
            "messageId" => $generatedID,
            "name" => $_POST['fullName'],
            "email" => $_POST['email'],
            "mobile" => $_POST['mobile'],
            "body" => base64_encode($_POST['message']),
        ];

        $newMessage = $connect->prepare("INSERT INTO message (messageId, name, email, mobile, body)
                                                    VALUES(:messageId, :name, :email, :mobile, :body)");
        $newMessage->execute($message_result);
        $message = 'New Inquiry from '.$_POST['fullName'].' has been recieved';


        notification('ADMIN', $message, 'message.php', $connect);

        echo '<script>
                 alert("Your Inquiry has been sent");
                 history.go(-1);
              </script>';



    }
?>