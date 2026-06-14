<?php 
    // echo "<style>
    //     .container {
    //         display: grid;
    //         grid-template-columns: repeat(5, 1fr);
    //         gap: 10px;
    //     }
    //     .card {
    //         border: 1px solid black;
    //         border-radius: 5px;
    //         padding: 0px 0px 10px 10px;
    //     }
    //     a {
    //         text-decoration: none;
    //         color: black;
    //         font-size: 1.5rem;
    //     }
    //     a.active {
    //         pointer-events: none;
    //         cursor: default;
    //         color: grey;
    //     }
    // </style>";

    echo "<div class='container'>
            <div class='card'>
                <h3>$name_to_delete</h3>
                Price: <b>$price_to_delete</b><br>
                Description: <i>$desc_to_delete</i>
            </div>
        </div>";
?>
<h2>Вы действительно хотите удалить товар?</h2>
<form method="post" action="">
    <input type="number" name="confirm_delete" value="1" hidden>
    <a href="index.php?page=index">Отмена</a>
    <button type="submit">Подтвердить удаление</button>
</form>
