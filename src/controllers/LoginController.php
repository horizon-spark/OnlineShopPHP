<?php 
    if (isset($_SESSION['user_id'])) {
        $_SESSION['message'] = "Вы уже авторизованы";
        header("Location: index.php");
        exit;
    }

    require_once "../src/views/pages/login.php";
    require_once "../src/models/UserModel.php";

    $user = new UserModel($conn);

    if (isset($_POST['username']) &&
        isset($_POST['email']) && 
        isset($_POST['password'])) {

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $is_valid = $user->validateLogin($username, $email, $password);

        if ($is_valid) {
            $user->login($username, $email, $password);
        }
    }
?>