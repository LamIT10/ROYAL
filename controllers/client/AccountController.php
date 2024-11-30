<?php
class AccountController extends Controller
{
    public $account;
    public $category;
    public function __construct()
    {
        $this->loadModel("UserModel");
        $this->account = new UserModel();
        $this->loadModel("CategoryModel");
        $this->category = new CategoryModel();
    }
    public function index()
    {
        $account = $this->account->selectOne("*", "user_id = {$_SESSION['user']['user_id']}");
        $title = "Quản lý tài khoản";
        $category = $this->category->select("*", "status = 1");
        $content = "client/account";
        $layoutPath = "client_layout";
        $this->renderView($layoutPath, $content, ["title" => $title, "account" => $account, "category" => $category]);
    }
    public function update()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] != "POST") {
                throw new Exception("Yêu cầu phương thức là POST", 9);
            }
            if (!$_GET['id']) {
                throw new Exception("URL thiếu tham số ID", 10);
            }
            $id = $_GET['id'];
            $user = $this->account->select("*", "user_id=:user_id ", ["user_id" => $id]);
            if (empty($user)) {
                throw new Exception("Không tìm thấy user có ID = $id", 11);
            }
            $dataPost = $_POST;
            $_SESSION['error'] = [];
            if ($dataPost['username'] == '' || strlen($dataPost['username']) > 20) {
                $_SESSION['error']['username'] = "*Username không để trống và không quá 20 kí tự";
            }
            if ($dataPost['email'] == '' || !filter_var($dataPost['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error']['email'] = "*Yêu cầu nhập email và đúng định dạng";
                throw new Exception("Yêu cầu nhập email và đúng định dạng");
            }
            $emailCheck = $this->account->selectOne("*", "email=:email and user_id != :user_id", ["email" => $dataPost['email'], "user_id" => $id]);
            if (!empty($emailCheck)) {
                $_SESSION['error']['email'] = "*Email này đã được sử dụng, vui lòng kiểm tra lại";
            }
            if ($dataPost['address'] == '') {
                $_SESSION['error']['address'] = "*Địa chỉ không được trống";
            }
            if ($dataPost['date_of_birth'] == '') {
                $_SESSION['error']['date_of_birth'] = "*Ngày sinh không được để trống";
            }
            if ($dataPost['full_name'] == '' || strlen($dataPost['full_name']) > 30) {
                $_SESSION['error']['full_name'] = "*Họ và tên không được để trống và không quá 30 kí tự";
            }
            if ($dataPost['phone'] == '' || strlen($dataPost['phone']) != 10) {
                $_SESSION['error']['phone'] = "*Số điện thoại không để trống và phải đúng định dạng";
            }
            if (!empty($_SESSION['error'])) {
                throw new Exception("Dữ liệu lỗi!");
            }
            $rowCount = $this->account->update($dataPost, "user_id = :user_id", ["user_id" => $id]);
            if ($rowCount > 0) {
                unset($_SESSION['data']);
                $_SESSION['success'] = true;
                $_SESSION['message'] = "Cập nhật thành công!";
            } else {
                throw new Exception("Cập nhật không thành công");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
        }
        header("Location: ?controller=account");
    }
    public function updateAvatar()
    {
        try {
            $_SESSION['error'] = [];
            if ($_SERVER['REQUEST_METHOD'] != "POST") {
                throw new Exception("Yêu cầu phương thức là POST", 9);
            }
            if (!$_GET['id']) {
                throw new Exception("URL thiếu tham số ID", 10);
            }
            $id = $_GET['id'];
            $user = $this->account->select("*", "user_id=:user_id ", ["user_id" => $id]);
            if (empty($user)) {
                throw new Exception("Không tìm thấy user có ID = $id", 11);
            }
            $dataFile = $_FILES;
            $imageName = $dataFile['avatar']['name'];
            if ($dataFile['avatar']['size'] > 0) {
                if ($dataFile['avatar']['size'] > 2 * 1024 * 1024) {
                    throw new Exception("Dung lượng hình ảnh không quá 2MB");
                }
                $allowType = array("image/jpeg", "image/png", "image/gif", "image/jpg", "image/webp");
                $typeFile = $dataFile['avatar']['type'];
                if (!in_array($typeFile, $allowType)) {
                    throw new Exception("Định dạng hình ảnh không phù hợp, cho phép jpeg, png, gif, jpg, webp");
                }
            }
            if (!empty($_SESSION['error'])) {
                throw new Exception("Dữ liệu lỗi!");
            }
            if ($dataFile['avatar']['size'] > 0) {
                $dataPost['avatar'] = $imageName;
                move_uploaded_file($dataFile['avatar']['tmp_name'], "uploads/" . $imageName);
            }
            $rowCount = $this->account->update($dataPost, "user_id = :user_id", ["user_id" => $id]);
            if ($rowCount > 0) {
                unset($_SESSION['data']);
                $_SESSION['success'] = true;
                $_SESSION['message'] = "Cập nhật thành công!";
            } else {
                throw new Exception("Cập nhật không thành công");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
        }
        header("location:" . $_SERVER['HTTP_REFERER']);
    }
    public function changePassword()
    {
        try {
            $_SESSION['error'] = [];
            if ($_SERVER['REQUEST_METHOD'] != "POST") {
                throw new Exception("Yêu cầu phương thức là POST", 9);
            }
            if (!$_GET['id']) {
                throw new Exception("URL thiếu tham số ID", 10);
            }
            $id = $_GET['id'];
            $user = $this->account->select("*", "user_id=:user_id ", ["user_id" => $id]);
            if (empty($user)) {
                throw new Exception("Không tìm thấy user có ID = $id", 11);
            }
            $_SESSION['error'] = [];
            $dataPost = $_POST;
            $curPass = $this->account->selectOne("*", "user_id=:user_id", ["user_id" => $id])['password'];
            if ($dataPost['currentPassword'] != $curPass) {
                throw new Exception("Mật khẩu hiện tại không đúng");
            }
            if ($dataPost['newPassword'] == '' || strlen($dataPost['newPassword']) > 20 || strlen($dataPost['newPassword']) < 6) {
                throw new Exception("Mật khẩu mới không để trống và phải có từ 6 -> 20 kí tự");
            }
            if ($dataPost['confirmNewPassword'] != $dataPost['newPassword']) {
                throw new Exception("Mật khẩu nhập lại không khớp");
            }
            $row = $this->account->update(['password' => $dataPost['newPassword']], "user_id = :user_id", ["user_id" => $id]);
            if ($row > 0) {
                $_SESSION['success'] = true;
                $_SESSION['message'] = "Đổi mật khẩu thành công";
            } else {
                throw new Exception("Đổi mật khẩu không thành công");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
        }
        header("Location: ?controller=account&action=changePass");
    }
}
