<?php
include('session.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body>
    <?php include('_header.html'); ?>
    <center>
        <?php
        include('init.php');

        $db = mysqli_select_db($conn, 'srms');

        $sql = "SELECT `name`, `id` FROM `class`";
        $result = mysqli_query($conn, $sql);

        echo '<h1><span class="badge bg-dark m-4">Manage Classes</span></h1>';

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="card mt-4 mb-5" style="width:55%;">
            <div class="card-body">';
            echo
            '<table class="table">
                <thead class="table-secondary">
                    <th>NO</th>
                    <th>CLASS</th>
                    <th style="width:25%;">Students in Class</th>
                </thead>';

            echo '<tbody>';

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td> <p class='fs-5'><b>" . $row['id'] . "</b></p></td>";
                echo "<td><p class='fs-5'>" . $row['name'] . "</p></td>";
                echo "<td><a href='student_list.php?cn=" . $row['name'] . "'><span class='badge bg-primary m-1 p-2'>Class Students</span></a></td>";
                echo "</tr>";
            }
            echo
            '</tbody>
            </table>
            </div>
            </div>';
        } else {
            echo "No Classes Available";
        }
        ?>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>