<?php
class AdminModel extends Model
{
    public function run()
    {
        $sql = "SELECT
            productName,
            productPrice,
            productShortDesc,
            productThumb,
            productCategory
            SUM(orderItem. orderItemQuantity) as totalUnitsSold FROM products
            JOIN orderItems ON orderItems.productId=products.productId
            GROUP BY orderItems.productId
            ORDER BY productName";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);
        $count = $stmt->rowCount();
        if ($count > 0) {
            $results = $stmt->fetchAll();
            echo '<pre>';
            print_r($results);
            echo '</pre>';
        }
        return false;
    }
}
