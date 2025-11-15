<?php
require_once 'models/db_model.php';

class ChuDe
{
    public $ma_chu_de;
    public $ten_chu_de;
    public $mo_ta;

    function __construct($ma_chu_de, $ten_chu_de, $mo_ta)
    {
        $this->ma_chu_de = $ma_chu_de;
        $this->ten_chu_de = $ten_chu_de;
        $this->mo_ta = $mo_ta;
    }

    // Lấy tất cả chủ đề
    static function get_all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM chu_de ORDER BY ma_chu_de DESC');

        foreach ($req->fetchAll() as $item) {
            $list[] = new ChuDe($item['ma_chu_de'], $item['ten_chu_de'], $item['mo_ta']);
        }

        return $list;
    }

    // Lấy chủ đề theo ID
    static function get_byid($ma_chu_de)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM chu_de WHERE ma_chu_de = :ma_chu_de');
        $req->execute(array('ma_chu_de' => $ma_chu_de));

        $item = $req->fetch();
        if (isset($item['ma_chu_de'])) {
            return new ChuDe($item['ma_chu_de'], $item['ten_chu_de'], $item['mo_ta']);
        }
        return null;
    }

    // Thêm mới chủ đề
    function insert()
    {
        $db = DB::getInstance();
        $sql = "INSERT INTO chu_de (ten_chu_de, mo_ta) 
                VALUES (:ten_chu_de, :mo_ta)";
        $req = $db->prepare($sql);
        return $req->execute([
            'ten_chu_de' => $this->ten_chu_de,
            'mo_ta' => $this->mo_ta
        ]);
    }

    // Sửa chủ đề
    function update()
    {
        $db = DB::getInstance();
        $sql = "UPDATE chu_de 
                SET ten_chu_de = :ten_chu_de,
                    mo_ta = :mo_ta 
                WHERE ma_chu_de = :ma_chu_de";
        $req = $db->prepare($sql);
        return $req->execute([
            'ten_chu_de' => $this->ten_chu_de,
            'mo_ta' => $this->mo_ta,
            'ma_chu_de' => $this->ma_chu_de
        ]);
    }

    // Xóa chủ đề
    static function delete($ma_chu_de)
    {
        $db = DB::getInstance();
        $sql = "DELETE FROM chu_de WHERE ma_chu_de = :ma_chu_de";
        $req = $db->prepare($sql);
        return $req->execute(['ma_chu_de' => $ma_chu_de]);
    }
}
?>

