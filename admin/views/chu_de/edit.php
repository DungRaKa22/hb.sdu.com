<h4 class="text-primary font-weight-bold">Sửa chủ đề</h4>
<form action="index.php?controller=chu_de&action=edit_submit" method="post" class="was-validated">
   <div class="form-group">
     <label>Mã chủ đề:</label>
     <input type="text" class="form-control" id="ma_chu_de" name="ma_chu_de" value="<?php echo $chu_de->ma_chu_de ?>" disabled>
   </div>
   <div class="form-group">
     <label>Tên chủ đề:</label>
     <input type="text" class="form-control" id="ten_chu_de" name="ten_chu_de" value="<?php echo $chu_de->ten_chu_de ?>" required>
   </div>
   <div class="form-group">
     <label>Mô tả:</label>
     <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3"><?php echo $chu_de->mo_ta ?></textarea>
   </div>
   <input type="hidden" name="ma_chu_de" value="<?php echo $chu_de->ma_chu_de ?>">
   <button type="submit" class="btn btn-primary" name="edit">Sửa</button>
   <a href="index.php?controller=chu_de&action=index" class="btn btn-secondary">Hủy</a>
</form>

