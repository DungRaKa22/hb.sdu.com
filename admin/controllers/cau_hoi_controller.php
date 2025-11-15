<?php
require_once('controllers/base_controller.php');
require_once('models/cau_hoi_model.php');
require_once('models/chu_de_model.php');

class CauHoiController extends BaseController
{
    function __construct()
    {
        $this->folder = 'cau_hoi';
    }

    public function index()
    {
        $ma_chu_de = isset($_GET['ma_chu_de']) ? $_GET['ma_chu_de'] : null;
        $cau_hoi = CauHoi::get_all($ma_chu_de);
        $chu_des = ChuDe::get_all();
        $data = array(
            'cau_hois' => $cau_hoi,
            'chu_des' => $chu_des,
            'ma_chu_de_selected' => $ma_chu_de
        );
        $this->render('index', $data);
    }

    public function add()
    {
        $chu_des = ChuDe::get_all();
        $ma_chu_de = isset($_GET['ma_chu_de']) ? $_GET['ma_chu_de'] : '';
        $data = array(
            'chu_des' => $chu_des,
            'ma_chu_de_selected' => $ma_chu_de
        );
        $this->render('add', $data);
    }

    public function add_submit()
    {
        $noi_dung = isset($_POST['noi_dung']) ? $_POST['noi_dung'] : '';
        $dap_an_a = isset($_POST['dap_an_a']) ? $_POST['dap_an_a'] : '';
        $dap_an_b = isset($_POST['dap_an_b']) ? $_POST['dap_an_b'] : '';
        $dap_an_c = isset($_POST['dap_an_c']) ? $_POST['dap_an_c'] : '';
        $dap_an_d = isset($_POST['dap_an_d']) ? $_POST['dap_an_d'] : '';
        $dap_an_dung = isset($_POST['dap_an_dung']) ? $_POST['dap_an_dung'] : '';
        $ma_chu_de = isset($_POST['ma_chu_de']) ? $_POST['ma_chu_de'] : '';
        $hinh_anh = isset($_POST['hinh_anh']) ? $_POST['hinh_anh'] : '';

        if ($noi_dung != '' && $ma_chu_de != '' && $dap_an_dung != '') {
            $cau_hoi = new CauHoi('', $noi_dung, $dap_an_a, $dap_an_b, $dap_an_c, $dap_an_d, $dap_an_dung, $ma_chu_de, $hinh_anh);
            $results = $cau_hoi->insert();

            if ($results) {
                echo "<script> alert('Thêm câu hỏi thành công.') </script>";
            } else {
                echo "<script> alert('Lỗi thêm dữ liệu!') </script>";
            }

            $this->index();
        } else {
            echo "<script> alert('Lỗi: Nội dung câu hỏi, chủ đề và đáp án đúng không được để trống!') </script>";
            $this->add();
        }
    }

    public function edit()
    {
        $cau_hoi = CauHoi::get_byid($_GET['id']);
        $chu_des = ChuDe::get_all();
        $data = array(
            'cau_hoi' => $cau_hoi,
            'chu_des' => $chu_des
        );
        $this->render('edit', $data);
    }

    public function edit_submit()
    {
        $ma_cau_hoi = isset($_POST['ma_cau_hoi']) ? $_POST['ma_cau_hoi'] : '';
        $noi_dung = isset($_POST['noi_dung']) ? $_POST['noi_dung'] : '';
        $dap_an_a = isset($_POST['dap_an_a']) ? $_POST['dap_an_a'] : '';
        $dap_an_b = isset($_POST['dap_an_b']) ? $_POST['dap_an_b'] : '';
        $dap_an_c = isset($_POST['dap_an_c']) ? $_POST['dap_an_c'] : '';
        $dap_an_d = isset($_POST['dap_an_d']) ? $_POST['dap_an_d'] : '';
        $dap_an_dung = isset($_POST['dap_an_dung']) ? $_POST['dap_an_dung'] : '';
        $ma_chu_de = isset($_POST['ma_chu_de']) ? $_POST['ma_chu_de'] : '';
        $hinh_anh = isset($_POST['hinh_anh']) ? $_POST['hinh_anh'] : '';

        if ($ma_cau_hoi != '' && $noi_dung != '' && $ma_chu_de != '' && $dap_an_dung != '') {
            $cau_hoi = new CauHoi($ma_cau_hoi, $noi_dung, $dap_an_a, $dap_an_b, $dap_an_c, $dap_an_d, $dap_an_dung, $ma_chu_de, $hinh_anh);
            $results = $cau_hoi->update();

            if ($results) {
                echo "<script> alert('Sửa câu hỏi thành công.') </script>";
            } else {
                echo "<script> alert('Lỗi sửa dữ liệu!') </script>";
            }

            $this->index();
        } else {
            echo "<script> alert('Lỗi: Nội dung câu hỏi, chủ đề và đáp án đúng không được để trống!') </script>";
            $this->edit();
        }
    }

    public function del()
    {
        CauHoi::delete($_GET['id']);
        $this->index();
    }
}
?>

