<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .he {
            border: 2px solid grey;
            border-radius: 5px;

        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Add Results</title>
    <style>
        body {
            background-color: white;
            /* background-image: url("bg3.jpg"); */
            background-image: url("Images/bg3.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            

        }

        .heading {
            display: flex;
            float: center;
            font-size: 60px;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php include('_header.html'); ?>
    <a href="dashboard.php"></a>
    <span class="heading">Dashboard</span>

    <center>
        <div class="card m-5 border border-primary" style="width: 50%;">
            <div class="card-body">
                <form action="" method="post">
                    <fieldset>
                        <legend class="he mb-5">Enter Marks</legend>

                        <?php
                        include("init.php");
                        $class_result = mysqli_query($conn, "SELECT `name` FROM `class`");
                        //select class

                        echo '<select class="form-select mb-4" aria-label="Default select example" name="class_name" style="width: 40%;">';

                        echo '<option selected>Select Class</option>';

                        while ($row = mysqli_fetch_array($class_result)) {
                            $display = $row['name'];
                            echo '<option value="' . $display . '">' . $display . '</option>';
                        }
                        echo '</select>';
                        ?>


                        <div class="mb-3" style="width: 30%;">
                            <input type="text" class="form-control" name="rno" placeholder="Roll No" autocomplete="off">
                        </div>

                        <div class="input-group mb-2">
                            <input type="text" placeholder="Subject" class="form-control" name="s1">
                            <input type="text" placeholder="Marks" class="form-control" name="p1" id="">
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" placeholder="Subject" class="form-control" name="s2">
                            <input type="text" placeholder="Marks" class="form-control" name="p2" id="">
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" placeholder="Subject" class="form-control" name="s3">
                            <input type="text" placeholder="Marks" class="form-control" name="p3" id="">
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" placeholder="Subject" class="form-control" name="s4">
                            <input type="text" placeholder="Marks" class="form-control" name="p4" id="">
                        </div>
                        <div class="input-group mb-2">
                            <input type="text" placeholder="Subject" class="form-control" name="s5">
                            <input type="text" placeholder="Marks" class="form-control" name="p5" id="">
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['rno'], $_POST['p1'], $_POST['p2'], $_POST['p3'], $_POST['p4'], $_POST['p5'], $_POST['s1'], $_POST['s2'], $_POST['s3'], $_POST['s4'], $_POST['s5'])) {
    $rno = $_POST['rno'];
    if (!isset($_POST['class_name']))
        $class_name = null;
    else
        $class_name = $_POST['class_name'];
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

    // validation
    if (empty($class_name) or empty($rno) or $p1 > 100 or  $p2 > 100 or $p3 > 100 or $p4 > 100 or $p5 > 100 or $p1 < 0 or  $p2 < 0 or $p3 < 0 or $p4 < 0 or $p5 < 0) {
        if (empty($class_name))
            echo '<div class="alert alert-danger m-5" role="alert">Please select class</div>';

        if (empty($rno))
            echo '<div class="alert alert-danger m-5" role="alert">Please enter roll number</div>';

        if (preg_match("/[a-z]/i", $rno))
            echo '<div class="alert alert-danger m-5" role="alert">Please enter valid roll number</div>';

        if (preg_match("/[a-z]/i", $marks))
            echo '<div class="alert alert-danger m-5" role="alert">Please enter valid marks</div>';

        if ($p1 > 100 or  $p2 > 100 or $p3 > 100 or $p4 > 100 or $p5 > 100 or $p1 < 0 or  $p2 < 0 or $p3 < 0 or $p4 < 0 or $p5 < 0)
            echo '<div class="alert alert-danger m-5" role="alert">Please enter valid marks</div>';

        exit();
    }

    $name = mysqli_query($conn, "SELECT `name` FROM `students` WHERE `rno`='$rno' and `class_name`='$class_name'");
    while ($row = mysqli_fetch_array($name)) {
        $display = $row['name'];
        echo $display;
    }

    $sql = "INSERT INTO `result` (`name`, `rno`, `class`,`s1`,`s2`,`s3`,`s4`,`s5`, `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage`) VALUES ('$display', '$rno', '$class_name','$s1','$s2','$s3','$s4','$s5', '$p1', '$p2', '$p3', '$p4', '$p5', '$marks', '$percentage')";
    $sql = mysqli_query($conn, $sql);

    if (!$sql) {
        echo '<div class="alert alert-danger m-5" role="alert">Invalid Details </div>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Result Added")';
        echo '</script>';
    }
}
?>