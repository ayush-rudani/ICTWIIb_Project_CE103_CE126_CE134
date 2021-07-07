<?php include('session.php');
?>
<!doctype html>
<html lang="en">

<head>
    <style>
        .he {
            border: 2px solid grey;
            border-radius: 5px;
        }

        body {
            /* background-image: url("bg3.jpg"); */
            background-image: url("Images/bg3.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Add Students</title>
</head>

<body>
    <?php include('_header.html'); ?>

    <h2 class="m-3 text-center">Dashboard</h2>

    <center>
        <div class="card m-5 border border-2 border-primary" style="width: 50%;">
            <div class="card-body">
                <form action="" method="post">
                    <fieldset>
                        <legend class="he mb-5">Add Students</legend>
                        <div class="mb-3" style="width: 30%;">
                            <input type="text" class="form-control" name="id" autocomplete="off" placeholder="Student ID">
                        </div>
                        <div class="mb-3" style="width: 70%;">
                            <input type="text" class="form-control" name="student_name" autocomplete="off" placeholder="Student Name">
                        </div>

                        <div class="mb-3" style="width: 70%;">
                            <input type="email" class="form-control" name="student_email" autocomplete="off" placeholder="Student Email">
                        </div>


                        <select class="mb-3 form-select form-select-sm" name="gender" aria-label=".form-select-sm example" style="width: 20%;">
                            <option selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="roll_no" placeholder="Roll No" autocomplete="off" style="width: 30%;">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="course" placeholder="Course" autocomplete="off" style="width: 40%;">
                        </div>

                        <div class="m-2 p-1 border border-1" style="width: 50%;">
                            <label for="formFileSm" class="form-label">Upload Photo</label>
                            <input class=form-control form-control-sm" id="formFileSm" type="file">
                        </div>

                        <?php
                        include('init.php');
                        $class_result = mysqli_query($conn, "SELECT `name` FROM `class`");

                        echo '<select class="form-select mb-5 mt-3" aria-label="Default select example" name="class_name" style="width:30%">';
                        echo '<option selected disabled>Select Class</option>';
                        while ($row = mysqli_fetch_array($class_result)) {
                            $display = $row['name'];
                            echo '<option value="' . $display . '">' . $display . '</option>';
                        }
                        echo '</select>'
                        ?>

                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>

<?php

if (isset($_POST['student_name'], $_POST['roll_no'])) {
    $name = $_POST['student_name'];
    $rno = $_POST['roll_no'];
    $email = $_POST['student_email'];
    $id = $_POST['id'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];

    if (!isset($_POST['class_name']))
        $class_name = null;
    else
        $class_name = $_POST['class_name'];

    // validation
    if (empty($name) or empty($email) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i", $rno) or !preg_match("/^[a-zA-Z ]*$/", $name)) {
        if (empty($name))
            echo '<div class="alert alert-danger m-4" role="alert">Please enter name</div>';
        if (empty($class_name))
            echo '<div class="alert alert-danger m-4" role="alert">Please select your class</div>';
        if (empty($course))
            echo '<div class="alert alert-danger m-4" role="alert">Please select any course</div>';
        if (empty($rno))
            echo '<div class="alert alert-danger m-4" role="alert">Please enter your roll number</div>';
        if (preg_match("/[a-z]/i", $rno))
            echo '<div class="alert alert-danger m-4" role="alert">Please enter valid roll number</div>';
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo '<div class="alert alert-danger m-4" role="alert">No numbers or symbols allowed in name</div>';
        }

        exit();
    }

    $sql = "INSERT INTO `students` (`id`,`name`,`email`,`gender`, `rno`,`course` ,`class_name`) VALUES ('$id','$name','$email','$gender', '$rno','$course' ,'$class_name')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo '<div class="alert alert-danger m-5" role="alert">Invalid Details </div>';
    } else {
        echo '<div class="alert alert-success m-5" role="alert">Student Added</div>';
    }
}
?>