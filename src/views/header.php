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
<header>
<br>