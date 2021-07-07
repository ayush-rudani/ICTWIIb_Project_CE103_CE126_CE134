<?php
include("init.php");
?>

<!doctype html>
<html lang="en">

<head>
    <style>
        .he {
            border: 2px solid grey;
            border-radius: 5px;
        }

        .lst {
            border: 2px solid #eff5f5;
            border-radius: 5px;
        }

        .he {
            border: 2px solid #b1cece;
            border-radius: 5px;
        }

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

    <title>Result</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-2 navbar-dark bg-secondary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                </ul>
                <div class="d-flex justify-content-end"><button type="button" class="btn btn-outline-warning float-right m-2" onclick="history.back(-1)">Back</button></div>
            </div>
        </div>
    </nav>
    <h1 class="m-3 m-5 text-center he">Result</h1>
    <?php
    include("init.php");
    $id = $_POST['id'];

    if (empty($id)) {
        if (empty($id))
            echo '<div class="alert alert-danger m-5" role="alert">Please enter valid ID Number</div>';
        exit();
    }

    $name_sql = mysqli_query($conn, "SELECT  * FROM `students` WHERE `id`='$id'");
    while ($row = mysqli_fetch_assoc($name_sql)) {
        $name = $row['name'];
        $rn = $row['rno'];
        $class = $row['class_name'];
        $id2 = $row['id'];
    }

    $result_sql = mysqli_query($conn, "SELECT `s1`,`s2`,`s3`,`s4`,`s5`, `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' ");
    while ($row = mysqli_fetch_assoc($result_sql)) {
        $p1 = $row['p1'];
        $p2 = $row['p2'];
        $p3 = $row['p3'];
        $p4 = $row['p4'];
        $p5 = $row['p5'];
        $s1 = $row['s1'];
        $s2 = $row['s2'];
        $s3 = $row['s3'];
        $s4 = $row['s4'];
        $s5 = $row['s5'];
        $mark = $row['marks'];
        $percentage = $row['percentage'];
    }
    if ($id == $id2) {
        echo '<div class="alert alert-danger m-4" role="alert">Please Enter valid ID.</div>';
        exit();
    }
    if (mysqli_num_rows($result_sql) == 0) {
        echo '<center><h1>No result</h1></center>';
        exit();
    }
    ?>
    <center>
        <div class="card m-5 border border-2 border-primary" style="width: 50%;">
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-sm-evenly">
                        <span class="input-group-text fs-5" style="width:auto ;"><b>Name : </b> &nbsp;<?php echo $name ?></span>

                        <span class="input-group-text fs-5" style="width:auto ;"><b>Class : </b> &nbsp;<?php echo $class ?></span>

                        <span class="input-group-text fs-5" style="width:auto ;"><b>Roll No : </b> &nbsp;<?php echo $rn ?></span>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-5 fs-4 m-4 he bg-secondary text-white"><b>Subjects</b></div>
                        <div class="col-5 fs-4 m-4 he bg-secondary text-white"><b>Marks</b></div>
                    </div>
                    <div class="row">
                        <div class="col-5 fs-5 m-4 lst "><b><?php echo '<p>' . $s1 . '</p>'; ?></b></div>
                        <div class="col-5 fs-5 m-4"><?php echo '<p>' . $p1 . '</p>'; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-5 fs-5 m-4 lst"><b><?php echo '<p>' . $s2 . '</p>'; ?></b></div>
                        <div class="col-5 fs-5 m-4"><?php echo '<p>' . $p2 . '</p>'; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-5 fs-5 m-4 lst"><b><?php echo '<p>' . $s3 . '</p>'; ?></b></div>
                        <div class="col-5 fs-5 m-4"><?php echo '<p>' . $p3 . '</p>'; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-5 fs-5 m-4 lst"><b><?php echo '<p>' . $s4 . '</p>'; ?></b></div>
                        <div class="col-5 fs-5 m-4"><?php echo '<p>' . $p4 . '</p>'; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-5 fs-5 m-4 lst"><b><?php echo '<p>' . $s5 . '</p>'; ?></b></div>
                        <div class="col-5 fs-5 m-4"><?php echo '<p>' . $p5 . '</p>'; ?></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5 fs-4 m-4 he"><b>Total Marks : </b>
                            <div class="col-5 fs-5 m-4"><?php echo '<p>' . $mark . '</p>'; ?></div>
                        </div>
                        <div class="col-5 fs-4 m-4 he"><b>Percentage </b>
                            <div class="col-5 fs-5 m-4"><?php echo '<p>' . $percentage . '%</p>'; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-primary mb-5" onclick="window.print()">Print Result</button>
        </div>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>