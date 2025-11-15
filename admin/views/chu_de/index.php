<h4 class="text-primary font-weight-bold">Quản lý chủ đề</h4>
<table class="table table-bordered">
   <thead>
     <tr>
       <th>Thao tác</th>
       <th>Mã chủ đề</th>
       <th>Tên chủ đề</th>
       <th>Mô tả</th>
     </tr>
   </thead>
   <tbody>
<?php foreach ($chu_des as $chu_de) { ?>
     <tr>
       <td>
         <a href="index.php?controller=chu_de&action=edit&id=<?php echo $chu_de->ma_chu_de; ?>" >Sửa</a> |
         <a href="index.php?controller=chu_de&action=del&id=<?php echo $chu_de->ma_chu_de; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa</a>
       </td>
       <td><?php echo $chu_de->ma_chu_de ?></td>
       <td><?php echo $chu_de->ten_chu_de ?></td>
       <td><?php echo $chu_de->mo_ta ?></td>
     </tr>
   <?php } ?>
   </tbody>
 </table>
 <a href="index.php?controller=chu_de&action=add" class="btn btn-primary">Thêm chủ đề mới</a>

