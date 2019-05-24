<?php


class JSON implements iWorkData
{
    private $jsonArray;

    public function __construct()
    {
        $this->jsonArray = json_decode(file_get_contents(JSON_FILE), true);
    }

    public function saveData($key, $val)
    {
        // TODO: Implement saveData() method.

        $this->jsonArray[$key] = $val;
        $this->saveFile();
        return true;
    }

    public function getData($key)
    {
        // TODO: Implement getData() method.

        if(isset($this->jsonArray[$key])){
            return $this->jsonArray[$key];
        }
    }

    public function deleteData($key)
    {
        // TODO: Implement deleteData() method.

        if(isset($this->jsonArray[$key])){
            unset($this->jsonArray[$key]);
            $this->saveFile();
            return true;
        }
        return false;
    }

    private function saveFile ()
    {
        if(is_writable(JSON_FILE) && file_put_contents(JSON_FILE, json_encode($this->jsonArray))){
            return true;
        } else {
            return false;
        }
    }

}