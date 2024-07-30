<?php
    require_once("config.php");
    $firstDayOfMonth = date("1-m-y");
    $totalDaysInMonth = date("t", strtotime($firstDayOfMonth));

    //fetching data
    $fetchingStudents = mysqli_query($db, "SELECT * FROM attendance_student") OR die(mysqli_error($db));
    $totalNumberOfStudents = mysqli_num_rows($fetchingStudents);

    $studentsNamesArray = array();
    $studentsIDsArray = array();


    $counter = 0;
    while ($students = mysqli_fetch_assoc($fetchingStudents)) {
        $studentsNamesArray[] = $students['student_name'];
        $studentsIDsArray[] = $students['id'];
    }

   


?>

<table border="1" cellspacing="0">
	<?php
        for($i = 1; $i<=$totalNumberOfStudents + 2; $i++)
        {
        	if ($i == 1) {
        	
        	        	echo "<tr>";
        	        	echo"<td rowspan = 2>Names</td>";

        	         	for ($j = 1; $j<=$totalDaysInMonth; $j++) { 
        			   echo "<td>$j</td>";
        		    }
              		  echo "</tr>";
                }else if ($i == 2) {
        	
        	        	echo "<tr>";

        	         	for ($j = 0; $j<$totalDaysInMonth; $j++) { 
        			   echo "<td>" . date("D", strtotime("+$j days", strtotime($firstDayOfMonth))) . "</td>";
        		    }
              		  echo "</tr>";
                }else{
        	
        	        	echo "<tr>";
        	        	echo "<td>" . $studentsNamesArray[$counter] . "</td>";
        	         	for ($j = 1; $j<=$totalDaysInMonth; $j++) { 

                            $dateOfAttendance = date("Y-m-$j");
                            
                            $fetchingStudentsAttendance = mysqli_query($db, "SELECT attendance FROM attendance WHERE student_id = '". $studentsIDsArray[$counter] ."' AND curr_date = '". $dateOfAttendance ."'") or die(mysqli_error($db));

                                $isAttendanceAdded = mysqli_num_rows($fetchingStudentsAttendance);
                                if($isAttendanceAdded > 0)
                                {
                                    $studentAttendance = mysqli_fetch_assoc($fetchingStudentsAttendance);
                                    if ($studentAttendance['attendance'] == "P") 
                                    {
                                        $color = "green";
                                    }elseif ($studentAttendance['attendance'] == "A") {
                                        $color = "red";
                                    }elseif ($studentAttendance['attendance'] == "H") {
                                        $color = "blue";
                                    }elseif ($studentAttendance['attendance'] == "L") {
                                        $color = "brown";
                                    }
                                    echo "<td style='background-color: $color; color:white'>" . $studentAttendance['attendance'] . "</td>";
                                }else{
                                    echo "<td></td>";
                                }

        			   
        		    }
              		  echo "</tr>";
                      $counter++;
                }
        }
	?>
</table>