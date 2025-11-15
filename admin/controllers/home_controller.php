<?php
require_once('controllers/base_controller.php');

class HomeController extends BaseController
{
    function __construct()
    {
        $this->folder = 'home';
    }

    public function index()
    {
        // Redirect đến trang quản lý người dùng
        header('Location: index.php?controller=user&action=index');
        exit();
    }

    public function error()
    {
        $this->render('error');
    }
}
?>

