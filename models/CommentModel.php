<?php
class CommentModel extends Model
{
    public $table = "comments";
    public function getAllInforComment($order_id)
    {
        $sql = "SELECT * FROM orders a inner join order_details b
        on a.order_id = b.order_id inner join variants c
        on c.variant_id = b.variant_id inner join products d
        on d.product_id = c.product_id inner join colors e 
        on e.color_id = c.color_id inner join sizes f 
        on f.size_id = c.size_id where a.order_id = $order_id";
        return $this->selectAll($sql);
    }
    public function getCommentOfProduct($product_id)
    {
        $sql = "SELECT a.*,avatar,full_name,b.user_id from comments a inner join users b
        on a.user_id = b.user_id where a.product_id = $product_id";
        return $this->selectAll($sql);
    }
    
}
