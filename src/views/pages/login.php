<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">🔐 Вход</h3>
                    
                    <?php if (isset($error_message)): ?>
                        <div class="alert alert-danger"><?php echo htmlspecialchars($error_message); ?></div>
                    <?php endif; ?>
                    
                    <form action="" method="POST">
                        <div class="mb-3">
                            <input type="text" 
                                   class="form-control" 
                                   name="username"
                                   placeholder="👤 Имя пользователя"
                                   value="<?php echo htmlspecialchars($_POST['username'] ?? '') ?>"
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <input type="email" 
                                   class="form-control" 
                                   name="email"
                                   placeholder="📧 Email"
                                   value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>"
                                   required>
                        </div>
                        
                        <div class="mb-3">
                            <input type="password" 
                                   class="form-control" 
                                   name="password"
                                   placeholder="🔒 Пароль"
                                   required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">
                            Войти
                        </button>
                    </form>
                    
                    <hr class="my-3">
                    
                    <div class="text-center">
                        <small class="text-muted">
                            Нет аккаунта? <a href="index.php?page=register">Регистрация</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>