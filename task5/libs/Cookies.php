<?php


class Cookies implements iWorkData
{
    public function saveData($key, $val)
    {
        // TODO: Implement saveData() method.
        setcookie($key, $val, time()+3600);
    }

    public function getData($key)
    {
        // TODO: Implement getData() method.
        if (isset($_COOKIE[$key])){
            return $_COOKIE[$key];
        }
        return false;
    }

    public function deleteData($key)
    {
        // TODO: Implement deleteData() method.
        if (isset($_COOKIE[$key])){
            setcookie($key, '', time()-1);
            return true;
        }
        return false;
    }

}