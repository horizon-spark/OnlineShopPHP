<?php 
    require_once "../src/models/ProductModel.php";

    $product = new ProductModel($conn);

    $currentPage = filter_input(INPUT_GET, 'page-number', FILTER_VALIDATE_INT);

    if ($currentPage === false || 
        $currentPage === null || 
        $currentPage <= 0) {

        $currentPage = 1;
    }

    $itemsPerPage = 1;
    $offset = ($currentPage - 1) * $itemsPerPage;

    $total = $product->get_total_count();
    $total_pages = ceil($total / $itemsPerPage);

    if ($currentPage > $total_pages) {
        $currentPage = $total_pages;
        $offset = ($currentPage - 1) * $itemsPerPage;
    }

    $products = $product->get_partition($itemsPerPage, $offset);

    require_once "../src/views/pages/catalog.php";
?>