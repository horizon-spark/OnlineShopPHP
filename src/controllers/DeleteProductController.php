<?php 
    if ($_SESSION['user_id'] !== 1) {
        $_SESSION['message'] = "Только администратор может удалять товары";
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

    $product_to_delete = $product->get_product_by_id($id);

    $name_to_delete = $product_to_delete['name'];
    $price_to_delete = $product_to_delete['price'];
    $desc_to_delete = $product_to_delete['description'];

    require_once "../src/views/pages/delete-product.php";
    require_once "../src/views/footer.php";

    if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] == 1) {
        $product->delete_product_by_id($id);
    }
?>