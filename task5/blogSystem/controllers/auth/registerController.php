<!-- registerController.php -->

<?php
require_once('core/functions.php');
require_once('core/validations.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}
$error = ValidateRegister($name, $phone, $email, $password);
if(!empty($error)){
    setMessage('danger', "$error");
    header('location: index.php?page=register');
    exit();
}
if(registerUser($name,$phone, $email, $password)){
    setMessage('success', 'Registered Successfully');
    header('Location: index.php?page=home');
    exit();
}else{
    setMessage('danger', "Fail Register User");
    header('location: index.php?page=register');
    exit();

}

?>