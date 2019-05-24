<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Task 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <h1>Task 4</h1>
    <h2>MySQL</h2>
    
    <h3>Insert Запрос</h3>
    <table>
        <tr>
            <th>Поле</th>
            <th>Значение</th>
        </tr>
        <?php foreach ($myValues as $value):?>
            <tr>
            <?php foreach ($value as $key => $oneValue):?>
                <td><?=$key?></td><td><?=$oneValue?></td>
            <?php endforeach?>
            </tr>
        <?php endforeach?>
    </table>
    <?if($myInsert):?>
        <p>Запрос выполнен</p>
    <?else:?>
        <p>Запрос не выполнен</p>
    <?endif?>
    <p>Текст запроса</p>
    <p><?=$insertMyQuery?></p>

    <h3>Select запрос</h3>
    <p>Поля для запроса:
    <?php foreach($mySelectFields as $field):?>
        <?=$field?>
    <?php endforeach?>
    </p>
    <p>Условия для запроса:
    <?php foreach($mySelectConditions as $condition):?>
        <?=$condition?>
    <?php endforeach?> 
    </p>
    <?if(!$mySelect):?>
        <p>Запрос не выполнен</p>
    <?else:?>
    <table>
        <tr>
        <?php foreach($mySelectFields as $field):?>
            <th><?=$field?></th>
        <?php endforeach?>
        </tr>
        <?php foreach ($mySelect as $rows):?>
            <tr>
            <?php foreach ($rows as $row ):?>
                <td><?=$row?></td>
            <?php endforeach?>
            </tr>
        <?php endforeach?>
    </table>
    <?endif?>
    <p>Текст запроса</p>
    <p><?=$selectMyQuery?></p>
    <h3>Update Запрос</h3>
    <table>
        <tr>
            <th>Поле</th>
            <th>Значение</th>
        </tr>
        <?php foreach ($myUpdateValues as $value):?>
            <tr>
            <?php foreach ($value as $key => $oneValue):?>
                <td><?=$key?></td><td><?=$oneValue?></td>
            <?php endforeach?>
            </tr>
        <?php endforeach?>
    </table>
    <p>Условия для запроса:
    <?php foreach($myUpdateConditions as $condition):?>
        <?=$condition?>
    <?php endforeach?> 
    <?if($myUpdate):?>
        <p>Запрос выполнен</p>
    <?else:?>
        <p>Запрос не выполнен</p>
    <?endif?>
    <p>Текст запроса</p>
    <p><?=$updateMyQuery?></p>
    <h3>Delete Запрос</h3>
    <p>Условия для запроса:
    <?php foreach($myDeleteConditions as $condition):?>
        <?=$condition?>
    <?php endforeach?> 
    <?if($myDelete):?>
        <p>Запрос выполнен</p>
    <?else:?>
        <p>Запрос не выполнен</p>
    <?endif?>
    <p>Текст запроса</p>
    <p><?=$deleteMyQuery?></p>
    

    <h2>PostgreSQL</h2>

    <h3>Insert Запрос</h3>
    <table>
        <tr>
            <th>Поле</th>
            <th>Значение</th>
        </tr>
        <?php foreach ($pgValues as $value):?>
            <tr>
            <?php foreach ($value as $key => $oneValue):?>
                <td><?=$key?></td><td><?=$oneValue?></td>
            <?php endforeach?>
            </tr>
        <?php endforeach?>
    </table>
    <?if($pgInsert):?>
        <p>Запрос выполнен</p>
    <?else:?>
        <p>Запрос не выполнен</p>
    <?endif?>
    <p>Текст запроса</p>
    <p><?=$insertPgQuery?></p>
    
    <h3>Select запрос</h3>
    <p>Поля для запроса:
    <?php foreach($pgSelectFields as $field):?>
        <?=$field?>
    <?php endforeach?>
    </p>
    <p>Условия для запроса:
    <?php foreach($pgSelectConditions as $condition):?>
        <?=$condition?>
    <?php endforeach?> 
    </p>
    <?if(!$pgSelect):?>
        <p>Запрос не выполнен</p>
    <?else:?>
    <table>
        <tr>
        <?php foreach($pgSelectFields as $field):?>
            <th><?=$field?></th>
        <?php endforeach?>
        </tr>
        <?php foreach ($pgSelect as $rows):?>
            <tr>
            <?php foreach ($rows as $row ):?>
                <td><?=$row?></td>
            <?php endforeach?>
            </tr>
        <?php endforeach?>
    </table>
    <?endif?>
    <p>Текст запроса</p>
    <p><?=$selectPgQuery?></p>
    <h3>Update Запрос</h3>
    <table>
        <tr>
            <th>Поле</th>
            <th>Значение</th>
        </tr>
        <?php foreach ($pgUpdateValues as $value):?>
            <tr>
            <?php foreach ($value as $key => $oneValue):?>
                <td><?=$key?></td><td><?=$oneValue?></td>
            <?php endforeach?>
            </tr>
        <?php endforeach?>
    </table>
    <p>Условия для запроса:
    <?php foreach($pgUpdateConditions as $condition):?>
        <?=$condition?>
    <?php endforeach?> 
    <?if($pgUpdate):?>
        <p>Запрос выполнен</p>
    <?else:?>
        <p>Запрос не выполнен</p>
    <?endif?>
    <p>Текст запроса</p>
    <p><?=$updatePgQuery?></p>
    <h3>Delete Запрос</h3>
    <p>Условия для запроса:
    <?php foreach($pgDeleteConditions as $condition):?>
        <?=$condition?>
    <?php endforeach?> 
    <?if($pgDelete):?>
        <p>Запрос выполнен</p>
    <?else:?>
        <p>Запрос не выполнен</p>
    <?endif?>
    <p>Текст запроса</p>
    <p><?=$deletePgQuery?></p>
</body>
</html>