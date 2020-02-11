<?php
  // Create database connection
  require_once "../../config/control.php";

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_FILES['file'])) {
  	// Get image name
  	$image = $_FILES['file']['name'];
  	// Get text
  	// $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "../../images/".basename($image);

  	// $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	// // execute query
  	// mysqli_query($db, $sql);

        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($str);
        $generatedID = substr($shuffled, 0, 8);

        $media_result = [
            "mediaID" => $generatedID,
            "image" => $image,
            "page" => 'HOME',
            "component"=> 'BANNER'
           
        ];

        $newMedia = $connect->prepare("INSERT INTO media (mediaID, image, page, component)
                                                    VALUES(:mediaID, :image, :page, :component)");
        $newMedia->execute($media_result);

  	if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  // $result = mysqli_query($db, "SELECT * FROM images");
?>
