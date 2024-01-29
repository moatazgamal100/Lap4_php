<?php
function getDbConnection() {
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'day4';

    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$link) {
        die('Could not connect');
    }
    return $link;
}
?>

