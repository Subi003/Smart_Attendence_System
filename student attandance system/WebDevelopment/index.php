<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Attendence</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
        <div class="container-fluid">
                <header class="bg-primary text-white text-center mb-3 py-3">
                        <div class="row">
                                <div class="col-12">
                                        
                                <h1>SMART ATTENDANCE MANAGEMENT SYSTEM..</h1>
                                <h3>STUDENT ATTENDANCE OF MONTH: <u><?php echo strtoupper(date("F")); ?></u></h3>
                                </div>
                        </div>
                </header>

                <div class="row">
                <div class="col-8">
                        <?php
                        require_once("SmartAttendanceSheet.php");
                        ?>
                </div>
                <div class="col-4">
                        <?php
                             require_once("addingStudents.php");
                             echo "<hr>";
                             require_once("addAttendance.php");
                        ?>
                </div>


                        </div>
        </div>






        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>




