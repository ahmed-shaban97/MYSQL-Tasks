<!-- registerController.php -->

<?php
require_once('core/functions.php');
require_once('core/validations.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
}
$error = ValidateLogin($email, $password);
if(!empty($error)){
    setMessage('danger', "$error");
    header('location: index.php?page=login');
}
if(loginUser($email, $password)){
    setMessage('success', 'Login Successfully');
    header('Location: index.php?page=home');
    exit();
}else{
    setMessage('danger', "Email or password is incorrect");
    header('location: index.php?page=login');
    exit();

}

?>