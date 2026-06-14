<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Shop_PHP</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">Shop_PHP</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <span class="nav-link active">
                                👋 <?php echo htmlspecialchars($_SESSION['username']); ?>
                            </span>
                        </li>
                        
                        <?php if ($_SESSION['user_id'] === 1): ?>
                            <li class="nav-item">
                                <a class="nav-link btn btn-outline-success" href="index.php?page=add-product">
                                    ➕ Добавить товар
                                </a>
                            </li>
                        <?php endif; ?>
                        
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-danger" href="index.php?page=logout">
                                🚪 Выйти
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary" href="index.php?page=login">
                                🔑 Войти
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-secondary" href="index.php?page=register">
                                📝 Регистрация
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <?php if ($theme === 'light'): ?>
                            <a class="nav-link btn btn-outline-warning" href="index.php?theme=dark">
                                🌙 Темная тема
                            </a>
                        <?php else: ?>
                            <a class="nav-link btn btn-outline-light" href="index.php?theme=light">
                                ☀️ Светлая тема
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <br>