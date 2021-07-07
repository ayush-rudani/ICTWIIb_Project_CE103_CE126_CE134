<?php
include('init.php');
if (isset($_POST['class_name'], $_POST['rno'])) {
    $class_name = $_POST['class_name'];
    $rno = $_POST['rno'];
    echo $class_name;
    echo $rno;
    $delete_sql = mysqli_query($conn, "DELETE from `result` where `rno`='$rno' and `class`='$class_name'");
    if (!$delete_sql) {
        echo '<script language="javascript">';
        echo 'alert("Not available")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Deleted")';
        echo '</script>';
    }
} else {
    echo '<div class="alert alert-danger m-4" role="alert">Something Wrong</div>';
}
