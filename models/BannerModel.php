<?php
class BannerModel extends Model
{
    public function __construct(){
        $this->table = 'banners';
    }
    public function getAllBanner()
    {
        $sql = "SELECT * FROM banners where status = 1 order by count";
        $listBanner = $this->select("*");
        return $listBanner;
    }
}
