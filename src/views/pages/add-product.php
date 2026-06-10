<h2>Добавление товара</h2>

<form action="" method="POST">
    <label for="cat">Выберите категорию товара:</label>
    <select name="category" id="cat">
        <option value="electronics">Электроника</option>
        <option value="furniture">Мебель</option>
    </select>
    <br><br>
    <input type="text" name="name"
    placeholder="Название"
    value="<?php echo htmlspecialchars($_POST['name'] ?? '') ?>"
    required>
    <br><br>
    <input type="number" name="price"
    placeholder="Цена"
    value="<?php echo htmlspecialchars($_POST['price'] ?? '') ?>"
    required>
    <br><br>
    <textarea name="description"
    rows="5"
    columns="40"
    placeholder="Описание"
    value="<?php echo htmlspecialchars($_POST['decription'] ?? '') ?>"
    required></textarea>
    <br><br>
    <button type="submit">Добавить товар</button>
</form>