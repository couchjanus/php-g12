<?php

function getURI()
{
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}

// получаем строку запроса
switch (getURI()) {
    case '':
        # code...
        require_once CONTROLLERS.'HomeController.php';
        break;
    case 'about':
        # code...
        require_once CONTROLLERS.'AboutController.php';
        break;
    case 'guest':
        # code...
        require_once CONTROLLERS.'GuestbookController.php';
        break;
    case 'contact':
        # code...
        require_once CONTROLLERS.'ContactController.php';
        break;
    
    default:
        # code...
        require_once VIEWS.'errors/404.php';
}