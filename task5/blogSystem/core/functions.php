<?php
session_start();
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
?>