<?php
class CategoryController extends Controller
{
    public $category;
    public function __construct()
    {
        $this->loadModel("CategoryModel");
        $this->category = new CategoryModel();
    }
    public function index()
    {
        $category = $this->category->getAllDividePage();
        $title = "Danh sách danh mục";
        $content = "admin/category/index";
        $layoutPath = "admin_layout";
        $this->renderView("$layoutPath", "$content", ["title" => $title, "category" => $category]);
    }
    public function add()
    {
        $category = $this->category->getAllCategory();
        $title = "Thêm danh mục";
        $content = "admin/category/add";
        $layoutPath = "admin_layout";
        $this->renderView($layoutPath, $content, ["title" => $title, "category" => $category]);
    }
    public function store()
    {
        try {
            // if (isset($_POST['btn-add-category'])) {
            // $name = $_POST['category_name'];
            // $parent_id = $_POST['parent_id'];
            // if (empty($parent_id)) $parent_id = null;
            // $banner = $_FILES['banner']['name'];
            // move_uploaded_file($_FILES['banner']['tmp_name'], "uploads/" . $banner);
            // $data = ["category_name" => $name, "parent_id" => $parent_id, "banner" => $banner];
            // var_dump($data);
            // $this->category->addCategory($data);
            // }
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                throw new Exception("Method not allowed", 405);
            }
            $data = $_POST + $_FILES;
            $_SESSION['error'] = [];
            if ($data['category_name'] == '' || strlen($data['category_name']) > 40) {
                $_SESSION['error']['category_name'] = 'Tên danh mục không được để trống, độ dài nhỏ hơn 40 kí tự';
            }
            if ($data['parent_id'] != '') {
                $listParent = $this->category->select("parent_id");
                // var_dump($listParent);
                $check = 0;
                foreach ($listParent as $key => $value) {
                    if ($value['parent_id'] == $data['parent_id']) {
                        $check = 1;
                    }
                }
                if ($check == 0) {
                    $_SESSION['error']['parent_id'] = 'ID danh mục cha không tồn tại';
                }
            }
            if ($data['banner']['size'] > 0) {
                if($data['banner']['size'] > 2* 1024 * 1024);
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
            header("location:?role=admin&controller=category&action=add");
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $category = $this->category->getAllCategory();
        $categoryDetail = $this->category->getOneCategory($id);
        $title = "Sửa danh mục";
        $content = "admin/category/edit";
        $layoutPath = "admin_layout";
        $this->renderView($layoutPath, $content, ["title" => $title, "category" => $category, "categoryDetail" => $categoryDetail]);
    }
    public function update()
    {
        if (isset($_POST['btn-update-category'])) {
            $name = $_POST['category_name'];
            $parent_id = $_POST['parent_id'];
            $banner = $_FILES['banner']['name'];
            if (!empty($banner)) {
                move_uploaded_file($_FILES['banner']['tmp_name'], "uploads/" . $banner);
                $data = ["category_name" => $name, "parent_id" => $parent_id, "banner" => $banner];
            } else {
                $data = ["category_name" => $name, "parent_id" => $parent_id];
            }

            $this->category->updateCategory($data, $_GET['id']);
        }
    }
    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("URL thiếu tham số ID", 400);
            }
            $id = $_GET['id'];
            $cate = $this->category->selectOne("*", "category_id = :id", ["id" => $id]);
            if (empty($cate)) {
                throw new Exception("Không tìm thấy user có ID $id", 401);
            }
            $this->category->deleteCategory($id);
            $_SESSION['success'] = true;
            $_SESSION['message'] = "Xoá thành công";
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
        }
        header("location:?role=admin&controller=category");
    }
    public function show()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception("URL thiếu tham số ID", 400);
            }
            $id = $_GET['id'];
            $cate = $this->category->selectOne("*", "category_id = :id", ["id" => $id]);
            if (empty($cate)) {
                throw new Exception("Không tìm thấy danh mục có ID $id", 401);
            }
            $category = $this->category->getOneCategory($id);
            $title = "Chi tiết danh mục";
            $content = "admin/category/show";
            $layoutPath = "admin_layout";
            $this->renderView("$layoutPath", "$content", ["title" => $title, "category" => $category]);
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
            header("location:?role=admin&controller=category");
        }
    }
    public function changeStatus()
    {
        try {

            $id = $_GET['id'];
            $status = $_GET['status'];
            $this->category->changeStatuss($id, $status);
            echo "Vào controller";
        } catch (\Throwable $th) {
            // echo "$th";
        }
    }
}
