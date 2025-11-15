<h4 class="text-primary font-weight-bold">Thêm mới chủ đề</h4>
<form action="index.php?controller=chu_de&action=add_submit" method="post" class="was-validated">
   <div class="form-group">
     <label>Tên chủ đề:</label>
     <input type="text" class="form-control" id="ten_chu_de" name="ten_chu_de" required>
   </div>
   <div class="form-group">
     <label>Mô tả:</label>
     <textarea class="form-control" id="mo_ta" name="mo_ta" rows="3"></textarea>
   </div>
   <button type="submit" class="btn btn-primary" name="add">Thêm</button>
   <a href="index.php?controller=chu_de&action=index" class="btn btn-secondary">Hủy</a>
</form>

