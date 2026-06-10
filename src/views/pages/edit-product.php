<h2>Редактирование товара</h2>

<form action="" method="POST">
    <label for="cat">Выберите категорию товара:</label>
    <select name="category" id="cat">
        <option value="electronics">Электроника</option>
        <option value="furniture">Мебель</option>
    </select>
    <br><br>
    <input type="text" name="name" 
    placeholder="Название товара" 
    value="<?php echo htmlspecialchars($name_old ?? ''); ?>"
    required>
    <br><br>
    <input type="number" name="price" 
    placeholder="Цена товара" 
    value="<?php echo htmlspecialchars($price_old ?? ''); ?>"
    required>
    <br><br>
    <textarea name="description" rows="4" cols="50" 
    placeholder="Описание товара" 
    value="<?php echo htmlspecialchars($desc_old ?? ''); ?>"
    required></textarea>
    <br><br>
    <button type="submit">Редактировать товар</button>
</form>
