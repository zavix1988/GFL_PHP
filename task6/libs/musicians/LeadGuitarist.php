<?php


class LeadGuitarist extends Musician
{
    function __construct($first, $last)
    {
        parent::__construct($first, $last);
        $this->setMusicianType("lead guitarist");
    }
}