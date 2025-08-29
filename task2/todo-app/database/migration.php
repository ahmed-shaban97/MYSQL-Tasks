<?php

require_once('db_conn.php');

// $sql = "DROP DATABASE todoapp";
$sql = "CREATE DATABASE IF NOT EXISTS todoapp";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
echo "database created successfully <br>";
mysqli_close($conn);


//Create tables

$conn = mysqli_connect('localhost', 'root', '', 'todoapp');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS tasks(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL
)";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
echo "table created successfully";
mysqli_close($conn);


?>