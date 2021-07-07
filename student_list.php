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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Students List</title>
</head>

<body>
    <?php include('_header.html'); ?>

    <center>
        <?php

        if (isset($_GET['cn']) && !empty(trim($_GET['cn']))) {
            include('init.php');
            
            $class_name = $_GET['cn'];
            $db = mysqli_select_db($conn, 'srms');
            $no_of_students_inclass = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `students` WHERE `class_name` = '$class_name'"));
            $sql = "SELECT `id` ,`name`, `email`, `rno` FROM `students`  WHERE `class_name` = '$class_name'";

            $result = mysqli_query($conn, $sql);

            echo '<h1><span class="badge bg-dark mt-4 mb-4">Students Detail of Class : <em>' . $class_name . ' : ' . $no_of_students_inclass[0] . '</em></span></h1>';

            if (mysqli_num_rows($result) > 0) {
                echo '<div class="card mt-4" style="width:55%;">
            <div class="card-body">';
                echo
                '<table class="table">
                <thead class="table-secondary">
                    <th>Roll No</th>
                    <th>Student Email-id</th>
                    <th>Name</th>
                    <th><th>
                </thead>';

                echo '<tbody>';

                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td><p class='fs-5'><a href='profile.php?id=" . $row['id'] . "'>" . $row['rno'] . "</a></p></td>";
                    echo '<td><a href="mailto:' . $row['email'] . '" ><p class="fs-5">' . $row['email'] . '</p></td>';
                    echo "<td><p class='fs-5'>" . $row['name'] . "</p></td>";
                    echo "<td><a href='delete_student.php?id=" . $row['id'] . "&cn=" . $class_name . "'><span class='badge bg-danger mt-1 mb-1 p-2'>Remove Student</span></a></td>";
                    echo "</tr>";
                }
                echo
                '</tbody>
                </table>
                </div>
                </div>';
            } else {
                echo '<div class="alert alert-danger m-5" role="alert">No Students are there in ' . $class_name . ' class' . '</div>';
            }
        }
        ?>

    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>