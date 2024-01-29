<?php
include 'dbconn.php';
$link = getDbConnection(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $subscribe = isset($_POST['subscribe']) ? 'yes' : 'no';

    $stmt = mysqli_prepare($link, "INSERT INTO userdata (name, email, gender, subscribe) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $gender, $subscribe);

    if (mysqli_stmt_execute($stmt)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration Form</title>
    <style>
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>
        <p>Gender:</p>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="checkbox" id="subscribe" name="subscribe" value="yes">
        <label for="subscribe">Receive E-Mails from us.</label><br>
        <input type="submit" value="Submit">
    </form>
    <form action="showdata.php" method="get">
        <button type="submit">Show Data</button>
    </form>
</body>
</html>
