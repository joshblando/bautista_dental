<?php 
	    require_once "../../config/control.php";

		if (isset($_POST['updt_about'])) {
			$updateDataHistory = [
            "description" => base64_encode($_POST['about_us_history']),
		    ];
		    $updateHistorty = $connect->prepare("UPDATE cms_content
		                                        SET description=:description
		                                        WHERE section='ABOUT' AND title = 'HISTORY'");
		    $updateHistorty->execute($updateDataHistory); 


		    $updateDataMission = [
            "description" => base64_encode($_POST['about_us_mission']),
		    ];
		    $updateMission = $connect->prepare("UPDATE cms_content
		                                        SET description=:description
		                                        WHERE section='ABOUT' AND title = 'MISSION'");
		    $updateMission->execute($updateDataMission); 


		    $updateDataVision = [
            "description" => base64_encode($_POST['about_us_vision']),
		    ];
		    $updateVision = $connect->prepare("UPDATE cms_content
		                                        SET description=:description
		                                        WHERE section='ABOUT' AND title = 'VISION'");
		    $updateVision->execute($updateDataVision); 


        	echo "<script>alert('Successfully Updated');
        			window.location='../cms/about.php';</script>";

		}
?>