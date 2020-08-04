<?php
class IndexModel extends Model
{
    public function run()
    {
        $sql = "SELECT
            productSku,
            productName,
            productPrice
        FROM products WHERE isFeatured=1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0) {
            $results = $stmt->fetchAll();
            Session::set('featured', $results);
        }
        return false;
    }
}
