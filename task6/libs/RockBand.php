<?php


class RockBand implements iBand
{
    private $bandName;
    private $bandGenre;
    private $musicians;

    function __construct($bandName)
    {
        $this->bandName = $bandName;
        $this->musicians = array();
        $this->bandGenre = "rock";
    }

    public function getName()
    {
        return $this->bandName;
    }

    public function getGenre()
    {
        return $this->bandGenre;
    }

    public function addMusician(iMusician $musician)
    {
        array_push($this->musicians, $musician);
        $musician->assignToBand($this);
    }

    public function getMusician()
    {
        return $this->musicians;
    }
}