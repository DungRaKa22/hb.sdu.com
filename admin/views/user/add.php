<h4 class="text-primary font-weight-bold">Thêm mới tài khoản</h4>   
 <form action="index.php?controller=user&action=add_submit"  
method="post" class="was-validated">   
   <div class="form-group">   
     <label>Tên đăng nhập:</label>   
    <input type="text" class="form-control" id="ten_dang_nhap"  
name="ten_dang_nhap" required>   
   </div>   
   <div class="form-group">   
     <label>Mật khẩu:</label>  
    <input type="password" class="form-control" id="mat_khau"  
name="mat_khau" required>   
   </div>       
   <div class="form-group">   
     <label>Email:</label>   
     <input type="email" class="form-control" id="email" name="email" required> 
   </div>
   <div class="form-group">
     <label>Vai trò:</label>
     <select class="form-control" id="vai_tro" name="vai_tro" required>
       <option value="user">Người dùng</option>
       <option value="admin">Quản trị viên</option>
     </select>
   </div>   
   <button type="submit" class="btn btn-primary" name="add">Thêm</button> 
 </form>   
