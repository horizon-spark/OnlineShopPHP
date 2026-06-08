<?php 
    class ProductModel
    {
        public $conn;

        function __construct($conn) {
            $this->conn = $conn;
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
    }
?>