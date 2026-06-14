<?php   
    require_once "../src/views/footer.php";
    require_once "../src/models/UserModel.php";

    $user = new UserModel($conn);

    if (isset($_SESSION['user_id'])) {
        $user->logout();
        header("Location: index.php");
    } else {
        $_SESSION['message'] = "Авторизуйтесь для выхода из профиля";
        header("Location: index.php");
    }
?>