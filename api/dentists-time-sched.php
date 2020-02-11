<?php 
	require_once "../config/control.php";

	$array = array('7:00 AM', '8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM');

	$timeSched = array();
    $employee = 'Ma2hzx81';
    $finalData = [];
    $newData = [];

	$plag = 0;

	 for ($i=01; $i <= 12; $i++) { 
        for ($e=01; $e <= 31; $e++) { 

                $sql_removedSched = "SELECT time from schedule WHERE employeeId=:employee && date=:date";
                $removed_timeSched = $connect->prepare($sql_removedSched);
                $removed_timeSched->execute(["employee" => $employee, "date" => date('Y-m-d', strtotime(date('Y').'-'.$i.'-'.$e))]);
                $removedSched = $removed_timeSched->fetchAll() ?? '';
               

                if ($removedSched != null) { 
                    foreach ($removedSched as $removed) { 
                        $sample = array_diff($array, $removed);
                         for ($k=0; $k < count($sample); $k++) { 
                            if (!empty($sample[$k])) {
                                array_push($finalData, $sample[$k]);     
                            }
                         }
                        $finalData = array($sample);
                    }

                    echo  date('Y').'-'.$i.'-'.$e.'----'.json_encode($finalData);                     
                    // $finalData = $newData; 
                }         
                else{
                   $finalData = $array;
                }


        	for ($t=0; $t < count($finalData) ; $t++) { 
                $timeSched[$plag] = [
                    'start' => date('Y-m-d H:i:s', strtotime(date('Y').'-'.$i.'-'.$e.' '.$array[$t])),
                    'title' => $finalData[$t],
                    'color' => '#19acb4',
                    'dateSched' => date('Y-m-d', strtotime(date('Y').'-'.$i.'-'.$e)),
                ];
        		$plag++; 
        	}
        }
    }

    // echo json_encode($timeSched);
?>