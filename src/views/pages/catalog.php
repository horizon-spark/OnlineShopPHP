<?php 
if (count($products) == 0) {
    echo '<div class="container mt-5">
            <div class="alert alert-warning text-center" role="alert">
                <h4 class="alert-heading">📦 Товары временно отсутствуют</h4>
                <p>Загляните позже, мы обязательно пополним ассортимент!</p>';
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === 1) {
        echo '<hr>
              <a href="index.php?page=add-product" class="btn btn-primary">
                  ➕ Добавить первый товар
              </a>';
    }
    echo '  </div>
          </div>';
} else {
    // Открываем контейнер и сетку карточек
    echo '<div class="container mt-4">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';
    
    foreach($products as $product) {
        $category = htmlspecialchars($product['category_name'] ?? 'Без категории');
        
        // Определяем цвет иконки в зависимости от категории
        $categoryIcon = '🏷️';
        if (strpos($category, 'Электро') !== false) $categoryIcon = '📱';
        if (strpos($category, 'Мебель') !== false) $categoryIcon = '🪑';
        ?>
        
        <div class="col">
            <div class="card h-100 shadow-sm hover-shadow transition">
                <div class="card-body">
                    <!-- Заголовок и категория -->
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h3 class="card-title h5 mb-0 text-primary">
                            <?php echo htmlspecialchars($product['name']); ?>
                        </h3>
                        <span class="badge bg-secondary">
                            <?php echo $categoryIcon . ' ' . $category; ?>
                        </span>
                    </div>
                    
                    <!-- Цена -->
                    <div class="mb-2">
                        <span class="text-muted">Цена:</span>
                        <b class="text-success fs-4"><?php echo number_format($product['price'], 0, ',', ' '); ?> ₽</b>
                    </div>
                    
                    <!-- Описание -->
                    <div class="mb-3">
                        <span class="text-muted">Описание:</span>
                        <p class="card-text text-secondary mt-1">
                            <?php echo htmlspecialchars($product['description']); ?>
                        </p>
                    </div>
                    
                    <!-- Кнопки для админа -->
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === 1): ?>
                        <div class="btn-group w-100" role="group">
                            <a href="index.php?page=edit-product&id=<?php echo $product['id']; ?>" 
                               class="btn btn-outline-primary btn-sm">
                                ✏️ Редактировать
                            </a>
                            <a href="index.php?page=delete-product&id=<?php echo $product['id']; ?>" 
                               class="btn btn-outline-danger btn-sm"
                               onclick="return confirm('Вы уверены, что хотите удалить товар «<?php echo htmlspecialchars($product['name']); ?>»?')">
                                🗑️ Удалить
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <?php 
    }
    
    echo '</div></div>'; // Закрываем row и container
}
?>

<!-- Пагинация -->
<?php if ($total_pages > 1): ?>
<div class="container mt-4 mb-5">
    <nav aria-label="Навигация по страницам">
        <ul class="pagination justify-content-center">
            <!-- Кнопка "Назад" -->
            <li class="page-item <?php echo ($currentPage <= 1) ? 'disabled' : ''; ?>">
                <a class="page-link" 
                   href="<?php echo ($currentPage > 1) ? 'index.php?page=index&page-number=' . ($currentPage - 1) : '#'; ?>"
                   aria-label="Предыдущая">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="d-none d-sm-inline"> Назад</span>
                </a>
            </li>
            
            <!-- Номера страниц -->
            <?php
            // Определяем диапазон отображаемых страниц
            $start = max(1, $currentPage - 2);
            $end = min($total_pages, $currentPage + 2);
            
            // Добавляем первую страницу, если не в диапазоне
            if ($start > 1) {
                echo '<li class="page-item"><a class="page-link" href="index.php?page=index&page-number=1">1</a></li>';
                if ($start > 2) {
                    echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                }
            }
            
            // Отображаем страницы
            for ($i = $start; $i <= $end; $i++) {
                $activeClass = ($currentPage == $i) ? 'active' : '';
                echo '<li class="page-item ' . $activeClass . '">
                        <a class="page-link" href="index.php?page=index&page-number=' . $i . '">' . $i . '</a>
                      </li>';
            }
            
            // Добавляем последнюю страницу, если не в диапазоне
            if ($end < $total_pages) {
                if ($end < $total_pages - 1) {
                    echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                }
                echo '<li class="page-item"><a class="page-link" href="index.php?page=index&page-number=' . $total_pages . '">' . $total_pages . '</a></li>';
            }
            ?>
            
            <!-- Кнопка "Вперед" -->
            <li class="page-item <?php echo ($currentPage >= $total_pages) ? 'disabled' : ''; ?>">
                <a class="page-link" 
                   href="<?php echo ($currentPage < $total_pages) ? 'index.php?page=index&page-number=' . ($currentPage + 1) : '#'; ?>"
                   aria-label="Следующая">
                    <span class="d-none d-sm-inline">Вперед </span>
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    
    <!-- Информация о количестве товаров -->
    <div class="text-center text-muted mt-3">
        <small>
            Страница <?php echo $currentPage; ?> из <?php echo $total_pages; ?>
            <?php if (isset($totalProducts)): ?>
                | Всего товаров: <?php echo $totalProducts; ?>
            <?php endif; ?>
        </small>
    </div>
</div>
<?php endif; ?>

<!-- Добавь этот CSS в <head> или отдельный файл -->
<style>
    /* Плавные переходы для карточек */
    .transition {
        transition: all 0.3s ease;
    }
    
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    
    /* Адаптивность для маленьких экранов */
    @media (max-width: 576px) {
        .pagination .page-link {
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }
    }
</style>