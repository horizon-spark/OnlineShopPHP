<?php 
// Защита от XSS
$name_to_delete = htmlspecialchars($name_to_delete);
$price_to_delete = htmlspecialchars($price_to_delete);
$desc_to_delete = htmlspecialchars($desc_to_delete);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-danger text-white text-center">
                    <h3 class="mb-0">⚠️ Удаление товара</h3>
                </div>
                
                <div class="card-body text-center">
                    <!-- Информация о товаре -->
                    <div class="alert alert-secondary">
                        <strong>📦 Товар для удаления:</strong><br>
                        <span class="fs-5"><?php echo $name_to_delete; ?></span><br>
                        <span class="badge bg-success mt-2">Цена: <?php echo $price_to_delete; ?> ₽</span>
                    </div>
                    
                    <div class="alert alert-warning">
                        <strong>❗ Вы действительно хотите удалить этот товар?</strong>
                    </div>
                    
                    <!-- Форма -->
                    <form method="post" action="">
                        <input type="hidden" name="confirm_delete" value="1">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Удалить товар «<?php echo $name_to_delete; ?>»?')">
                                🗑️ Да, удалить товар
                            </button>
                            <a href="index.php?page=index" class="btn btn-secondary">
                                ↩️ Нет, вернуться назад
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>