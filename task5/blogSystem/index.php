<?php
require_once("views/layout/header.php");
require_once("views/layout/nav.php");

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page):
    case 'home':
        include("views/home.php");
        break;
    case 'about':
        include("views/about.php");
        break;
    case 'post':
        include("views/post.php");
        break;
    case 'contact':
        include("views/contact.php");
        break;
    case 'register':
        include("views/auth/register.php");
        break;
    case 'register-controller':
        include("controllers/auth/registerController.php");
        break;
    default:
        require_once("views/maintenance.php");
endswitch;

require_once("views/layout/footer.php");