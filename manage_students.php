<?php include('session.php'); ?>
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
    <title>Dashboard</title>
</head>


<body>
    <?php include('_header.html'); ?>

    <center>
        <?php
        include('init.php');
        $sql = "SELECT `id`, `name`, `rno`, `class_name` FROM `students`";
        $result = mysqli_query($conn, $sql);

        echo '<h1><span class="badge bg-dark m-4">Manage Students</span></h1>';

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="card mt-4" style="width:55%;">
            <div class="card-body">';
            echo
            '<table class="table">
                <thead class="table-secondary">
                    <th>NAME</th>
                    <th>ROLL NO</th>
                    <th>CLASS</th>
                    <th></th>
                </thead>';

            echo '<tbody>';
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td class='fs-5'><a href='profile.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></td>";
                echo "<td class='fs-5'>" . $row['rno'] . "</td>";
                echo "<td class='fs-5'>" . $row['class_name'] . "</td>";
                echo "</tr>";
            }

            echo
            '</tbody>
            </table>
            </div>
            </div>';
        } else {
            echo "No Students Available";
        }
        ?>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>