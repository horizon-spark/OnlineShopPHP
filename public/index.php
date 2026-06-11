<?php 
    session_start();

    require_once "../src/config/db.php";
    require_once "../src/views/header.php";

    if (isset($_SESSION['message'])) {
        echo "<h3>{$_SESSION['message']}</h3>";
        unset($_SESSION['message']);
    }

    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page)
        {
            case "register":
                require_once("../src/controllers/RegistrationController.php");
                break;
            case "login":
                require_once("../src/controllers/LoginController.php");
                break;
            case "logout":
                require_once("../src/controllers/LogoutController.php");
                break;
            case "add-product":
                require_once("../src/controllers/AddProductController.php");
                break;
            case "edit-product":
                require_once("../src/controllers/EditProductController.php");
                break;
            case "delete-product":
                require_once("../src/controllers/DeleteProductController.php");
                break;
            case "index":
                require_once("../src/controllers/CatalogController.php");
                break;
            default:
                header("Location: index.php?page=index");        
        }
    } else {
        header("Location: index.php?page=index");
    }
?>