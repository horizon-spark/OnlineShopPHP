<?php 
    require_once "../src/views/pages/registration.php";
    require_once "../src/views/footer.php";
    require_once "../src/models/UserModel.php";

    $user = new UserModel($conn);
    
    if (isset($_POST['username']) &&
        isset($_POST['email']) && 
        isset($_POST['password']) &&
        isset($_POST['password_confirm'])) {

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_confirm = htmlspecialchars($_POST['password_confirm']);

        $is_valid = $user->validateRegistration($username, $email,
            $password, $password_confirm);
        
        if ($is_valid) {
            $user->register($username, $email, $password);
        }
    }
?>