<?php


class Ini implements iWorkData
{

    private $iniArray;

    public function __construct()
    {
        $this->iniArray = parse_ini_file(INI_FILE);
    }

    public function saveData($key, $val)
    {
        // TODO: Implement saveData() method.

        $this->iniArray[$key] = $val;
        $this->saveFile();
        return true;
    }

    public function getData($key)
    {
        // TODO: Implement getData() method.

        if(isset($this->iniArray[$key])){
            return $this->iniArray[$key];
        }
    }

    public function deleteData($key)
    {
        // TODO: Implement deleteData() method.

        if(isset($this->iniArray[$key])){
            unset($this->iniArray[$key]);
            $this->saveFile();
            return true;
        }
        return false;
    }




    public function saveFile()
    {
        $out = '';


        if(is_writable(INI_FILE)){
            foreach($this->iniArray as $key => $value){
                if (is_array($this->iniArray[$key])){
                    foreach($this->iniArray[$key] as $subKey => $subVal) {
                        if (is_string($subKey)){
                            $out .= $key. '[' . $subKey . '] = "' . $subVal . '"' . PHP_EOL;
                        }else{
                            $out .= $key. '[] = "' . $subVal . '"' . PHP_EOL;
                        }
                    }
                }else{
                    if(!is_numeric($value)){
                        $value = '"' . $value . '"';
                    }
                    $out .= "$key = $value" . PHP_EOL;
                }
            }
            file_put_contents(INI_FILE, $out);
            return true;
        } else {
            return false;
        }
    }

}
