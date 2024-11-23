<?php
class LogoutController extends Controller{
    public function index(){
        if(isset($_SESSION['user'])){
                unset($_SESSION['user']);
                header("Location: index.php");
        }
    }
}
?>