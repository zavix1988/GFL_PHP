<?php

include 'libs/interfaces/iInstrument.php';
include 'libs/interfaces/iMusician.php';
include 'libs/interfaces/iBand.php';

include 'libs/instruments/Guitar.php';
include 'libs/instruments/Drums.php';
include 'libs/instruments/Microphone.php';

include 'libs/Musician.php';
include 'libs/musicians/Guitarist.php';
include 'libs/musicians/LeadGuitarist.php';
include 'libs/musicians/BassGuitarist.php';
include 'libs/musicians/Drummer.php';
include 'libs/musicians/Vocalist.php';

include 'libs/RockBand.php';




// Test Objects
$band = new RockBand('The Aria');
$guitarist1 = new Guitarist('Vladimir', 'Holstinin');
$guitarist2 = new LeadGuitarist('Sergey', 'Popov');
$bassGuitarist = new BassGuitarist('Vitaly', 'Dubinin');
$drummer = new Drummer('Maxim', 'Udalov');
$vocalist = new Vocalist('Misha', 'Pioner');
$guitarist1->addInstrument(new Guitar('Gibson Les Paul'));
$guitarist1->addInstrument(new Guitar('Fender Stratocaster'));
$guitarist2->addInstrument(new Guitar('ESP M-1000'));
$guitarist2->addInstrument(new Guitar('Ibanez RG-270DX'));
$bassGuitarist->addInstrument(new Guitar('Fender Presicion'));
$drummer->addInstrument(new Drums('Tama Superstar Hyper-Drive Duo Drum Kits'));
$vocalist->addInstrument(new Microphone('Shure Super 55 Deluxe'));
$vocalist->addInstrument(new Microphone('Audio-Technica AT2020 USB+'));

$band->addMusician($guitarist1);
$band->addMusician($guitarist2);
$band->addMusician($bassGuitarist);
$band->addMusician($drummer);
$band->addMusician($vocalist);


include 'templates/index.tpl.php';