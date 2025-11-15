<h4 class="text-primary font-weight-bold">Sửa thông tin tài khoản</h4>   
<form action="index.php?controller=user&action=edit_submit"  
method="post" class="was-validated">   
   <div class="form-group">   
     <label>Tên đăng nhập:</label>   
     <input type="text" class="form-control" id="ten_dang_nhap"  
name="ten_dang_nhap" value="<?php echo $user->ten_dang_nhap ?>" required>   
   </div>   
   <div class="form-group">   
     <label>Mật khẩu mới (để trống nếu không đổi):</label>   
     <input type="password" class="form-control" id="mat_khau"  
name="mat_khau" placeholder="Nhập mật khẩu mới">   
   </div>
   <div class="form-group">   
     <label>Email:</label>   
     <input type="email" class="form-control" id="email"  
name="email" value="<?php echo $user->email ?>" required>   
   </div>   
   <div class="form-group">   
        <label>Vai trò:</label>   
     <select class="form-control" id="vai_tro" name="vai_tro" required>
       <option value="user" <?php echo $user->vai_tro == 'user' ? 'selected' : ''; ?>>Người dùng</option>
       <option value="admin" <?php echo $user->vai_tro == 'admin' ? 'selected' : ''; ?>>Quản trị viên</option>
     </select>   
    </div>   
   <input type="hidden" name="ma_nguoi_dung"  
value="<?php echo $user->ma_nguoi_dung ?>">   
   <button type="submit" class="btn btn-primary" name="edit">Sửa</button>   
 </form>  