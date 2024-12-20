<?php
class BannerModel extends Model
{
    public $table = "banners";
    public function getAllBanner()
    {
        try {
            $list = $this->select("*", "1=1 order by count");
            return $list;
        } catch (\Throwable $th) {
         }
    }
    public function getOneBanner($id)
    {
        try {
            $list = $this->selectOne("*", "banner_id = :id", ["id" => $id]);
            return $list;
        } catch (\Throwable $th) {
            echo "lỗi ở đây";
        }
    }
    public function AddBanner($data)
    {
        try {
            $this->insert($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function updateBanner($data = [], $id = null)
    {
        // Kiểm tra ID có tồn tại không
        if (empty($id)) {
            echo "ID banner không hợp lệ.";
            return false;
        }

        // Kiểm tra dữ liệu cần cập nhật
        if (empty($data['banner_link'])) {
            echo "Dữ liệu banner_link không được để trống.";
            return false;
        }

        try {
            // Chuẩn bị câu truy vấn
            $sql = "UPDATE banners 
                    SET banner_link = :banner_link
                    WHERE banner_id = :id";

            $stmt = $this->conn->prepare($sql);

            // Gắn giá trị cho các tham số
            $stmt->bindParam(':banner_link', $data['banner_link']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Thực thi câu truy vấn
            $stmt->execute();

            // Kiểm tra số bản ghi bị ảnh hưởng
            if ($stmt->rowCount() > 0) {
                echo "Banner đã được cập nhật thành công.";
                return true;
            } else {
                echo "Không có thay đổi nào được thực hiện.";
                return false;
            }
        } catch (PDOException $e) {
            echo "Lỗi khi cập nhật banner: " . $e->getMessage();
            return false;
        }
    }
    public function deleteBanner($id)
    {
        $this->delete("banner_id =:banner_id", ["banner_id" => $id]);
    }

    public function updateCountDelete($countWasDelete)
    {
        $sql = "UPDATE banners set count = count -1 WHERE count > $countWasDelete";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
