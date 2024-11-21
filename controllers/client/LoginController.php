<?php
class LoginController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->loadModel("UserModel");
        $this->user = new UserModel();
    }
    public function index()
    {
        $title = "Login";
        $layoutPath = "login_layout";
        $this->renderView($layoutPath, "", ["title" => $title]);
    }
    public function checkLogin()
    {
        try {
            $data = $_POST;
            $_SESSION['data']['email'] = $data['email'];
            if ($data['email'] == "") {
                throw new Exception("Vui lòng nhập email");
            }
            $email = $this->user->select("*", "email = :email", ["email" => $data['email']]);
            if (empty($email)) {
                throw new Exception("Email không tồn tại");
            }
            if ($data['password'] == "") {
                throw new Exception("Vui lòng nhập mật khẩu");
            }
            $user = $this->user->select("*", "email = :email AND password = :password", ["email" => $data['email'], "password" => $data['password']]);
            if (empty($user)) {
                throw new Exception("Sai mật khẩu");
            }
            $_SESSION['success'] = true;
            $_SESSION['message'] = "Đăng nhập thành công";
            $_SESSION['user'] = $user;
            header("Location:index.php");
            exit();
        } catch (\Throwable $th) {
            header("Location:?controller=login");
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
            exit();
        }
    }
}
