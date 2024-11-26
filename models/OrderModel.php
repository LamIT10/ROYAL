<?php
class OrderModel extends Model
{
    public $table = "orders";
    public function getAllOrder()
    {
        $sql = "SELECT a.*,b.full_name from orders a inner join users b on a.user_id = b.user_id order by a.create_at desc";
        return $this->selectAll($sql);
    }
    public function buttonChangeStatus($id, $status)
    {
        if ($status == 3) {
        }
        $sql = "UPDATE orders SET order_status = $status + 1 WHERE order_id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function showOrder($user_id,$order_id)
    {
        $sql = "SELECT price,final_price,product_name,b.price, image_main,color_name,size_name,b.quantity,payment_method,payment_status,order_status from orders a inner join order_details b
      on a.order_id = b.order_id inner join variants c
      on c.variant_id = b.variant_id inner join colors d
      on d.color_id = c.color_id inner join sizes e
      on e.size_id = c.size_id inner join products pr on pr.product_id = c.product_id where a.user_id = $user_id and a.order_id = $order_id";
        $list = $this->selectAll($sql);
        return $list;
    }
    public function showOrderByUser($user_id)
    {
        $sql = "SELECT a.*, price,final_price,product_name, image_main,color_name,size_name,b.quantity from orders a inner join order_details b
      on a.order_id = b.order_id inner join variants c
      on c.variant_id = b.variant_id inner join colors d
      on d.color_id = c.color_id inner join sizes e
      on e.size_id = c.size_id inner join products pr on pr.product_id = c.product_id where a.user_id = $user_id";
        $list = $this->selectAll($sql);
        return $list;
    }
    public function handleSuccessShipping($order_id)
    {
        $sql = "UPDATE orders set order_status = 3, payment_status = 1 where order_id = $order_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function getOrderDetail($order_id)
    {
        $sql = "SELECT * FROM order_details where order_id = $order_id";
        return $this->selectAll($sql);
    }
}
