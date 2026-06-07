<?php
    try {
        $conn = new PDO("mysql:host=localhost;dbname=shop_db", "admin", "123456");
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }
?>