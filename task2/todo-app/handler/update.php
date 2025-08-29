<?php
session_start();
require_once("../database/db_conn.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $new_title = $_POST['title'];
    $id = $_POST['id'];
    $sql = "UPDATE tasks SET title = '$new_title' WHERE id = '$id'";
    mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) == 1){
        $_SESSION['message'] = "<div class='alert alert-success'>Task Updated</div>";
    }
    if(mysqli_affected_rows($conn) == 0){
        $_SESSION['message'] = "<div class='alert alert-info'>NO Change</div>";
    }
    header("Location: ../index.php");
    exit;


}
?>