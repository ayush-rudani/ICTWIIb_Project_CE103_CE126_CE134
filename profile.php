<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <script>
        var gender = '<php echo $gender; ?>';
        var male = "Male";
        var female = "Female";

        if (!(male.localeCompare(gender))) {
            var imageshown = "https://bootdey.com/img/Content/avatar/avatar7.png"
        } else {
            var imageshown = "https://bootdey.com/img/Content/avatar/avatar8.png"
        }
        document.getElementById('avatar').src = imageshown;
    </script> -->
    <style>
        .he {
            border: 2px solid grey;
            border-radius: 5px;

        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Student Profile</title>
    <style>
        body {
            background-color: white;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
            /* background-image: url("bg3.jpg"); */
            background-image: url("Images/bg3.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
            margin-left: 20px;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
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
    <!-- <php include('_nav.html'); ?> -->
    <nav class="navbar navbar-expand-lg p-2 navbar-dark bg-secondary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                </ul>
                <div class="d-flex justify-content-end"><a href="logout.php"><button type="button" class="btn btn-outline-warning float-right m-2">Logout</button></a></div>
            </div>
        </div>
    </nav>

    <?php
    // // include("session.php");
    // // session_start();
    // if (isset($_POST['id']) &&  isset($_POST['email']) && isset($_POST['rn'])) {
    //     $id = $_POST['id'];
    //     $email = $_POST['email'];
    //     $rn = $_POST['rn'];
    // echo " All " . $rn . " " . $email . " " . $id . " ";
    //     // $class = $_POST['class'];
    // }

    // // Validation 

    // if (empty($id) or preg_match("/[a-z]/i", $rn)) {
    //     if (empty($id))
    //         echo '<div class="alert alert-danger m-5" role="alert">Please enter your ID</div>';
    //     // if (empty($class))
    //     //     echo '<div class="alert alert-danger m-5" role="alert">Please select your class</div>';
    //     if (empty($rn))
    //         echo '<div class="alert alert-danger m-5" role="alert">Please enter your roll number</div>';
    //     // if (preg_match("/[a-z]/i", $rn))
    //         // echo '<div class="alert alert-danger m-5" role="alert">Please enter valid roll number</div>';
    //     exit();
    // }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        include("init.php");
        $id = $_GET['id'];


        $db = mysqli_select_db($conn, 'srms');
        $student = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `students` WHERE `id` ='$id'"));

        if ($student[0] == 1) {
            $sql = "SELECT `id`, `name`, `email`,`gender` ,`rno`,`course`, `class_name` FROM `students`  WHERE `id` = '$id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $gender = $row['gender'];

                echo '
                <div class="container">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                        </nav>
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" id="avatar" alt="Gender" class="rounded-circle" width="150">
                                            <div class="mt-3">
                                                <h4>' . $row['name'] . '</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3">
                                    <form action="./student.php" method="POST">
                                    <div class="m-3">
                                    <input type="text" class="form-control" name="id" autocomplete="off" placeholder="Sudent ID" style="width: 40%;">
                                    </div>
                                    <button type="submit" style="margin-left:20px;" class="btn btn-primary mb-4">Get result</button></form>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">ID</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                ' . $row['id'] . '
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                ' . $row['name'] . '
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                ' . $row['email'] . '
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Gender</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                ' . $row['gender'] . '
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Roll No</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                ' . $row['rno'] . '
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Course</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                ' . $row['course'] . '
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Class Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                ' . $row['class_name'] . '
                                            </div>
                                        </div>

                                    </div>
                                </div>';

                $rno = $row['rno'];
                $class = $row['class_name'];
                $sql2 = "SELECT * FROM `result` WHERE rno='$rno'";
                $result2 = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($result2) > 0) {
                    $row2 = mysqli_fetch_array($result2);

                    echo '<div class="row gutters-sm">
                                    <div class="col-sm-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Result</i></h6>
                                                <small class="fs-5">' . $row2['s1'] . '</small>
                                                <div class="progress mb-3" style="height: 5px">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width:' . $row2['p1'] . '%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <small class="fs-5">' . $row2['s2'] . '</small>
                                                <div class="progress mb-3" style="height: 5px">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width:' . $row2['p2'] . '%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <small class="fs-5">' . $row2['s3'] . '</small>
                                                <div class="progress mb-3" style="height: 5px">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width:' . $row2['p3'] . '%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <small class="fs-5">' . $row2['s4'] . '</small>
                                                <div class="progress mb-3" style="height: 5px">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width:' . $row2['p4'] . '%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <small class="fs-5">' . $row2['s5'] . '</small>
                                                <div class="progress mb-3" style="height: 5px">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width:' . $row2['p5'] . '%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>';
                } else {
                    echo '<div class="alert alert-danger m-4" role="alert">Result not Added.</div>';
                }
            }
        }
    }
    ?>



</body>

</html>