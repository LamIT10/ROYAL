<?php

class VariantModel extends Model
{
    public $table = "variants";

    public function getAllVariant($id)
    {
        $sql = "SELECT s.size_name, d.color_name, v.base_price, v.sale_price, v.quantity, image_main,
    v.variant_id,
    GROUP_CONCAT(c.image_link SEPARATOR ',') AS image_urls
FROM 
    variants v
        INNER JOIN colors d ON v.color_id = d.color_id inner join sizes s on v.size_id = s.size_id
JOIN 
    image_variant i ON v.variant_id = i.variant_id
    inner join images c on i.image_id = c.image_id
    where v.product_id = $id
GROUP BY 
    v.variant_id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
    public function getOneVariant($id)
    {
        $sql = "SELECT s.size_id, d.color_id, v.base_price, v.sale_price, v.quantity, image_main, variant_main,product_id,
    v.variant_id,
    GROUP_CONCAT(c.image_link SEPARATOR ',') AS image_urls
FROM 
    variants v
        INNER JOIN colors d ON v.color_id = d.color_id inner join sizes s on v.size_id = s.size_id
JOIN 
    image_variant i ON v.variant_id = i.variant_id
    inner join images c on i.image_id = c.image_id
    where v.variant_id = $id
GROUP BY 
    v.variant_id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetch(PDO::FETCH_ASSOC);
        return $list;
    }
    public function getColor()
    {
        $sql = "SELECT * FROM colors";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
    public function getSize()
    {
        $sql = "SELECT * FROM sizes";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
}
