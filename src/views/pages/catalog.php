<?php 
    // echo "<style>
    //         .container {
    //             display: grid;
    //             grid-template-columns: repeat(5, 1fr);
    //             gap: 10px;
    //         }
    //         .card {
    //             border: 1px solid black;
    //             border-radius: 5px;
    //             padding: 0px 0px 10px 10px;
    //         }
    //         a {
    //             text-decoration: none;
    //             color: black;
    //             font-size: 1.5rem;
    //         }
    //         a.active {
    //             pointer-events: none;
    //             cursor: default;
    //             color: grey;
    //         }
    //     </style>";


    if (count($products) == 0) {
        echo "Товары временно отсутствуют";
    } else {
        echo "<div class='container'>";
        foreach($products as $product) {
            $category = $product['category_name'] ?? "Без категории";
            echo "<div class='card'>
                <h3>{$product['name']}</h3>
                Price: <b>{$product['price']}</b><br>
                Description: <i>{$product['description']}</i>
                <h4>$category</h4>";
            if (isset($_SESSION['user_id']) && $_SESSION['user_id'] === 1) {
                echo "<h4>
                        <a href='index.php?page=edit-product&id={$product['id']}'>
                            Редактировать
                        </a>
                        <a href='index.php?page=delete-product&id={$product['id']}'>
                            Удалить
                        </a>
                    </h4>";
            }
            echo "</div>";
        }
        echo "</div>";
    }

    if ($currentPage > 1) {
        $prev = $currentPage - 1;
        echo "<a href='index.php?page=index&page-number=$prev'>Назад</a>";
    } else {
        echo "<a href='#' class='active'>Назад</a>";
    }
    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($currentPage === $i) {
            echo "<a href='index.php?page=index&page-number=$i' class='active'>$i</a> ";    
        } else {
            echo "<a href='index.php?page=index&page-number=$i'>$i</a> ";
        }
    }
    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
    if ($currentPage < $total_pages) {
        $next = $currentPage + 1;
        echo "<a href='index.php?page=index&page-number=$next'>Вперед</a>";
    } else {
        echo "<a href='#' class='active'>Вперед</a>";
    }
?>