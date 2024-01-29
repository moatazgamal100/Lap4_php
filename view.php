<?php
include 'dbconection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $link = getDbConnection();

    $stmt = mysqli_prepare($link, "SELECT name, email, gender, subscribe FROM userdata WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $name, $email, $gender, $subscribe);

    mysqli_stmt_fetch($stmt);

    echo "<h2>User Details</h2>";
    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Gender: " . htmlspecialchars($gender) . "<br>";
    echo "Subscribed: " . htmlspecialchars($subscribe) . "<br>";

    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    echo "No user selected";
}
?>
