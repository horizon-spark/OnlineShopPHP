<?php 
    if ($_SESSION['user_id'] !== 1) {
        $_SESSION['message'] = "Только администратор может добавлять товары";
        header("Location: index.php");
        exit;
    }

    require_once "../src/views/pages/add-product.php";
    require_once "../src/views/footer.php";
    require_once "../src/models/ProductModel.php";

    $product = new ProductModel($conn);

    if (isset($_POST['category']) &&
        isset($_POST['name']) &&
        isset($_POST['price']) &&
        isset($_POST['description'])) {

        $cat = htmlspecialchars($_POST['category']);
        $name = htmlspecialchars($_POST['name']);
        $price = htmlspecialchars($_POST['price']);
        $desc = htmlspecialchars($_POST['description']);

        $is_valid = $product->validate_add($cat, $name, $price, $desc);

        if ($is_valid) {
            $product->add_product($cat, $name, $price, $desc);
        }
    }
?>