<?php 
    if ($_SESSION['user_id'] !== 1) {
        $_SESSION['message'] = "Только администратор может редактировать товары";
        header("Location: index.php");
        exit;
    }

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1, 'max_range' => 10000]
    ]);

    if ($id === false || $id === null) {
        $_SESSION['message'] = "Get-параметр 'id' отсутствует или не находится в диапазоне 1-10000";
        header("Locaion: index.php?page=index");
    }

    require_once "../src/models/ProductModel.php";
    $product = new ProductModel($conn);

    $product_old = $product->get_product_by_id($id);

    $name_old = $product_old['name'];
    $price_old = $product_old['price'];
    $desc_old = $product_old['description'];

    require_once "../src/views/pages/edit-product.php";

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
            $product->update_product($id, $cat, $name, $price, $desc);
        }
    }
?>