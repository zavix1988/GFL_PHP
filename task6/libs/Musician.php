<?php


class Musician implements iMusician
{
    private $last;
    private $first;
    private $musicianType;
    private $instruments;
    private $bandReference;

    function __construct($first, $last)
    {
        $this->last = $last;
        $this->first = $first;
        $this->instruments = array();
        $this->musicianType = "type";
    }

    public function getName()
    {
        return $this->first . " " . $this->last;
    }

    public function addInstrument(iInstrument $instrument)
    {
        array_push($this->instruments, $instrument);
    }

    public function getInstrument()
    {
        return $this->instruments;
    }

    public function getBand()
    {
        return $this->bandReference;
    }

    public function assignToBand(iBand $band)
    {
        $this->bandReference = $band;
    }

    public function getMusicianType()
    {
        return $this->musicianType;
    }

    public function setMusicianType($musicianType)
    {
        $this->musicianType = $musicianType;
    }
}