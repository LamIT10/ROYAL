<?php
class CheckoutController extends Controller
{
    public function index()
    {
        $title = "Checkout";
        $layoutPath = "checkout_layout";
        $this->renderView($layoutPath,"", ["title" => $title]);
    }
    public function order(){
        var_dump($_POST);die;
    }
}
