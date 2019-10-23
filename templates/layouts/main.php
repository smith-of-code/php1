<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<? if (!$allow) :?>

    <form action="/auth/login/" method="post">
        <input type='text' name='login' placeholder='Логин'>
        <input type='password' name='pass' placeholder='Пароль'>
        Save? <input type='checkbox' name='save'>
        <input type='submit' name='send'>
    </form>

<? else: ?>
    Добро пожаловать! <?=$user?> <a href="/?logout">Выход</a><br>
<? endif; ?>
<?=$menu?>
<?=$content?>
</body>
</html>