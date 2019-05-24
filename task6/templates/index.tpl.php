<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task6</title>
</head>
<body>
    <h1>Task 6 </h1>
    <div class="band">
        <?php foreach($band->getMusician() as $musician):?>
        <div class="musician" style="border: 1px solid black; width: 30%; margin-top: 10px;">
            <p>Musician <?=$musician->getName()?></p>
            <p>type: <?=$musician->getMusicianType()?></p>
            <p>band: <?=$musician->getBand()->getGenre()?> band <?=$musician->getBand()->getName()?></p>
            <?php foreach($musician->getInstrument() as $instrument):?>
                <p>And plays on <?=$instrument->getName()?> <?=$instrument->getCategory()?></p>
            <?php endforeach;?>
        </div>
        <?php endforeach;?>
    </div>
</body>
</html>
