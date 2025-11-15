<h4 class="text-primary font-weight-bold">Quản lý tài khoản</h4>   
<table class="table table-bordered">   
   <thead>   
     <tr>   
       <th>Thao tác</th>     
       <th>Mã người dùng</th>   
       <th>Tên đăng nhập</th>   
       <th>Email</th>   
       <th>Vai trò</th>   
     </tr>   
   </thead>   
   <tbody>   
   <!-- Duyệt mảng các đối tượng được controller truyền sang -->   
<?php foreach ($users as $user) { ?>     
     <tr>   
       <td>   
         <!-- Liên kết có truyền biến -->   
         <a href="index.php?controller=user&action=edit&id=<?php echo $user->ma_nguoi_dung; ?>" >Sửa</a> |    
         <a href="index.php?controller=user&action=del&id=<?php echo $user->ma_nguoi_dung; ?>"onclick="return confirm('Bạn chắc chắn muốn xóa?');">Xóa</a>   
       </td>   
       <td><?php echo $user->ma_nguoi_dung ?></td>   
       <td><?php echo $user->ten_dang_nhap ?></td>   
       <td><?php echo $user->email ?></td>   
       <td><?php echo $user->vai_tro == 'admin' ? 'Quản trị viên' : 'Người dùng' ?></td>   
     </tr>         
   <?php } ?>   
   </tbody>   
 </table>   
 <a href="index.php?controller=user&action=add" class="btn btn-primary">Thêm người dùng mới</a>   