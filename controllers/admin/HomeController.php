<?php
class HomeController extends Controller
{
    public $category;
    public function __construct()
    {
        $this->loadModel("CategoryModel");
        $this->category = new CategoryModel();
    }
    public function index()
    {
        $category = $this->category->getAllCategory();
        $title = "Bảng điều khiển";
        $content = "admin/Home";
        $layoutPath = "admin_layout";
        $this->renderView($layoutPath, $content, ["title" => $title, "content" => $content, "category" => $category]);
    }
}
