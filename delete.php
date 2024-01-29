<?php
include 'dbconection.php';

$link = getDbConnection();
$id = $_GET['id'];

if ($stmt = mysqli_prepare($link, "DELETE FROM userdata WHERE id=?")) {
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: showdata.php'); 
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
}
mysqli_close($link);
?>
