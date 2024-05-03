<?php include ("db.php");?>

<?php

if(isset($_GET['id'])) {
    $id = $_GET['id'];


    $query = "delete from `books` where id = '$id'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("QUERY FAILED". mysqli_error($con));
    }
    else {
        header('location:index.php?delete_msg=Book deleted successfully');
    }

}
    ?>