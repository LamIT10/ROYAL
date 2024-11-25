<?php
class OrderModel extends Model
{
    public $table = "orders";
    public function getAllOrder()
    {
        $sql = "SELECT * from orders inner join";
    }
    public function buttonChangeStatus($id, $status)
    { 
        if($status == 3){

        }
        $sql = "UPDATE orders SET order_status = $status + 1 WHERE order_id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function getAllOrderByUser($user_id)
    {
        $sql = "SELECT price,final_price,product_name, image_main,color_name,size_name,b.quantity,payment_method,payment_status,order_status from orders a inner join order_details b
      on a.order_id = b.order_id inner join variants c
      on c.variant_id = b.variant_id inner join colors d
      on d.color_id = c.color_id inner join sizes e
      on e.size_id = c.size_id inner join products pr on pr.product_id = c.product_id where user_id = $user_id";
        $list = $this->selectAll($sql);
        return $list;
    }
}
