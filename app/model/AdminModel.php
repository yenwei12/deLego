<?php
class AdminModel extends Model
{
    public function viewAll()
    {
        $sql = "SELECT
            *
            FROM products
/*             SUM(orderItem. orderItemQuantity) as totalUnitsSold FROM products
            JOIN orderItems ON orderItems.productId=products.productId
            GROUP BY orderItems.productId */
            ORDER BY productStock";
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
            /* productThumb,
            productImage, */
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

    public function getOrder()
    {
        $sql = "SELECT
                orderId,
                orderAt,
                orderStatus,
                orderAmount
            FROM orders
            ORDER BY orderAt DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);
        $count = $stmt->rowCount();
        if ($count > 0) {
            Session::set('orders', $stmt->fetchAll());
        }
        return false;
    }

    public function updateOrder($id)
    {
        header('location: ../../admin/order?status=updatesuccess&id=' . $id);
        return true;
    }



    public function add()
    {
        $sku = $_POST['sku'];
        $name = $_POST['productName'];
        $price = $_POST['price'];
        $weight = $_POST['weight'];
        $longDesc = $_POST['longDesc'];
        //$thumbnail = $_POST['thumbnail'];
        //$images = $_POST['images'];
        $stock = $_POST['stock'];
        $category = $_POST['category'];
        $pieces = $_POST['pieces'];
        $createdAt = date('Y-m-d H:i:s');
        $isFeatured = $_POST['isFeatured'];

        echo $isFeatured;

        $sql = "INSERT INTO products
                (productSKU,
                productName,
                productPrice,
                productWeight,
                productLongDesc,
                productStock,
                productCreatedAt,
                productLastUpdateAt,
                productCategory,
                numberOfPieces,
                isFeatured)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);

        if ($stmt->execute([$sku, $name, $price, $weight, $longDesc, $stock, $createdAt, $createdAt, $category, $pieces, $isFeatured])) {
            header('location: /admin?status=addsuccess');
        } else {
            header('location: /admin/add?sku=' . $sku . '&productName=' . $name . '&price=' . $price . '&weight=' . '&longDesc=' . $longDesc . '&thumbnail=' .  '&stock=' . $stock . '&category=' . $category);
        }
    }

    public function save() {
        header(('location: /admin/view?status=editsuccess'));
    }
}
