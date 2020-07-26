<?php
class AdminModel extends Model
{
    public function viewAll()
    {
        $sql = "SELECT
            productId,
            productName,
            productPrice,
            productThumb,
            productCategory,
            productStock
            FROM products
/*             SUM(orderItem. orderItemQuantity) as totalUnitsSold FROM products
            JOIN orderItems ON orderItems.productId=products.productId
            GROUP BY orderItems.productId */
            ORDER BY productName";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);
        $count = $stmt->rowCount();
        if ($count > 0) {
            $results = $stmt->fetchAll();
            Session::set('products', $results);
        }
        return false;
    }

    public function viewOne($id)
    {
        $sql = "SELECT
            productSKU,
            productName,
            productPrice,
            productWeight,
            productLongDesc,
            productThumb,
            productImage,
            productStock,
            productCategory
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

    public function add()
    {
        $sku = $_POST['sku'];
        $name = $_POST['productName'];
        $price = $_POST['price'];
        $weight = $_POST['weight'];
        $longDesc = $_POST['longDesc'];
        $thumbnail = $_POST['thumbnail'];
        $images = $_POST['images'];
        $stock = $_POST['stock'];
        $category = $_POST['category'];
        $createdAt = date('Y-m-d H:i:s');

        echo $images;

        $sql = "INSERT INTO products
                (productSKU,
                productName,
                productPrice,
                productWeight,
                productLongDesc,
                productThumb,
                productImage,
                productStock,
                productCreatedAt,
                productLastUpdateAt,
                productCategory)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$sku, $name, $price, $weight, $longDesc, $thumbnail, $images, $stock, $createdAt, $createdAt, $category])) {
            header('location: /admin?status=addsuccess');
        } else {
            header('location: /admin/add?sku=' . $sku . '&productName=' . $name . '&price=' . $price . '&weight=' . '&longDesc=' . $longDesc . '&thumbnail=' . $thumbnail . '&images=' . $images . '&stock=' . $stock . '&category=' . $category);
        }
    }
}
