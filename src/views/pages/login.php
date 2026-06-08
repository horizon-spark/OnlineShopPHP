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
    <button type="submit">Войти</button>
</form>