<?php 
    if ($_SESSION['user_id'] !== 1) {
        $_SESSION['message'] = "Только администратор может добавлять товары";
        header("Location: index.php");
        exit;
    }

    require_once "../src/views/pages/add-product.php";
    require_once "../src/model/ProductModel.php";

    
?>