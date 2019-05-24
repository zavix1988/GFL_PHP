<?php

class BassGuitarist extends Musician
{
    function __construct($first, $last)
    {
        parent::__construct($first, $last);
        $this->setMusicianType("Bass guitarist");
    }
}