<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Shop_PHP</title>
</head>
<body>
    <header>
        <?php if (isset($_SESSION['user_id'])): ?>
            <?php echo $_SESSION['username'] ?>
            <?php if ($_SESSION['user_id'] === 1): ?>
                <a href="index.php?page=add-product">Добавить товар</a>
            <?php endif; ?>
            <a href="index.php?page=logout">Выйти</a>
        <?php else: ?>
            <a href="index.php?page=login">Войти</a>
            <a href="index.php?page=register">Регистрация</a>
        <?php endif; ?>
        <?php if ($theme === 'light'): ?>
            <a href="index.php?theme=dark">Темная тема</a>
        <?php else: ?>
            <a href="index.php?theme=light">Светлая тема</a>
        <?php endif; ?>
    <header>
    <br>