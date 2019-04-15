<?php

class Helper {

    public static function redirect($redirect_url = '/')
    {
        header('HTTP/1.1 200 OK');
        header('Location: http://'.$_SERVER['HTTP_HOST'].$redirect_url);
        exit();
    }

    // Вместо числового статуса категории, отображаем определенную строку
    public static function getStatusText($status)
    {
        switch ($status) {
        case '1':
            return 'Отображается';
            break;
        case '0':
            return 'Скрыта';
            break;
        }
    }


    /**
     * 
     *Запись пользователя в сессию
     *
     * @param $userId
     */
    
    public static function auth($userId)
    {
        Session::set('userId', $userId);
        Session::set('logged', true);
    }

}
