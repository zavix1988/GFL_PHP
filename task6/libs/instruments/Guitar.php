<?php


class Guitar implements iInstrument
{
    private $name;
    private $category;

    function __construct($name)
    {
        $this->name = $name;
        $this->category = "guitar";
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCategory()
    {
        return $this->category;
    }
}