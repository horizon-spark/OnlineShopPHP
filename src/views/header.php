<header>
    <?php if (isset($_SESSION['user_id'])): ?>
        <?php echo $_SESSION['username'] ?>
        <a href="index.php?page=logout">Выйти</a>
    <?php else: ?>
        <a href="index.php?page=login">Войти</a>
        <a href="index.php?page=register">Регистрация</a>
    <?php endif; ?>
<header>
<br>