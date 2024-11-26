<?php
class CommentModel extends Model
{
    public $table = "comments";
    public function getAllInforComment($order_id)
    {
        $sql = "SELECT * FROM orders a inner join order_details b
        on a.order_id = b.order_id inner join variants c
        on c.variant_id = b.variant_id inner join products d
        on d.product_id = c.product_id where a.order_id = $order_id";
        return $this->selectAll($sql);
    }
}
