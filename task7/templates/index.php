<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>%TITLE%</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Form</h1>
        </div>
        <div class="col-md-8">
            <div>%MESSTATUS%</div>
            <form method="POST">
                <div class="form-group">
                    <label %NAMEERROR% for="Name">%NAMELABEL%</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="%NAMEVALUE%">
                </div>
                <div class="form-group">
                    <label %EMAILERROR% for="email">%EMAILLABEL%</label>
                    <input type="text" class="form-control" id="email" name="email"  placeholder="Email" value="%EMAILVALUE%">
                </div>
                <div class="form-group">
                    <label for="subject">Тема письма</label>
                    <select class="form-control" id="subject" name="subject">
                        <option %OPT1% disabled>Выберите тему</option>
                        <option value="opt2" %OPT2%>Пожелания</option>
                        <option value="opt3" %OPT3%>Предложения</option>
                        <option value="opt4" %OPT4%>Жалоба</option>
                    </select>
                </div>
                <div class="form-group">
                    <label %TEXTERROR% for="message">%TEXTLABEL%</label>
                    <textarea class="form-control" id="message" name="message" rows="5">%TEXTVALUE%</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>