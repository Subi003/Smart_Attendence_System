<form method="POST">
	<input type="text" name="student_name" placeholder="Student Name" required autofocus / >
	<input type="submit" value="Add Student" name="submit">
</form>

<?php
	if (isset($_POST['submit'])) {

		require_once("config.php");
		$student_name = $_POST['student_name'];


		$query = "INSERT INTO attendance_student(student_name) VALUES ('$student_name')";

		$exeQuery = mysqli_query($db, $query) or die(mysqli_error($db));

		echo "Student has been added successfully!";



	}
    
?>