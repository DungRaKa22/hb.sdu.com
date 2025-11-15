<h4 class="text-primary font-weight-bold">Quản lý câu hỏi</h4>

<!-- Form lọc theo chủ đề -->
<div class="mb-3">
    <form method="get" action="index.php" class="form-inline">
        <input type="hidden" name="controller" value="cau_hoi">
        <input type="hidden" name="action" value="index">
        <div class="form-group mr-2">
            <label class="mr-2">Lọc theo chủ đề:</label>
            <select name="ma_chu_de" class="form-control" onchange="this.form.submit()">
                <option value="">Tất cả chủ đề</option>
                <?php foreach ($chu_des as $chu_de) { ?>
                    <option value="<?php echo $chu_de->ma_chu_de ?>" 
                            <?php echo isset($ma_chu_de_selected) && $ma_chu_de_selected == $chu_de->ma_chu_de ? 'selected' : ''; ?>>
                        <?php echo $chu_de->ten_chu_de ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </form>
</div>

<table class="table table-bordered">
   <thead>
     <tr>
       <th>Thao tác</th>
       <th>Mã câu hỏi</th>
       <th>Nội dung</th>
       <th>Chủ đề</th>
       <th>Đáp án đúng</th>
     </tr>
   </thead>
   <tbody>
<?php 
// Tạo mảng map chủ đề để tăng hiệu suất
$chu_de_map = array();
foreach ($chu_des as $chu_de) {
    $chu_de_map[$chu_de->ma_chu_de] = $chu_de->ten_chu_de;
}

foreach ($cau_hois as $cau_hoi) { 
    $ten_chu_de = isset($chu_de_map[$cau_hoi->ma_chu_de]) ? $chu_de_map[$cau_hoi->ma_chu_de] : 'Không xác định';
?>
     <tr>
       <td>
         <a href="index.php?controller=cau_hoi&action=edit&id=<?php echo $cau_hoi->ma_cau_hoi; ?>" >Sửa</a> |
         <a href="index.php?controller=cau_hoi&action=del&id=<?php echo $cau_hoi->ma_cau_hoi; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa</a>
       </td>
       <td><?php echo $cau_hoi->ma_cau_hoi ?></td>
       <td><?php echo substr($cau_hoi->noi_dung, 0, 50) . '...' ?></td>
       <td><?php echo $ten_chu_de ?></td>
       <td><?php echo $cau_hoi->dap_an_dung ?></td>
     </tr>
   <?php } ?>
   </tbody>
 </table>
 <a href="index.php?controller=cau_hoi&action=add" class="btn btn-primary">Thêm câu hỏi mới</a>
 <?php if (isset($ma_chu_de_selected) && $ma_chu_de_selected != '') { ?>
 <a href="index.php?controller=cau_hoi&action=add&ma_chu_de=<?php echo $ma_chu_de_selected ?>" class="btn btn-success">Thêm câu hỏi vào chủ đề này</a>
 <?php } ?>

