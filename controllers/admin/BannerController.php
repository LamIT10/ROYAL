<?php
class BannerController extends Controller
{
    public $banner;
    public function __construct()
    {
        $this->loadModel("BannerModel");
        $this->banner = new BannerModel();
    }
    public function index()
    {
        $banner = $this->banner->getAllBanner();
        $title = "Danh sách banner";
        $content = "admin/banner/index";
        $layoutPath = "admin_layout";
        $this->renderView($layoutPath, $content, ["title" => $title, "banner" => $banner]);
    }
    public function add()
    {
        $title = "Thêm banner";
        $content = "admin/banner/add";
        $layoutPath = "admin_layout";
        $this->renderView($layoutPath, $content, ["title" => $title]);
    }
    public function store()
    {
        try {
            $_SESSION['error'] = '';
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Yêu cầu phải sử dụng phương thức POST');
            }
            if (!isset($_FILES['banner_link']) || $_FILES['banner_link']['error'] !== UPLOAD_ERR_OK) {
                throw new Exception('File banner không hợp lệ hoặc không được tải lên');
            }
            $banner_link = $_FILES['banner_link'];
            $fileName = basename($banner_link['name']);
            if ($banner_link['size'] > 2 * 1024 * 1024) {
                $error = 'File lớn hơn 2MB';
            }
            if (!move_uploaded_file($banner_link['tmp_name'], "uploads/" . $fileName)) {
                $error = 'Không thể uploads file';
            }
            $stmt = $this->banner->conn->query("SELECT IFNULL(MAX(count), 0) + 1 AS next_count FROM banners");
            $nextCount = $stmt->fetch(PDO::FETCH_ASSOC)['next_count'];
            $data = [
                'banner_link' => $fileName,
                'count' => $nextCount
            ];
            $this->banner->AddBanner($data);

            $_SESSION['success'] = true;
            $_SESSION['message'] = 'Thêm banner thành công';
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
            header("Location: ?role=admin&controller=banner&action=add");
            exit();
        }
        header("Location: ?role=admin&controller=banner");
        exit();
    }
    public function edit()
    {
        $id = $_GET['id'];
        $listCount = $this->banner->select("count");
        $banner = $this->banner->getAllBanner();
        $bannerDetail = $this->banner->getOneBanner($id);
        $title = "Sửa banner";
        $content = "admin/banner/edit";
        $layoutPath = "admin_layout";
        $this->renderView($layoutPath, $content, ["title" => $title, "banner" => $banner, "bannerDetail" => $bannerDetail, "listCount" => $listCount]);
    }
    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception('Yêu cầu phải sử dụng phương thức POST');
            }

            $banner_id = $_POST['banner_id'];
            $new_banner_link = $_FILES['banner_link'];
            $count = isset($_POST['count']) ? $_POST['count'] : null;
            $data = [];

            if ($new_banner_link['error'] !== UPLOAD_ERR_NO_FILE) {
                if ($new_banner_link['error'] !== UPLOAD_ERR_OK) {
                    throw new Exception('Đã xảy ra lỗi khi tải lên file');
                }
                if ($new_banner_link['size'] > 5 * 1024 * 1024) {
                    throw new Exception('File vượt quá dung lượng cho phép 5MB');
                }
                $fileName = basename($new_banner_link['name']);
                if (!move_uploaded_file($new_banner_link['tmp_name'], 'uploads/' . $fileName)) {
                    throw new Exception('Không thể lưu file banner mới');
                }
                $data['banner_link'] = $fileName;
            }
            $count = $this->banner->selectOne('*', 'count = :count', ['count' => $_POST['count']]); // id2 count2
            $countEdit = $this->banner->selectOne('*', 'banner_id = :banner_id', ['banner_id' => $banner_id]);
            $idCountOld = $count['banner_id'];
            $this->banner->update(['count' => 100], 'banner_id = :id', ['id' => $idCountOld]); // gán count cũ giá trị 100 tránh lỗi unique
            $data['count'] = $_POST['count'];
            if (!empty($data)) {
                $this->banner->update($data, "banner_id = :id", ["id" => $banner_id]); // update count từ post cho banner đang edit
                $this->banner->update(['count' => $countEdit['count']], 'banner_id = :id', ['id' => $idCountOld]);
                $_SESSION['success'] = true;
                $_SESSION['message'] = 'Cập nhật banner thành công';
            } else {
                throw new Exception('Không có thay đổi nào được thực hiện');
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
        }
        header("Location: ?role=admin&controller=banner");
        exit();
    }

    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("URL thiếu tham số ID", 400);
            }
            $id = $_GET['id'];
            $baner = $this->banner->selectOne("*", "banner_id=:id", ["id" => $id]);
            if (empty($baner)) {
                throw new Exception("Không tìm thấy banner có ID $id", 401);
            }
            $countWasDelete = $this->banner->selectOne("*", "banner_id = :banner_id", ["banner_id" => $id])['count'];
            // echo $countWasDelete['count']; die;
            $this->banner->deleteBanner($id);
            $row = $this->banner->updateCountDelete($countWasDelete);
            $_SESSION['success'] = true;
            $_SESSION['message'] = "Xoá thành công";
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
        }
        header("location:?role=admin&controller=banner");
    }
}
