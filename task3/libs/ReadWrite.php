<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 29.03.2019
 * Time: 0:27
 */

class ReadWrite
{
    public $file;
    private $string;
    private $symbol;

    public function __construct()
    {
        $this->file = file(TEXT_FILE);
    }

    public function getString($numString) {
        return $this->file[$numString-1];
    }

    public function getSymbol($numString, $numSymbol) {
        return $this->file[$numString-1][$numSymbol-1];
    }

    public function setString($numString, $content) {
        $this->file[$numString-1] = $content."\n";
        return true;
    }

    public function setSymbol($numString, $numSymbol, $content) {
        if(strlen($content) == 1) {
            $this->file[$numString-1][$numSymbol-1] = $content;
            return true;
        } else {
            return false;
        }
    }

    public function __destruct() {
        if(is_writable(NEW_TEXT_FILE)){
            if (isset($_SESSION['error'])) unset($_SESSION['error']);
            file_put_contents(NEW_TEXT_FILE, $this->file);
        } else {
          $_SESSION['error'] = "File don't rewrite. Premission genied";
        }
    }
}