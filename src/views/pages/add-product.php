<form action="" method="POST">
    <label for="cat">Выберите категорию товара:</label>
    <select name="category" id="cat">
        <option value="electronics">Электроника</option>
        <option value="furnuture">Мебель</option>
    </select>
    <input type="text" name="category"
        placeholder="Категория"
        value="<?php echo htmlspecialchars($_POST['category'] ?? '') ?>"
        required>
    <input type="text" name="name"
    placeholder="Название"
    value="<?php echo htmlspecialchars($_POST['name'] ?? '') ?>"
    required>
    <input type="number" name="price"
    placeholder="Цена"
    required>
    <textarea name="description"
    rows="5"
    columns="40"
    placeholder="Описание"
    required></textarea>
    <button type="submit">Войти</button>
</form>