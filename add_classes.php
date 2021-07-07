<?php
include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link href="./css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <style>
        .heading {
            display: flex;
            float: center;
            font-size: 60px;
            justify-content: center;
        }

        body {
            background-image: url("Images/bg3.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
    <title>Add Class</title>
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
                        <legend>Add Class</legend>
                        <div class="mb-3 mt-4" style="width:40%;">
                            <input type="text" class="form-control" name="class_name" placeholder="Class Name" autocomplete="off">
                        </div>
                        <div class="mb-3" style="width:40%;">
                            <input type="text" class="form-control" name="class_id" placeholder="Class ID" autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </center>
</body>

</html>


<?php
include('init.php');
if (isset($_POST['class_name'], $_POST['class_id'])) {
    $name = $_POST["class_name"];
    $id = $_POST["class_id"];

    // validation
    if (empty($name) or empty($id) or preg_match("/[a-z]/i", $id)) {
        if (empty($name))
            echo '<div class="alert alert-danger m-5" role="alert">Please enter class</div>';

        if (empty($id))
            echo '<div class="alert alert-danger m-5" role="alert">Please enter class id</div>';

        if (preg_match("/[a-z]/i", $id))
            echo '<div class="alert alert-danger m-5" role="alert">Please enter valid class id</div>';

        exit();
    }

    $sql = "INSERT INTO `class` (`name`, `id`) VALUES ('$name', '$id')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo '<div class="alert alert-danger m-5" role="alert">Invalid class name or class id</div>';
    } else {
        echo '<div class="alert alert-success m-5" role="alert">Class Added</div>';
    }
}

?>