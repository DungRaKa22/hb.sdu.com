<h4 class="text-primary font-weight-bold">Thêm mới câu hỏi</h4>
<form action="index.php?controller=cau_hoi&action=add_submit" method="post" class="was-validated">
   <div class="form-group">
     <label>Chủ đề:</label>
     <select class="form-control" id="ma_chu_de" name="ma_chu_de" required>
       <option value="">-- Chọn chủ đề --</option>
       <?php foreach ($chu_des as $chu_de) { ?>
         <option value="<?php echo $chu_de->ma_chu_de ?>" 
                 <?php echo isset($ma_chu_de_selected) && $ma_chu_de_selected == $chu_de->ma_chu_de ? 'selected' : ''; ?>>
           <?php echo $chu_de->ten_chu_de ?>
         </option>
       <?php } ?>
     </select>
   </div>
   <div class="form-group">
     <label>Nội dung câu hỏi:</label>
     <textarea class="form-control" id="noi_dung" name="noi_dung" rows="3" required></textarea>
   </div>
   <div class="form-group">
     <label>Đáp án A:</label>
     <input type="text" class="form-control" id="dap_an_a" name="dap_an_a" required>
   </div>
   <div class="form-group">
     <label>Đáp án B:</label>
     <input type="text" class="form-control" id="dap_an_b" name="dap_an_b" required>
   </div>
   <div class="form-group">
     <label>Đáp án C:</label>
     <input type="text" class="form-control" id="dap_an_c" name="dap_an_c" required>
   </div>
   <div class="form-group">
     <label>Đáp án D:</label>
     <input type="text" class="form-control" id="dap_an_d" name="dap_an_d" required>
   </div>
   <div class="form-group">
     <label>Đáp án đúng:</label>
     <select class="form-control" id="dap_an_dung" name="dap_an_dung" required>
       <option value="">-- Chọn đáp án đúng --</option>
       <option value="A">A</option>
       <option value="B">B</option>
       <option value="C">C</option>
       <option value="D">D</option>
     </select>
   </div>
   <div class="form-group">
     <label>Hình ảnh (URL):</label>
     <input type="text" class="form-control" id="hinh_anh" name="hinh_anh" placeholder="Nhập đường dẫn hình ảnh">
   </div>
   <button type="submit" class="btn btn-primary" name="add">Thêm</button>
   <a href="index.php?controller=cau_hoi&action=index" class="btn btn-secondary">Hủy</a>
</form>

