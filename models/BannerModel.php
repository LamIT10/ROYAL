<?php
class BannerModel extends Model
{
    public $table = "banners";
    public function getAllBanner()
    {
        $sql = "SELECT * FROM banners";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $listBanner = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $listBanner;
    }
}
