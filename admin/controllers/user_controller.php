<?php
require_once('controllers/base_controller.php');
require_once('models/user_model.php');

class UserController extends BaseController
{
    function __construct()
    {
        $this->folder = 'user'; //Chỉ định thư mục chứa các file view.
    }

    public function index()
    {
        $user = User::get_all(); //Gọi phương thức get_all() của model User lấy tất cả dữ liệu từ bảng.
        $data = array('users' => $user);
        $this->render('index', $data); //Gọi hàm render được kế thừa
    }

    public function detail()
    {
        $user = User::get_byid($_GET['id']); //Gọi phương thức get_byid() của model User lấy dữ liệu có id từ bảng
        $data = array('user' => $user);
        $this->render('detail', $data);
    }

    public function add()
    {
        $this->render('add');
    }

    public function add_submit()
    {
        //Gán giá trị của form cho các biến
        $ma_nguoi_dung = isset($_POST['ma_nguoi_dung']) ? $_POST['ma_nguoi_dung'] : '';
        $mat_khau = isset($_POST['mat_khau']) ? md5($_POST['mat_khau']) : ''; //Mã hóa MD5 cho mật khẩu
        $ten_dang_nhap = isset($_POST['ten_dang_nhap']) ? $_POST['ten_dang_nhap'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $vai_tro = isset($_POST['vai_tro']) ? $_POST['vai_tro'] : 'user';

        //Tạo đối tượng của lớp User.
        //phương thức khởi tạo của lớp User sẽ được gọi đến khi tạo đối tượng.
        if (($ten_dang_nhap != '') && ($mat_khau != '')) {
            $user = new User('', $mat_khau, $ten_dang_nhap, $email, $vai_tro);

            //Gọi phương thức insert() để thêm dữ liệu vào bảng.
            //Phương thức insert() không dùng static nên phải gọi thông qua đối tượng của class.
            $results = $user->insert();

            //Hiển thị thông báo
            if ($results) {
                echo "<script> alert('Thêm mới thành công.') </script>";
            } else {
                echo "<script> alert('Lỗi thêm dữ liệu!') </script>";
            }

            //Trở về trang chủ
            $this->index();
        } else {
            //Hiển thị thông báo
            echo "<script> alert('Lỗi: Tên đăng nhập và mật khẩu không được để trống!') </script>";

            //Trở về trang thêm mới
            $this->add();
        }
    }

    public function edit()
    {
        $user = User::get_byid($_GET['id']); //Gọi phương thức get_byid() của model User lấy dữ liệu có id từ bảng.
        $data = array('user' => $user);
        $this->render('edit', $data);
    }

    public function edit_submit()
    {
        //Gán giá trị của form cho các biến
        $ma_nguoi_dung = isset($_POST['ma_nguoi_dung']) ? $_POST['ma_nguoi_dung'] : '';
        $ten_dang_nhap = isset($_POST['ten_dang_nhap']) ? $_POST['ten_dang_nhap'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $vai_tro = isset($_POST['vai_tro']) ? $_POST['vai_tro'] : '';
        
        // Nếu có mật khẩu mới thì cập nhật, nếu không thì giữ nguyên
        $mat_khau = '';
        if (isset($_POST['mat_khau']) && $_POST['mat_khau'] != '') {
            $mat_khau = md5($_POST['mat_khau']); //Mã hóa MD5 cho mật khẩu
        } else {
            // Lấy mật khẩu cũ từ database
            $user_old = User::get_byid($ma_nguoi_dung);
            $mat_khau = $user_old->mat_khau;
        }

        //Tạo đối tượng của lớp User.
        //phương thức khởi tạo của lớp User sẽ được gọi đến khi tạo đối tượng
        if ($ma_nguoi_dung != '') {
            $user = new User($ma_nguoi_dung, $mat_khau, $ten_dang_nhap, $email, $vai_tro);

            //Gọi phương thức update() để sửa dữ liệu vào bảng.
            //Phương thức update() không dùng static nên phải gọi thông qua đối tượng của class.
            $results = $user->update();

            //Hiển thị thông báo
            if ($results) {
                echo "<script> alert('Sửa thành công.') </script>";
            } else {
                echo "<script> alert('Lỗi sửa dữ liệu!') </script>";
            }

            //Trở về trang chủ
            $this->index();
        } else {
            //Hiển thị thông báo
            echo "<script> alert('Lỗi: Tên đăng nhập và mật khẩu không được để trống!') </script>";

            //Trở về trang sửa
            //echo "<script> history.go(-1) </script>";
        }
    }

    public function del()
    {
        $ma_nguoi_dung = isset($_GET['id']) ? $_GET['id'] : (isset($_GET['ma_nguoi_dung']) ? $_GET['ma_nguoi_dung'] : '');
        if ($ma_nguoi_dung != '') {
            User::delete($ma_nguoi_dung); //Gọi phương thức delete() của model User xóa dữ liệu có id từ bảng.
        }
        //Trở về trang chủ
        $this->index();         
    }
} //End class

