<!-- functions.php -->
<?php
session_start();
require_once('config/db_conn.php');

function setMessage($type, $message){
    $_SESSION['message'] = [
        'type' => $type,
        'message' => $message
    ];
}

function showMessage(){
    if(isset($_SESSION['message'])){
        $type = $_SESSION['message']['type'];
        $message = $_SESSION['message']['message'];
        echo "<div class = 'alert alert-$type'> $message </div>";
        session_unset();
    }
}
function registerUser($name, $phone, $email, $password){
    $conn = $GLOBALS['conn'];
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(`name`, `phone`, `email` ,`password`) VALUES('$name', '$phone', '$email', '$hashed_pass')";
    
    try {
        $res = mysqli_query($conn, $sql);
        if ($res){
            $_SESSION['user'] = [
                'name' => $name,
                'email' => $email
            ];
            return TRUE;
        }if (!$res) {
    return FALSE;
}

    } catch (\Throwable $th) {
        return FALSE;
    }
    
}
function loginUser($email, $password){
    $conn = $GLOBALS['conn'];
    $sql = "SELECT * FROM users WHERE `email` = '$email' ";
    try {
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)==0){
            return false;
        }
        $user = mysqli_fetch_assoc($res);
        
        if(password_verify($password, trim($user['password']))){
                $_SESSION['user'] = [
                'name' => $user['name'],
                'email' => $user['email']
            ];
            return true;
        }
        return false;
} catch (\Throwable $th) {
        return false;
    }
    
}


?>