<?php
include("init.php");
include("session.php");

$no_of_classes = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `class`"));
$no_of_students = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `students`"));
$no_of_result = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `result`"));
?>
<!doctype html>
<html lang="en">

<head>
    <style>
        body {
            /* background-image: url("bg3.jpg"); */
            background-image: url("Images/bg3.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body>
    <?php include('_header.html'); ?>
    <center>
        <h1><span class="badge bg-dark m-4 fs-2"><em>Dashboard</em></span></h1>
    </center>


    <div class="card-deck">
        <div class="card" style="width: 20rem; float:left; height: 20%; margin-top:30px; margin-left:260px;">

            <a href="manage_classes.php"><img src="Images/classroom7.jpg" style="height:268px;" class="card-img-top" alt="classes"></a>
            <div class="card-body">
                <p class="card-text">Number of Classes:</p>
                <?php echo '<strong><h3>' . $no_of_classes[0] . '</h3></strong>';
                ?>
            </div>
        </div>

        <div class="card" style="width: 20rem; float:right; height: 20%;  margin-top:30px; margin-right:260px;">
            <a href="manage_students.php"><img src="Images/student4.gif" class="card-img-top" style="height:268px;" alt="students"></a>

            <div class="card-body">
                <p class="card-text">
                <p class="card-text">Number of Students:</p>
                <?php echo '<strong><h3>' . $no_of_students[0] . '</h3></strong>';
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>