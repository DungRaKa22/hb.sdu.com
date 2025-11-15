<?php
require_once 'models/db_model.php';

class CauHoi
{
    public $ma_cau_hoi;
    public $noi_dung;
    public $dap_an_a;
    public $dap_an_b;
    public $dap_an_c;
    public $dap_an_d;
    public $dap_an_dung;
    public $ma_chu_de;
    public $hinh_anh;

    function __construct($ma_cau_hoi, $noi_dung, $dap_an_a, $dap_an_b, $dap_an_c, $dap_an_d, $dap_an_dung, $ma_chu_de, $hinh_anh)
    {
        $this->ma_cau_hoi = $ma_cau_hoi;
        $this->noi_dung = $noi_dung;
        $this->dap_an_a = $dap_an_a;
        $this->dap_an_b = $dap_an_b;
        $this->dap_an_c = $dap_an_c;
        $this->dap_an_d = $dap_an_d;
        $this->dap_an_dung = $dap_an_dung;
        $this->ma_chu_de = $ma_chu_de;
        $this->hinh_anh = $hinh_anh;
    }

    // Lấy tất cả câu hỏi, có thể lọc theo chủ đề
    static function get_all($ma_chu_de = null)
    {
        $list = [];
        $db = DB::getInstance();
        
        if ($ma_chu_de != null && $ma_chu_de != '') {
            $sql = 'SELECT * FROM cau_hoi WHERE ma_chu_de = :ma_chu_de ORDER BY ma_cau_hoi DESC';
            $req = $db->prepare($sql);
            $req->execute(['ma_chu_de' => $ma_chu_de]);
        } else {
            $sql = 'SELECT * FROM cau_hoi ORDER BY ma_cau_hoi DESC';
            $req = $db->query($sql);
        }

        foreach ($req->fetchAll() as $item) {
            $list[] = new CauHoi(
                $item['ma_cau_hoi'], 
                $item['noi_dung'], 
                $item['dap_an_a'], 
                $item['dap_an_b'], 
                $item['dap_an_c'], 
                $item['dap_an_d'], 
                $item['dap_an_dung'], 
                $item['ma_chu_de'],
                $item['hinh_anh']
            );
        }

        return $list;
    }

    // Lấy câu hỏi theo ID
    static function get_byid($ma_cau_hoi)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM cau_hoi WHERE ma_cau_hoi = :ma_cau_hoi');
        $req->execute(array('ma_cau_hoi' => $ma_cau_hoi));

        $item = $req->fetch();
        if (isset($item['ma_cau_hoi'])) {
            return new CauHoi(
                $item['ma_cau_hoi'], 
                $item['noi_dung'], 
                $item['dap_an_a'], 
                $item['dap_an_b'], 
                $item['dap_an_c'], 
                $item['dap_an_d'], 
                $item['dap_an_dung'], 
                $item['ma_chu_de'],
                $item['hinh_anh']
            );
        }
        return null;
    }

    // Thêm mới câu hỏi
    function insert()
    {
        $db = DB::getInstance();
        $sql = "INSERT INTO cau_hoi (noi_dung, dap_an_a, dap_an_b, dap_an_c, dap_an_d, dap_an_dung, ma_chu_de, hinh_anh) 
                VALUES (:noi_dung, :dap_an_a, :dap_an_b, :dap_an_c, :dap_an_d, :dap_an_dung, :ma_chu_de, :hinh_anh)";
        $req = $db->prepare($sql);
        return $req->execute([
            'noi_dung' => $this->noi_dung,
            'dap_an_a' => $this->dap_an_a,
            'dap_an_b' => $this->dap_an_b,
            'dap_an_c' => $this->dap_an_c,
            'dap_an_d' => $this->dap_an_d,
            'dap_an_dung' => $this->dap_an_dung,
            'ma_chu_de' => $this->ma_chu_de,
            'hinh_anh' => $this->hinh_anh
        ]);
    }

    // Sửa câu hỏi
    function update()
    {
        $db = DB::getInstance();
        $sql = "UPDATE cau_hoi 
                SET noi_dung = :noi_dung,
                    dap_an_a = :dap_an_a,
                    dap_an_b = :dap_an_b,
                    dap_an_c = :dap_an_c,
                    dap_an_d = :dap_an_d,
                    dap_an_dung = :dap_an_dung,
                    ma_chu_de = :ma_chu_de,
                    hinh_anh = :hinh_anh
                WHERE ma_cau_hoi = :ma_cau_hoi";
        $req = $db->prepare($sql);
        return $req->execute([
            'noi_dung' => $this->noi_dung,
            'dap_an_a' => $this->dap_an_a,
            'dap_an_b' => $this->dap_an_b,
            'dap_an_c' => $this->dap_an_c,
            'dap_an_d' => $this->dap_an_d,
            'dap_an_dung' => $this->dap_an_dung,
            'ma_chu_de' => $this->ma_chu_de,
            'hinh_anh' => $this->hinh_anh,
            'ma_cau_hoi' => $this->ma_cau_hoi
        ]);
    }

    // Xóa câu hỏi
    static function delete($ma_cau_hoi)
    {
        $db = DB::getInstance();
        $sql = "DELETE FROM cau_hoi WHERE ma_cau_hoi = :ma_cau_hoi";
        $req = $db->prepare($sql);
        return $req->execute(['ma_cau_hoi' => $ma_cau_hoi]);
    }
}
?>

