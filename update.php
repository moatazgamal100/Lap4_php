<?php
include 'dbconection.php';

$link = getDbConnection();
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $subscribe = isset($_POST['subscribe']) ? 'yes' : 'no';

    $stmt = mysqli_prepare($link, "UPDATE userdata SET name=?, email=?, gender=?, subscribe=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, 'ssssi', $name, $email, $gender, $subscribe, $id);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: showdata.php'); 
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
} else {
    $result = mysqli_query($link, "SELECT * FROM userdata WHERE id = $id");
    $userData = mysqli_fetch_assoc($result);
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User Data</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $userData['name']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $userData['email']; ?>"><br>
        <p>Gender:</p>
        <input type="radio" id="male" name="gender" value="male" <?php echo $userData['gender'] == 'male' ? 'checked' : ''; ?>>
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female" <?php echo $userData['gender'] == 'female' ? 'checked' : ''; ?>>
        <label for="female">Female</label><br>
        <input type="checkbox" id="subscribe" name="subscribe" value="yes" <?php echo $userData['subscribe'] == 'yes' ? 'checked' : ''; ?>>
        <label for="subscribe">Receive E-Mails from us.</label><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
