<?php
include 'dbconection.php';

$link = getDbConnection();

$sql = "SELECT * FROM userdata";
$result = mysqli_query($link, $sql);

echo "<table>";
echo "<tr><th>Name</th><th>Email</th><th>Gender</th><th>Mail Status</th><th>Action</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['gender'] . "</td>";
    echo "<td>" . $row['subscribe'] . "</td>";
    echo "<td><a href='view.php?id=" . $row['id'] . "'>View</a> | <a href='update.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($link);
?>

<html>
    <head>
        <title>Show Data</title>
    </head>
    <body>    
        <form action="index.php" method="get">
            <button type="submit">Add User</button>
        </form>
    </body>
</html>
