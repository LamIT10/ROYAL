<?php
class ProductdetailController extends Controller
{
    private $product;
    public $category;
    public function __construct()
    {
        $this->loadModel("ProductModel");
        $this->product = new ProductModel();
        $this->loadModel("CategoryModel");
        $this->category = new CategoryModel;
    }
    // public function index()
    // {
    //     $productDetail = $this->product->getProductDetail($_GET['id'], $_GET['colorId'], $_GET['sizeId']);
    //     if(empty($productDetail['image'])){
    //          $productDetail['image'] = $productDetail['colorImage'];
    //         var_dump($productDetail['image']);
    //     }
        
    //     $category = $this->category->getAllCategory();
    //     $title = "Trang chi tiết sản phẩm";
    //     $content = "client/ProductDetailClient";
    //     $layoutPath = "client_layout";
    //     $this->renderView($layoutPath, $content, ["productDetail" => $productDetail, "category" => $category]);
    // }
}
