<?php
include('init.php');

?>
<?php

session_start();

if (isset($_POST["userid"], $_POST["password"])) {
    $username = $_POST["userid"];
    $password = $_POST["password"];
    $sql = "SELECT userid FROM admin_login WHERE userid='$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        header("Location: dashboard.php");
    } else {
        echo '<script language="javascript">';
        echo 'alert("Invalid Username or Password")';
        echo '</script>';
    }
}

?>


<!doctype html>
<html lang="en">
<style>
    * {
        box-sizing: border-box;
    }

    body {
        box-sizing: border-box;
        width: 100%;
        /* background-image: url("bg3.jpg"); */
        background-image: url("Images/bg3.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;

    }

    .he {
        border: 2px solid grey;
        border-radius: 5px;
    }
</style>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Login</title>
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
                <div class="d-flex justify-content-end"><a href="index.php"><button type="button" class="btn btn-outline-warning float-right m-2">Home</button></a></div>
            </div>
        </div>
    </nav>

    <center>
        <div class="card m-5 border border-2 border-success" style="width: 40%;">
            <div class="card-body">
                <form action="" method="POST" name="login">
                    <fieldset>
                        <legend class="he mb-5">Admin Login </legend>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="text" class="form-control" name="userid" autocomplete="off" placeholder="Email">

                        </div>
                        <div class="mb-5">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-outline-success">Login</button>
                    </fieldset>
                </form>
            </div>
        </div>

        <div class="card m-5 border border-2 border-primary" style="width: 40%;">
            <div class="card-body">
                <form action="./profile.php" method="GET">
                    <fieldset>
                        <legend class="he mb-5">Student Login</legend>

                        <?php
                        $class_result = mysqli_query($conn, "SELECT `name` FROM `class`");

                        echo '<select class="form-select" aria-label="Default select example" name="class">';
                        echo '<option selected>Select Class</option>';

                        while ($row = mysqli_fetch_array($class_result)) {
                            $display = $row['name'];
                            echo '<option value="' . $display . '">' . $display . '</option>';
                        }
                        echo '</select>';
                        ?>

                        <div class="m-3 ">
                            <input type="text" class="form-control" name="id" autocomplete="off" placeholder="Sudent ID" style="width: 30%;">
                        </div>

                        <div class="m-3">
                            <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Student Email">
                        </div>

                        <div class="m-3 ">
                            <input type="text" class="form-control" name="rn" autocomplete="off" placeholder="Roll No" style="width: 30%;">
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</body>

</html>