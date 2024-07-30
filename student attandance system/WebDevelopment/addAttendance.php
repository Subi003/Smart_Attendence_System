	<table border="1" cellspacing="0">
		<form method="POST">
		<tr>
			<th>Student Name</th>
			<th>P</th>
			<th>A</th>
			<th>L</th>
			<th>H</th>
		</tr>
		<?php
			require_once("config.php");
			$fetchingStudents = mysqli_query($db, "SELECT * FROM attendance_student") or die(mysqli_error($db));
			while ($data = mysqli_fetch_assoc($fetchingStudents)) {
				$student_name = $data['student_name'];
				$student_id = $data['id'];

			?>
					<tr>
						<td>
							<?php echo $student_name; ?>
						</td>

						<td><input type="checkbox" name="studentPresent[]" value="<?php echo $student_id; ?>" /></td>
						<td><input type="checkbox" name="studentAbsent[]" value="<?php echo $student_id; ?>" /></td>
						<td><input type="checkbox" name="studentLeave[]" value="<?php echo $student_id; ?>" /></td>
						<td><input type="checkbox" name="studentHoliday[]" value="<?php echo $student_id; ?>" /></td>
					</tr>
			<?php

			}
		?>

		<tr>
			<td>Select Date</td>
			<td colspan="4"><input type="date" name="selected_date" required></td>
		</tr>
		<tr>
			<th colspan="5"> <input type="submit" name="addAttendanceBTN"></th>
		</tr>
	</form>
</table>

<?php
	if(isset($_POST['addAttendanceBTN']))
	{
		// date_default_timezone_set("Asia/Dehli");

		//Data Logic Stars
		if($_POST['selected_date'] == NULL)
		{
			$selected_date = date();
		}else{
			$selected_date = $_POST['selected_date'];
		}
		//Data Logic Ends

		$attendance_month = date("M", strtotime($selected_date));
		$attendance_year = date("Y", strtotime($selected_date));

		if(isset($_POST['studentPresent']))
		{
		$studentPresent = $_POST['studentPresent'];
		$attendance = "P";

		foreach ($studentPresent as $atd) {
						mysqli_query($db, "INSERT INTO attendance(student_id, curr_date, attendance_month, attendance_year, attendance) VALUES('". $atd . "', '". $selected_date ."', '". $attendance_month ."', '". $attendance_year ."', '". $attendance ."')") or die(mysqli_error($db));
					}			
		}

		if(isset($_POST['studentAbsent']))
		{
		$studentAbsent = $_POST['studentAbsent'];	
		$attendance = "A";

		foreach ($studentAbsent as $atd) {
						mysqli_query($db, "INSERT INTO attendance(student_id, curr_date, attendance_month, attendance_year, attendance) VALUES('". $atd . "', '". $selected_date ."', '". $attendance_month ."', '". $attendance_year ."', '". $attendance ."')") or die(mysqli_error($db));
					}		
		}

		if(isset($_POST['studentLeave']))
		{
		$studentLeave = $_POST['studentLeave'];
		$attendance = "L";

		foreach ($studentLeave as $atd) {
						mysqli_query($db, "INSERT INTO attendance(student_id, curr_date, attendance_month, attendance_year, attendance) VALUES('". $atd . "', '". $selected_date ."', '". $attendance_month ."', '". $attendance_year ."', '". $attendance ."')") or die(mysqli_error($db));
					}			
		}

		if(isset($_POST['studentHoliday']))
		{
		$studentHoliday = $_POST['studentHoliday'];		
		$attendance = "H";

		foreach ($studentHoliday as $atd) {
						mysqli_query($db, "INSERT INTO attendance(student_id, curr_date, attendance_month, attendance_year, attendance) VALUES('". $atd . "', '". $selected_date ."', '". $attendance_month ."', '". $attendance_year ."', '". $attendance ."')") or die(mysqli_error($db));
					}	
		}



		echo "Attendance added successfully";
	}
?>