<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <a href="{{route('home')}}">Домой</a>
    <a href="{{route('profile')}}">Профиль</a>
    Домашняя
    <div id="info"></div>
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
    <script>
        let tg = window.Telegram.WebApp;
        document.getElementById("info").innerHTML = JSON.stringify(tg);
    </script>
</body>
</html>