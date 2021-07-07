<?php
include("session.php");
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
    <title>Delete Record</title>
</head>

<body>
    <?php include('_header.html'); ?>

    <center>
        <?php
        if (isset($_POST['id']) && !empty(trim($_POST['id']))) {
            include('init.php');
            $id = $_POST['id'];

            $db = mysqli_select_db($conn, 'srms');
            $sql = "DELETE FROM students WHERE id=$id";

            // if ($result = mysqli_query($conn, $sql)) {
            //     $param_id = trim($_POST["id"]);
            //     mysqli_stmt_bind_param($stmt, "i", $param_id);
            //     // if () {
            //         header("location: ");
            //         exit();
            //     } else {
            //         // echo "Oops! Something went wrong. Please try again later.";
            //         echo '<div class="alert alert-danger m-5" role="alert">Oops! Something went wrong. </div>';
            //     }
            // }
        }
        ?>
    </center>


    <div class="card-deck">
        <center>
            <h1><span class="badge bg-dark m-4 fs-2"><em>Delete Record</em></span></h1>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <input type="hidden" name="id" value="<?= trim($_GET["id"]) ?>">
                    <p class="fs-3 border border-3 border-danger p-2" style="color: black; width: 60%">Are you sure you want to delete this student record?</p><br>
                    <p>
                        <input class="btn btn-danger mx-3" type="submit" value="Yes">
                        <a href="<?php $cn = $_GET['cn'];
                                    echo "student_list.php?cn=" . $cn ?>"><button type="button" class="mx-3 btn btn-primary">No</button></a>
                    </p>
                </div>
            </form>
        </center>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>