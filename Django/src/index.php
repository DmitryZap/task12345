<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>SQL injection challenge &bull; Level 1</title>
    <link href="main.css" rel="stylesheet" />
</head>
<body>
<div class="info">
    <b>Таблица</b>: users<br>
    <b>Поля</b>: id, login, pass
</div>

<div class="query">
    <div>
        Введите запрос к базе данных:
    </div>
    <form method="POST" action="index.php">
        <input type='text' name='text' value="" />
        <input type="submit">
    </form>
</div>

<div class="table">

<div class="answer">
    <div>
        <b>Ура, я знаю ответ</b> (пароль пользователя с id=1):
    </div>
    <form action="/src/answer.php.php">
        <input type="hidden" name='level' value='1'>
        <input type="text" name='pass' value=''>
        <button>Сдать</button>
    </form>
</div>

</body>
</html>


<?php
$query = $_POST['text'];

$host = 'localhost'; // адрес сервера
$database = 'users'; // имя базы данных
$user = 'dima'; // имя пользователя
$password = '123'; // пароль



$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

$result = mysqli_query($link, $query);




while($user = mysqli_fetch_assoc($result)) {
    echo "ID: ".$user['id']."<br>\n";
    echo "Логин: ".$user['login']."<br>\n";
    echo "Пароль: ". $user['pass']."<br><hr>\n";
}
mysqli_close($link);
?>
