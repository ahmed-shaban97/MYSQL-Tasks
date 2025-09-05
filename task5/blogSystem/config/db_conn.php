<?php
try {
    $conn = mysqli_connect('localhost', 'root', '', 'blog');
    if(!$conn){
        header("location: ../views/layout/maintenance.php");
    }
} catch (\Throwable $th) {
        header("location: ../views/layout/maintenance.php");
}
?>