<?php
// $realName = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
// $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
// $fileName = $realName ."_". time() . "." . $extension;
// $pathName = __DIR__ . "/../../assets/img" . "/" . $fileName;
// move_uploaded_file($_FILES['image']['tmp_name'], $pathName);
// var_dump($fileName);



require_once('core/functions.php');
require_once('core/validations.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image'];
}
$error = ValidateBlog($title, $content, $image);
if(!empty($error)){
    setMessage('danger', "$error");
    header('location: index.php?page=create-blog');
    exit();
}
if(storeBlog($title, $content, $image)){
    setMessage('success', 'Blog Created Successfully');
    header('Location: index.php?page=blogs');
    exit();
}else{
    setMessage('danger', "Fail Register User");
    header('location: index.php?page=register');
    exit();

}

?>