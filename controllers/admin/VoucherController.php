<?php
class VoucherController extends Controller
{
    public $voucher;
    public function __construct()
    {
        $this->loadModel('VoucherModel');
        $this->voucher = new VoucherModel();
    }
    public function index()
    {
        $voucher = $this->voucher->select("*");
        $title = "Danh sách voucher";
        $content = 'admin/voucher/index';
        $layoutPath = 'admin_layout';
        $this->renderView($layoutPath, $content, ["title" => $title, "voucher" => $voucher]);
    }
    public function add()
    {
        $title = "Thêm voucher";
        $content = 'admin/voucher/add';
        $layoutPath = 'admin_layout';
        $this->renderView($layoutPath, $content, ["title" => $title]);
    }
    public function store()
    {
        try {
            $data  = $_POST;
            if ($data['voucher_code'] == "" || strlen($data['voucher_code']) > 30) {
                $_SESSION['error']['voucher_code'] = "*Voucher code không được để trống và không quá 30 kí tự";
            }
            $uniqueCode = $this->voucher->select("*", "voucher_code = :code", ["code" => $data['voucher_code']]);
            if (!empty($uniqueCode)) {
                $_SESSION['error']['voucher_code'] = "*Voucher code này đang tồn tại, vui lòng kiểm tra lại!";
            }
            if (!is_numeric($data['discount']) || $data['discount'] < 0 || $data['discount'] == '') {
                $_SESSION['error']['discount'] = "*Giá trị giảm phải là số, không được bỏ trống và lớn hơn 0";
            }
            if (!is_numeric($data['quantity']) || $data['quantity'] < 0 || $data['quantity'] == '') {
                $_SESSION['error']['quantity'] = "*Số lượng voucher phải là số, không được bỏ trống và lớn hơn 0";
            }
            if (!is_numeric($data['min_price']) || $data['min_price'] < 0 || $data['min_price'] == '') {
                $_SESSION['error']['min_price'] = "*Số lượng voucher phải là số, không được bỏ trống và lớn hơn 0";
            }
            if ($data['description'] == '' || strlen($data['description']) > 255) {
                $_SESSION['error']['description'] = "*Mô tả voucher không để trống và không quá 255 kí tự";
            }
            if (!empty($_SESSION['error'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Dữ liệu lỗi!");
            } else {
                unset($_SESSION['data']);
                $lastId = $this->voucher->insert($data);
                $_SESSION['success'] = true;
                $_SESSION['message'] = "Thêm thành công voucher";
                header("location:?role=admin&controller=voucher");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
            header("location:?role=admin&controller=voucher&action=add");
        }
    }
    public function edit()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("URL thiếu tham số ID", 400);
            }
            $id = $_GET['id'];
            $voucherFind = $this->voucher->select("*", "voucher_id = :id", ["id" => $id]);
            if (empty($voucherFind)) {
                throw new Exception("Không tìm thấy voucher có ID = $id", 404);
            }
            $voucher = $this->voucher->selectOne("*", "voucher_id = :id", ["id" => $id]);
            $title = "Sửa voucher";
            $content = 'admin/voucher/edit';
            $layoutPath = 'admin_layout';
            $this->renderView($layoutPath, $content, ["title" => $title, "voucher" => $voucher]);
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
            header("location:?role=admin&controller=voucher");
        }
    }
    public function update()
    {
        try {
            // echo $_SERVER['REQUEST_METHOD']; die;
            if ($_SERVER['REQUEST_METHOD'] != "POST") {
                throw new Exception("Yêu cầu phương thức phải là POST", 403);
            }
            if (!isset($_GET['id'])) {
                throw new Exception("URL thiếu tham số ID", 400);
            }
            $id = $_GET['id'];
            $voucherFind = $this->voucher->select("*", "voucher_id = :id", ["id" => $id]);
            if (empty($voucherFind)) {
                throw new Exception("Không tìm thấy voucher có ID = $id", 404);
            }
            $data  = $_POST;
            if ($data['voucher_code'] == "" || strlen($data['voucher_code']) > 30) {
                $_SESSION['error']['voucher_code'] = "*Voucher code không được để trống và không quá 30 kí tự";
            }
            $uniqueCode = $this->voucher->select("*", "voucher_code = :code and voucher_id != :id", ["code" => $data['voucher_code'], "id" => $id]);
            if (!empty($uniqueCode)) {
                $_SESSION['error']['voucher_code'] = "*Voucher code này đang tồn tại, vui lòng kiểm tra lại!";
            }
            if (!is_numeric($data['discount']) || $data['discount'] < 0 || $data['discount'] == '') {
                $_SESSION['error']['discount'] = "*Giá trị giảm phải là số, không được bỏ trống và lớn hơn 0";
            }
            if (!is_numeric($data['quantity']) || $data['quantity'] < 0 || $data['quantity'] == '') {
                $_SESSION['error']['quantity'] = "*Số lượng voucher phải là số, không được bỏ trống và lớn hơn 0";
            }
            if (!is_numeric($data['min_price']) || $data['min_price'] < 0 || $data['min_price'] == '') {
                $_SESSION['error']['min_price'] = "*Số lượng voucher phải là số, không được bỏ trống và lớn hơn 0";
            }
            if ($data['description'] == '' || strlen($data['description']) > 255) {
                $_SESSION['error']['description'] = "*Mô tả voucher không để trống và không quá 255 kí tự";
            }
            if (!empty($_SESSION['error'])) {
                $_SESSION['data'] = $data;
                throw new Exception("Dữ liệu lỗi!");
            } else {
                unset($_SESSION['data']);
                $rowCount = $this->voucher->update($data, "voucher_id = :id", ["id" => $id]);
                if ($rowCount > 0) {
                    $_SESSION['success'] = true;
                    $_SESSION['message'] = "Cập nhật thành công voucher";
                    header("location:?role=admin&controller=voucher");
                } else {
                    throw new Exception("Cập nhật không thành công");
                }
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
            if ($th->getCode() == 403 || $th->getCode() == 400 || $th->getCode() == 404) {
                header("location:?role=admin&controller=voucher");
                exit();
            } else {
                header("location:?role=admin&controller=voucher&action=edit&id=$id");
            }
        }
    }
    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("URL thiếu tham số ID", 400);
            }
            $id = $_GET['id'];
            $voucherFind = $this->voucher->select("*", "voucher_id = :id", ["id" => $id]);
            if (empty($voucherFind)) {
                throw new Exception("Không tìm thấy voucher có ID = $id", 404);
            }
            $rowCount = $this->voucher->delete("voucher_id = :voucher_id", ["voucher_id" => $id]);
            if ($rowCount > 0) {
                $_SESSION['success'] = true;
                $_SESSION['message'] = "Xóa thành cổng voucher";
            } else {
                throw new Exception("Xoá voucher không thành công");
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
        }
        header("location:?role=admin&controller=voucher");
    }
}
