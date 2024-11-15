<?php
class ProductModel extends Model
{
    // public function getAllProduct()
    // {
    //     $sql = "SELECT * from products a inner join variants b 
    //     on a.product_id = b.product_id inner join colors c 
    //     on b.color_id = c.color_id inner join sizes d 
    //     on d.size_id = b.size_id inner join image_variant e
    //     on b.variant_id = e.variant_id inner join images f
    //     on e.image_id = f.image_id where a.status = 1 and variant_main = 1 and image_main = 1";
    //     $list = $this->selectAll($sql);
    //     return $list;
    // }
    // public function getProductDetail($id, $colorId, $sizeId)
    // {
    //     $sql = "SELECT * from products a inner join variants b 
    //     on a.product_id = b.product_id inner join colors c 
    //     on b.color_id = c.color_id inner join sizes d 
    //     on d.size_id = b.size_id where a.status = 1 and a.product_id=$id and c.color_id=$colorId and d.size_id=$sizeId";

    //     $sql2 = "SELECT image_link from variants a inner join image_variant b 
    //     on a.variant_id = b.variant_id inner join images c 
    //     on c.image_id = b.image_id where product_id = $id and color_id = $colorId and size_id = $sizeId";

    //     $sql3 = "SELECT * from colors x where x.color_id in 
    //     (SELECT color_id from variants where product_id = $id)";
        

    //     $sql4 = "SELECT * from products a inner join variants b 
    //     on a.product_id = b.product_id inner join sizes c 
    //     on b.size_id = c.size_id where a.product_id=$id and b.color_id=$colorId";

    //     $sql5 = "SELECT image_link from variants a inner join image_variant b 
    //     on a.variant_id = b.variant_id inner join images c 
    //     on c.image_id = b.image_id where product_id = $id and color_id = $colorId";

    //     $list1 = $this->selectAll($sql);
    //     $list2 = $this->selectAll($sql2);
    //     $list3 = $this->selectAll($sql3);
    //     $list4 = $this->selectAll($sql4);
    //     $list5 = $this->selectAll($sql5);

    //     $list = ['product'=>$list1,'image'=>$list2,'color'=>$list3,'size'=>$list4,'colorImage'=>$list5];
    //     return $list;
    // }
}
