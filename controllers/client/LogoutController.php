<?php
class LogoutController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user'])) {
            session_destroy();
            header("Location: index.php");
        }
    }
}
