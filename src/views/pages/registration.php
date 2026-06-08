<form action="" method="POST">
    <input type="text" name="username"
        placeholder="Имя пользователя"
        value="<?php echo htmlspecialchars($_POST['username'] ?? '') ?>"
        required>
    <input type="email" name="email"
    placeholder="Email"
    value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>"
    required>
    <input type="password" name="password"
    placeholder="Пароль пользователя"
    required>
    <input type="password" name="password_confirm"
    placeholder="Повторите пароль"
    required>
    <button type="submit">Зарегистрироваться</button>
</form>
