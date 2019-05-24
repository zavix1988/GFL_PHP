<?php


class Sessions implements iWorkData
{

    /**
     * Sessions constructor.
     */
    public function __construct()
    {
        session_start();
    }

    public function saveData($key, $val)
    {
        // TODO: Implement saveData() method.
        $_SESSION[$key] = $val;
        return true;
    }

    public function getData($key)
    {
        // TODO: Implement getData() method.
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return false;
    }

    public function deleteData($key)
    {
        // TODO: Implement deleteData() method.
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

}