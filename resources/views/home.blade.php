<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница клиента</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<div class="container mt-4">
    <h1>Добавление ссылок</h1>
    <div class="row">
        <div class="form-group">
            <label for="exampleInputEmail1">Введите адрес ссылки</label>
            <input type="text" class="form-control website" name="website" id="website" aria-describedby="textHelp" placeholder="Адрес ссылки">
            <small class="form-text text-muted textHelp">
            </small>
        </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary mt-4 websubmit">Добавить</button>
            </div>
        <div class="tableInput mt-4">
            @foreach ($urls as $url)
                <a target="_blank" href="{{ $url->link }}" class="text-success mt-4">{{ $url->linkShort }}</a><br>
            @endforeach
        </div>
    </div>
</div>
<script>
    $(".websubmit").click(function() {
        $.ajax({
            url: '/save?name=' + $(".website").val(),
            success: function(mes){
                if($.parseJSON(mes).success == true){
                    $(".tableInput").prepend('<a target="_blank" href="'+ $.parseJSON(mes).url +'" class="text-success mt-4">'+ $.parseJSON(mes).link +'</a><br>');
                    $(".textHelp").text('');
                } else {
                    $(".textHelp").text('Данные не прошли валидацию.');
                }
            }
        });
    });
</script>
</body>
</html>
