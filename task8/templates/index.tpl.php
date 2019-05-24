<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <title>Task 8</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="h1">
            <h1>Task 8</h1>
        </div>
        <div class="form container">
            <form method="get" action="<?=$_SERVER['PHP_SELF']?>">
                <div class="form-group">
                    <label for="request">Введите ваш запрос</label>
                    <input type="text" class="form-control" id="request" name="request" placeholder="введите запрос">
                </div>
                <button type="submit" class="btn btn-primary">Поиск</button>
            </form>
        </div>
    </div>
    <div class="row">
        <?php if($content):?>
            <?php foreach($content as $item):?>
                    <h3><?=$item['header']?></h3>
                    <div class="alert alert-success" role="alert">
                         <a href="<?=$item['link']?>" class="alert-link"><?=$item['link']?></a>
                    </div>
                    <p><?=$item['text']?></p>
            <?php endforeach?>
        <?php endif?>
    </div>
</div>
</body>
</html>