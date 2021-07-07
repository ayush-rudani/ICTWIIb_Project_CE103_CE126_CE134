<?php
include('session.php');
?>

<!doctype html>
<html lang="en">

<head>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu&subset=cyrillic,latin' rel='stylesheet' type='text/css' />
    <style>
        .he {
            border: 2px solid grey;
            border-radius: 5px;
        }

        body {
            font-family: 'Ubuntu', sans-serif;
            /* background-image: url("bg3.jpg"); */
            background-image: url("Images/bg3.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;

        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Dashboard</title>
</head>

<body>

    <?php include('_header.html'); ?>

    <h2 class="m-3 text-center">Dashboard</h2>
    <center>

        <div class="card m-5 border border-2 border-danger" style="width: 50%;">
            <div class="card-body">
                <form action="delete_result.php" method="POST" name="delete">
                    <fieldset>
                        <legend class="he mb-5">Delete Result</legend>

                        <?php
                        include('init.php');

                        $class_result = mysqli_query($conn, "SELECT `name` FROM `class`");

                        echo '<select class="form-select mb-4 mt-5" aria-label="Default select example" name="class_name" style="width:30%">';
                        echo '<option selected disabled>Select Class</option>';
                        while ($row = mysqli_fetch_array($class_result)) {
                            $display = $row['name'];
                            echo '<option value="' . $display . '">' . $display . '</option>';
                        }
                        echo '</select>'
                        ?>

                        <div class="mb-3" style="width: 30%;">
                            <input type="text" class="form-control" name="rno" placeholder="Roll No" autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </fieldset>
                </form>
            </div>
        </div>


        <div class="card m-5 border border-2 border-primary" style="width: 50%;">
            <div class="card-body">
                <form action="" method="POST" name="update">
                    <fieldset>
                        <legend class="he mb-5">Update Result</legend>

                        <?php
                        $class_result = mysqli_query($conn, "SELECT `name` FROM `class`");

                        echo '<select class="form-select mb-4 mt-5" aria-label="Default select example" name="class" style="width:30%">';

                        echo '<option selected disabled>Select Class</option>';

                        while ($row = mysqli_fetch_array($class_result)) {
                            $display = $row['name'];
                            echo '<option value="' . $display . '">' . $display . '</option>';
                        }
                        echo '</select>'
                        ?>

                        <div class="mb-3" style="width: 45%;">
                            <input type="text" class="form-control" name="rn" placeholder="Roll No" autocomplete="off">
                        </div>

                        <div class="input-group mb-2">
                            <input type="text" placeholder="Subject" class="form-control" name="s1" autocomplete="off">
                            <input type="text" placeholder="Marks" class="form-control" name="p1" id="" autocomplete="off">
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" placeholder="Subject" class="form-control" name="s2" autocomplete="off">
                            <input type="text" placeholder="Marks" class="form-control" name="p2" id="" autocomplete="off">
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" placeholder="Subject" class="form-control" name="s3" autocomplete="off">
                            <input type="text" placeholder="Marks" class="form-control" name="p3" id="" autocomplete="off">
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" placeholder="Subject" class="form-control" name="s4" autocomplete="off">
                            <input type="text" placeholder="Marks" class="form-control" name="p4" id="" autocomplete="off">
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" placeholder="Subject" class="form-control" name="s5" autocomplete="off">
                            <input type="text" placeholder="Marks" class="form-control" name="p5" id="" autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </fieldset>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </center>
</body>

</html>

<?php
include('init.php');

if (isset($_POST['rn'], $_POST['p1'], $_POST['p2'], $_POST['p3'], $_POST['p4'], $_POST['p5'], $_POST['s1'], $_POST['s2'], $_POST['s3'], $_POST['s4'], $_POST['s5']) && isset($_POST['class'])) {
    $rno = $_POST['rn'];
    $class_name = $_POST['class'];
    $p1 = (int)$_POST['p1'];
    $p2 = (int)$_POST['p2'];
    $p3 = (int)$_POST['p3'];
    $p4 = (int)$_POST['p4'];
    $p5 = (int)$_POST['p5'];
    $s1 = $_POST['s1'];
    $s2 = $_POST['s2'];
    $s3 = $_POST['s3'];
    $s4 = $_POST['s4'];
    $s5 = $_POST['s5'];

    $marks = $p1 + $p2 + $p3 + $p4 + $p5;
    $percentage = $marks / 5;


    $sql = "UPDATE `result` SET `s1`='$s1',`s2`='$s2',`s3`='$s3',`s4`='$s4',`s5`='$s5',`p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`marks`='$marks',`percentage`='$percentage' WHERE `rno`='$rno' and `class`='$class_name'";
    $update_sql = mysqli_query($conn, $sql);

    if (!$update_sql) {
        echo '<script language="javascript">';
        echo 'alert("Invalid Details")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Updated")';
        echo '</script>';
    }
} else {
    echo "Nothing<br>";
}
?>