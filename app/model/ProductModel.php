<?php
class ProductModel extends Model
{
    public function select($type = 'all')
    {
        $sql = "SELECT
            *
            -- SUM(orderItem. orderItemQuantity) as totalUnitsSold
            FROM products
            WHERE productCategory=?
            /* JOIN orderItems ON orderItems.productId=products.productId
            GROUP BY orderItems.productId */
            ORDER BY productName";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$type]);
        $count = $stmt->rowCount();
        if ($count > 0) {
            $results = $stmt->fetchAll();
            Session::set('products', $results);
        }
        return false;
    }

    public function selectOne($id)
    {
        $sql = "SELECT
            productId,
            productSKU,
            productName,
            productPrice,
            productWeight,
            productLongDesc,
            productImage,
            productStock,
            productCategory,
            productWeight,
            numberOfPieces
            FROM products
            WHERE productId=?
        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $count = $stmt->rowCount();
        if ($count > 0) {
            $result = $stmt->fetch();
            Session::set('product', $result);
        }
        return false;
    }
}
