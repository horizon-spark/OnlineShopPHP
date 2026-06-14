<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h2 class="h4 mb-0">Добавление товара</h2>
                </div>
                
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="cat" class="form-label fw-bold">
                                📂 Выберите категорию товара:
                            </label>
                            <select name="category" id="cat" class="form-select">
                                <option value="electronics" <?php echo (($_POST['category'] ?? '') === 'electronics') ? 'selected' : ''; ?>>
                                    📱 Электроника
                                </option>
                                <option value="furniture" <?php echo (($_POST['category'] ?? '') === 'furniture') ? 'selected' : ''; ?>>
                                    🪑 Мебель
                                </option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">
                                📝 Название товара:
                            </label>
                            <input type="text" 
                                   class="form-control" 
                                   id="name" 
                                   name="name"
                                   placeholder="Введите название товара"
                                   value="<?php echo htmlspecialchars($_POST['name'] ?? '') ?>"
                                   required>
                            <div class="form-text">Например: iPhone 15, Диван угловой и т.д.</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label fw-bold">
                                💰 Цена:
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">₽</span>
                                <input type="number" 
                                       class="form-control" 
                                       id="price" 
                                       name="price"
                                       placeholder="Введите цену"
                                       value="<?php echo htmlspecialchars($_POST['price'] ?? '') ?>"
                                       required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">
                                📄 Описание товара:
                            </label>
                            <textarea class="form-control" 
                                      id="description" 
                                      name="description"
                                      rows="5"
                                      placeholder="Введите подробное описание товара..."
                                      required><?php echo htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                            <div class="form-text">Минимум 10 символов. Опишите основные характеристики товара.</div>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success flex-grow-1">
                                ✅ Добавить товар
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                🔄 Очистить
                            </button>
                            <a href="index.php" class="btn btn-outline-secondary">
                                ↩️ Отмена
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>