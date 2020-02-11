<?php  
    $connect = mysqli_connect("localhost", "root", "", "bautista_dental_db");
    session_start();

    $id = $_SESSION['userId'];
    if(isset($_POST['view'])){

    if($_POST["view"] != '')
    {
        $update_query = "UPDATE notification SET seen = 1 WHERE notifiable='$id' AND seen=0";
        mysqli_query($connect, $update_query);
    }
    $query = "SELECT * FROM notification WHERE notifiable='$id'ORDER BY readAt ASC, createdAt DESC";
    $result = mysqli_query($connect, $query);
    $output = '';
    if(mysqli_num_rows($result) > 0)
    {
     while($row = mysqli_fetch_array($result))
     {
       if ($row["readAt"] == '0000-00-00') {
           $output .= '<a class="dropdown-item notif__item unread__notif" href="ajax/readMessage.php?id='.$row["notif_id"].'&&redirect_url='.$row["redirectUrl"].'"><span>'.$row["details"].'</span><br /><small class="float-right notif__date">'.date('Y-m-d H:i a', strtotime($row["createdAt"])).'</small></a>';
       }
       else{
            $output .= '<a class="dropdown-item notif__item" href="ajax/readMessage.php?id='.$row["notif_id"].'&&redirect_url='.$row["redirectUrl"].'"><span>'.$row["details"].'</span><br /><small class="float-right notif__date">'.date('Y-m-d H:i a', strtotime($row["createdAt"])).'</small></a>';
       }
       

     }
    }
    else{
         $output .= '
         <a class="dropdown-item" href="#" class="text-bold text-italic">No Notification Found</a>';
    }



    $status_query = "SELECT * FROM notification WHERE notifiable='$id' AND seen=0";
    $result_query = mysqli_query($connect, $status_query);
    $count = mysqli_num_rows($result_query);
    $data = [
        'notification' => $output,
        'unseen_notification'  => $count
    ];

    echo json_encode($data);

    }


?>