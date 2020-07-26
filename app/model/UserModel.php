<?php
class UserModel extends Model
{
    public function getOrder()
    {
        $id = Session::get('userId');
        $sql = "SELECT
                orderId,
                orderAt,
                orderStatus,
                orderAmount
            FROM orders
            WHERE userId=?
            ORDER BY orderAt DESC
            LIMIT 5";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $count = $stmt->rowCount();
        if ($count > 0) {
            Session::set('orders', $stmt->fetchAll());
        }
        return false;
    }
}
