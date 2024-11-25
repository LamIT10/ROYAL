<?php
class OrderController extends Controller
{
    public $order;
    public function __construct()
    {
        $this->loadModel("OrderModel");
        $this->order = new OrderModel();
    }
    public function index()
    {
        $title = "Quản lý đơn hàng";
        $listOrder = $this->order->select("*");
        $content = "admin/order/index";
        $layoutPath = "admin_layout";
        $this->renderView($layoutPath, $content, ["title" => $title, "listOrder" => $listOrder]);
    }
    public function buttonChangeStatus()
    {
        $order_id = $_GET['id'];
        $status = $_GET['status'];
        $rowCount = $this->order->buttonChangeStatus($order_id, $status);
        header("Location: ?role=admin&controller=order");
    }
}
