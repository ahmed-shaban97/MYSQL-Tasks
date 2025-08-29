<!-- stored-data.php -->
<?php
require_once('../database/db_conn.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['title'])) {

    //validation
    if (empty($_POST['title'])) {
        $_SESSION['message'] = "<div class='alert alert-danger'>Empty Task</div>";
        header("Location: ../index.php");
        exit();


    }else{
        $title = trim(htmlspecialchars($_POST['title']));
        $sql = "INSERT INTO tasks (title) VALUES ('$title')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = "<div class='alert alert-success'>Task Created Successfully</div>";
        } else {
            $_SESSION['message'] = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
        }

        header("Location: ../index.php");
        exit();
    }
}
?>