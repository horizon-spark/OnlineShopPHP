<?php 
    class ProductModel
    {
        public $conn;

        function __construct($conn) {
            $this->conn = $conn;
        }

        function get_product_by_id($id) {
            $sql = "SELECT * FROM product
            WHERE id = $id";

            $res = $this->conn->query($sql)->fetch();

            if (!$res) {
                $_SESSION['message'] = "Товар с id = $id не найден";
                header("Location: index.php?page=index");
                exit;
            }

            return $res;
        }

        function get_total_count() {
            $sql = "SELECT COUNT(*) AS total FROM product";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $total = $stmt->fetch()['total'];
            
            return $total;
        }

        function get_partition($limit, $offset) {
            $sql = "SELECT p.id, c.name AS category_name,
                        p.name, p.price, p.description
                    FROM product p
                        LEFT JOIN category c ON p.category_id = c.id
                    ORDER BY p.id DESC
                    LIMIT :limit OFFSET :offset";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
            $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $products;
        }

        function validate_add($cat, $name, $price, $desc) {

            if (!empty($cat) &&
                !empty($name) && 
                !empty($price) &&
                !empty($desc)) {

                if (!in_array($cat, ['electronics', 'furniture'])) {
                    echo "Неизвестная категория товара";
                    return 0;
                }

                if (strlen($name) < 3 || strlen($name) > 50) {
                    echo "Длина названия товара должна быть от 3 до 50 символов";
                    return 0;
                }

                if (!filter_var($price, FILTER_VALIDATE_INT)) {
                    echo "Цена должна быть числом";
                    return 0;
                }

                if (strlen($desc) < 10 || strlen($desc) > 300) {
                    echo "Длина описания товара должна быть от 10 до 300 символов";
                    return 0;
                }

            } else {
                echo "Поля формы не должны быть пустыми";
                return 0;
            }

            return 1;
        }

        function add_product($cat, $name, $price, $desc) {
            $sql = "INSERT INTO product (category_id, added_by, 
                                        name, price, description)
                    VALUES (:category_id, :added_by, :name, 
                            :price, :description)";
            
            $stmt = $this->conn->prepare($sql);

            $category_id = array_search($cat, ['electronics', 'furniture']) + 1;
            $added_by = $_SESSION['user_id'];

            $affectedRowsNumber = $stmt->execute(['category_id' => $category_id,
                            'added_by' => $added_by,
                            'name' => $name,
                            'price' => $price,
                            'description' => $desc]);
            
            if ($affectedRowsNumber > 0) {
                $_SESSION['message'] = "Товар успешно добавлен";
                header("Location: index.php?page=index");
            }
        }

        function update_product($id, $cat, $name, $price, $desc) {
            $sql = "UPDATE product 
                    SET category_id=:category_id,
                        name=:name, 
                        price=:price, 
                        description=:description
                    WHERE id=:id";

            $stmt = $this->conn->prepare($sql);

            $category_id = array_search($cat, ['electronics', 'furniture']) + 1;

            $affectedRowsNumber = $stmt->execute([
                'category_id' => $category_id,
                'name' => $name,
                'price' => $price,
                'description' => $desc,
                'id' => $id
            ]);

            if ($affectedRowsNumber > 0) {
                $_SESSION['message'] = "Успешное обновление данных товара с id = $id";
                header("Location: index.php?page=index");
            }
        }
    }
?>