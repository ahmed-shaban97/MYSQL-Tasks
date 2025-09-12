<!-- validation -->
<?php
function validateRequire($field, $value)
{
return empty($value)? ucfirst($field) . " is required": NULL;
}
function validateEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid Email";
    }
    return NULL;
}
function validatePassword($password)
{
    if (strlen($password) < 6) {
        return "Password Must Be Greater Than 6 Characters";
    }
    if (!preg_match("/[a-z]/", $password)) {
        return "password must contain Lower Case";
    }
    if (!preg_match("/[A-Z]/", $password)) {
        return "password must contain Upper Case";
    }
    if (!preg_match("/[0-9]/", $password)) {
        return "password must contain Numbers";
    }
    return NULL;
}
function ValidateRegister($name, $phone, $email, $password)
{
    
    $fields = [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'password' => $password
    ];
    foreach ($fields as $field => $value) {
        if ($error = validateRequire($field, $value)) {
            return $error;
        }
    }
    if($error = validateEmail($email)){
        return $error;
    };
    if($error = validatePassword($password)){
        return $error;
    };
    return NULL;
    

}
function ValidateLogin($email, $password)
{
    
    $fields = [
        'email' => $email,
        'password' => $password
    ];
    foreach ($fields as $field => $value) {
        if ($error = validateRequire($field, $value)) {
            return $error;
        }
    }
    if($error = validateEmail($email)){
        return $error;
    };
    return NULL;
    

}
function ValidateBlog($title, $content, $image){
        $fields = [
        'title' => $title,
        'content' => $content,
        'image' => $image
    ];
    foreach ($fields as $field => $value) {
        if ($error = validateRequire($field, $value)) {
            return $error;
        }
    }
}