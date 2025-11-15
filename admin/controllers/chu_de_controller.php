<?php
require_once('controllers/base_controller.php');
require_once('models/chu_de_model.php');

class ChuDeController extends BaseController
{
    function __construct()
    {
        $this->folder = 'chu_de';
    }

    public function index()
    {
        $chu_de = ChuDe::get_all();
        $data = array('chu_des' => $chu_de);
        $this->render('index', $data);
    }

    public function add()
    {
        $this->render('add');
    }

    public function add_submit()
    {
        $ten_chu_de = isset($_POST['ten_chu_de']) ? $_POST['ten_chu_de'] : '';
        $mo_ta = isset($_POST['mo_ta']) ? $_POST['mo_ta'] : '';

        if ($ten_chu_de != '') {
            $chu_de = new ChuDe('', $ten_chu_de, $mo_ta);
            $results = $chu_de->insert();

            if ($results) {
                echo "<script> alert('Thêm chủ đề thành công.') </script>";
            } else {
                echo "<script> alert('Lỗi thêm dữ liệu!') </script>";
            }

            $this->index();
        } else {
            echo "<script> alert('Lỗi: Tên chủ đề không được để trống!') </script>";
            $this->add();
        }
    }

    public function edit()
    {
        $chu_de = ChuDe::get_byid($_GET['id']);
        $data = array('chu_de' => $chu_de);
        $this->render('edit', $data);
    }

    public function edit_submit()
    {
        $ma_chu_de = isset($_POST['ma_chu_de']) ? $_POST['ma_chu_de'] : '';
        $ten_chu_de = isset($_POST['ten_chu_de']) ? $_POST['ten_chu_de'] : '';
        $mo_ta = isset($_POST['mo_ta']) ? $_POST['mo_ta'] : '';

        if ($ma_chu_de != '' && $ten_chu_de != '') {
            $chu_de = new ChuDe($ma_chu_de, $ten_chu_de, $mo_ta);
            $results = $chu_de->update();

            if ($results) {
                echo "<script> alert('Sửa chủ đề thành công.') </script>";
            } else {
                echo "<script> alert('Lỗi sửa dữ liệu!') </script>";
            }

            $this->index();
        } else {
            echo "<script> alert('Lỗi: Tên chủ đề không được để trống!') </script>";
            $this->edit();
        }
    }

    public function del()
    {
        ChuDe::delete($_GET['id']);
        $this->index();
    }
}
?>

