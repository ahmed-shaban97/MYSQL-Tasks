<?php
session_start();
require_once('../database/db_conn.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = '$id' ";
    $result = mysqli_fetch_row(mysqli_query($conn, $sql));
    if(!$result){
        $_SESSION['message'] = "<div class='alert alert-danger'>Data not exists</div>";
        header("Location: ../index.php");
        exit();
    }

    $sql = "DELETE FROM tasks WHERE id = '$id' ";
    mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) == 1){
        $_SESSION['message'] = "<div class='alert alert-success'>Task Deleted Successfully</div>";
        header("Location: ../index.php");
        exit();
    }
    
}
?>