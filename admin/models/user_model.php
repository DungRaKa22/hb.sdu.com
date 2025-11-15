<?php
require_once 'models/db_model.php'; //Nhúng file định nghĩa lớp DB
class User extends BaseController  //Chữ cái đầu viết hoa, còn lại chữ thường
{
    //Khai báo các thuộc tính tương ứng với các trường của bảng trong CSDL.
    public $ma_nguoi_dung;
    public $mat_khau;
    public $ten_dang_nhap;
    public $email;
    public $vai_tro;
    //Phương thức khởi tạo dùng để gán giá trị truyền vào cho các thuộc
    //tính mỗi khi tạo mới đối tượng của lớp.
    function __construct($ma_nguoi_dung, $mat_khau, $ten_dang_nhap, $email, $vai_tro)
    {
        $this->ma_nguoi_dung = $ma_nguoi_dung;
        $this->mat_khau      = $mat_khau;
        $this->ten_dang_nhap = $ten_dang_nhap;
        $this->email         = $email;
        $this->vai_tro       = $vai_tro;
    }
    //Phương thức get_all() dùng để lấy về tất cả các dòng trong bảng taikhoan.
    static function get_all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM nguoi_dung');

        //Duyệt mảng các bản ghi, chuyển bản ghi thành đối tượng
        //và gán vào mảng list.
        foreach ($req->fetchAll() as $item) {
            $list[] = new User($item['ma_nguoi_dung'], $item['mat_khau'], $item['ten_dang_nhap'], $item['email'],$item['vai_tro']);
        }

        return $list; //Trả về mảng các đối tượng user
    }
    //
    static function get_byid($ma_nguoi_dung)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM nguoi_dung WHERE ma_nguoi_dung = :ma_nguoi_dung');
        $req->execute(array('ma_nguoi_dung' => $ma_nguoi_dung));

        $item = $req->fetch(); //Lấy ra 1 bản ghi có tên đăng nhập = giá trị biến $tendangnhap
        if (isset($item['ma_nguoi_dung '])) {
            return new User($item['ma_nguoi_dung'], $item['mat_khau'], $item['ten_dang_nhap'],
         $item['email'],$item['vai_tro']); //Trả về đối tượng nguoi_dung
        }
        return null;
    }

    //Thêm mới
    function insert()
    {
        $db = DB::getInstance();
        $sql = "INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau, email, vai_tro, ngay_tao) 
                VALUES (:username, :password, :email, :role, NOW())";
        $req = $db->prepare($sql);
        return $req->execute([
            'username' => $this->ten_dang_nhap,
            'password' => $this->mat_khau,
            'email' => $this->email,
            'role' => $this->vai_tro
        ]);
    }

    //Sửa
    function update()
    {
        $db = DB::getInstance();
        $sql = "UPDATE nguoi_dung 
                SET ten_dang_nhap = :username,
                    email = :email, 
                    vai_tro = :role 
                WHERE ma_nguoi_dung = :ma_nguoi_dung";
        $req = $db->prepare($sql);
        return $req->execute([
            'username' => $this->ten_dang_nhap,
            'email' => $this->email,
            'role' => $this->vai_tro,
            'ma_nguoi_dung' => $this->ma_nguoi_dung
        ]);
    }

    //Xóa
    //Dùng static sẽ gọi trực tiếp thay vì phải tạo đối tượng
    //rồi mới gọi phương thức.
    static function delete($ma_nguoi_dung)
    {
        $db = DB::getInstance();
        $sql = "DELETE FROM nguoi_dung WHERE ma_nguoi_dung = $ma_nguoi_dung" ;
        return $db->exec($sql);
    }

}
?>