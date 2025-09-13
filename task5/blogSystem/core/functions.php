<!-- functions.php -->
<?php
require_once('config/db_conn.php');

function setMessage($type, $message)
{
    $_SESSION['message'] = [
        'type' => $type,
        'message' => $message
    ];
}

function showMessage()
{
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $message = $_SESSION['message']['message'];
        echo "<div class = 'alert alert-$type'> $message </div>";
        unset($_SESSION['message']);
    }
}
function registerUser($name, $phone, $email, $password)
{
    $conn = $GLOBALS['conn'];
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(`name`, `phone`, `email` ,`password`) VALUES('$name', '$phone', '$email', '$hashed_pass')";

    try {
        $res = mysqli_query($conn, $sql);
        if ($res) {
            $user_id = mysqli_insert_id($conn);
            $_SESSION['user'] = [
                'id' => $user_id,
                'name' => $name,
                'email' => $email
            ];
            return TRUE;
        }
        if (!$res) {
            return FALSE;
        }
    } catch (\Throwable $th) {
        return FALSE;
    }
}
function loginUser($email, $password)
{
    $conn = $GLOBALS['conn'];
    $sql = "SELECT * FROM users WHERE `email` = '$email' ";
    try {
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) == 0) {
            return false;
        }
        $user = mysqli_fetch_assoc($res);

        if (password_verify($password, trim($user['password']))) {
            $_SESSION['user'] = [
                'id' => $user['id'],
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

function storeBlog($title, $content, $image)
{
    $conn = $GLOBALS['conn'];
    $realName = pathinfo($image['name'], PATHINFO_FILENAME);
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $fileName = $realName . "_" . time() . "." . $extension;
    $pathName =__DIR__ . "/../assets/img/" . $fileName;
    if (!move_uploaded_file($image['tmp_name'], $pathName)) {
        die("Fail To Upload Image");
    }
    $path = "/assets/img/" . $fileName;
    $user_id = $_SESSION['user']['id'];
$sql = "INSERT INTO `posts`(`title`, `content`, `image`, `created_at`, `user_id`) 
        VALUES ('$title', '$content', '$path', NOW(), '$user_id')";

    $res = mysqli_query($conn, $sql);
    if($res){
        return true;
    }else{
        return false;
    }
    
}

function getBlog(){
    $conn = $GLOBALS['conn'];
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM `posts` WHERE `user_id` = '$user_id ' ";
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);

}

?>