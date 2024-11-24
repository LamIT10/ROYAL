<?php
class OrderController extends Controller
{
    public $order;
    public $cart;
    public $inforRecept;
    public $voucher;
    public function __construct()
    {
        $this->loadModel("OrderModel");
        $this->order = new OrderModel();
        $this->loadModel("CartModel");
        $this->cart = new CartModel();
        $this->loadModel("InforReceptModel");
        $this->inforRecept = new InforReceptModel();
        $this->loadModel("VoucherModel");
        $this->voucher = new VoucherModel();
    }
    public function store()
    {
        try {
            if ($_POST['payment_method'] == "0") {
                $payment_status = 0;
            }
            if (isset($_SESSION['voucher']))
                $voucher_id = $_SESSION['voucher']['voucher_id'];
            else $voucher_id = null;

            $list = $this->cart->getCartDetailByArrayId($_SESSION['cart']);
            if (isset($_SESSION['inforUsedTo'])) {
                $idInforLast = $this->inforRecept->selectOne("infor_id", "infor_id = :infor_id", ["infor_id" => $_SESSION['inforUsedTo']['infor_id']])['infor_id'];
            } else {
                $dataInforRecept = [
                    "name" => $_POST['name'],
                    "address" => $_POST['city_name'] . " - " . $_POST['district_name'] . " - " . $_POST['ward_name'],
                    "phone" => $_POST['phone'],
                    "user_id" => $_SESSION['user']['user_id']
                ];
                $idInforLast = $this->inforRecept->insert($dataInforRecept);
            }

            $dataOrder = [
                "user_id" => $_SESSION['user']['user_id'],
                "infor_id" => $idInforLast,
                "voucher_id" => $voucher_id,
                "final_price" => $_POST['final_price'],
                "payment_status" => $payment_status,
                "payment_method" => $_POST['payment_method']
            ];
            $idOrderLast = $this->order->insert($dataOrder);
            $dataOrderDetail = [];
            foreach ($list as $key => $value) {
                $dataOrderDetail = [
                    "order_id" => $idOrderLast,
                    "variant_id" => $value['variant_id'],
                    "quantity" => $value['quantity_cart'],
                    "price" => $value['sale_price']
                ];
                $this->order->insert2($dataOrderDetail, "order_details");
                if (isset($_SESSION['inforUsedTo'])) {
                    unset($_SESSION['inforUsedTo']);
                }
                $_SESSION['success'] = true;
                $_SESSION['message'] = "Đặt hàng thành công";
            }
            if (isset($voucher_id)) {
                $this->voucher->decrease($voucher_id);
                $this->voucher->addToTableUsedTo($voucher_id, $_SESSION['user']['user_id']);
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['message'] = $th->getMessage();
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
