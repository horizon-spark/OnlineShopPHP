<?php 
$name_old = htmlspecialchars($name_old ?? '');
$price_old = htmlspecialchars($price_old ?? 0);
$desc_old = htmlspecialchars($desc_old ?? '');
$current_category = $current_category ?? 'electronics';
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">✏️ Редактирование товара</h3>
                </div>
                
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="cat" class="form-label">Категория</label>
                            <select name="category" id="cat" class="form-select">
                                <option value="electronics" <?php echo ($current_category === 'electronics') ? 'selected' : ''; ?>>
                                    📱 Электроника
                                </option>
                                <option value="furniture" <?php echo ($current_category === 'furniture') ? 'selected' : ''; ?>>
                                    🪑 Мебель
                                </option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Название</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="name" 
                                   name="name"
                                   value="<?php echo $name_old; ?>"
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Цена (₽)</label>
                            <input type="number" 
                                   class="form-control" 
                                   id="price" 
                                   name="price"
                                   value="<?php echo $price_old; ?>"
                                   step="0.01"
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea class="form-control" 
                                      id="description" 
                                      name="description"
                                      rows="4"
                                      required><?php echo $desc_old; ?></textarea>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <a href="index.php?page=index" class="btn btn-secondary">Отмена</a>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>