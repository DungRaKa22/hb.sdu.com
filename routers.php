<?php
$controllers = array(
    'home' => ['index', 'error'], // Giữ nguyên từ hướng dẫn
    // Module bạn vừa tạo (dựa trên 'taikhoan')
    'user' => ['index', 'add', 'add_submit', 'edit', 'edit_submit', 'del', 'detail'],
    // Module Quản lý Câu hỏi
    'cau_hoi' => ['index', 'add', 'add_submit', 'edit', 'edit_submit', 'del'],
    // Module Quản lý Chủ đề
    'chu_de' => ['index', 'add', 'add_submit', 'edit', 'edit_submit', 'del'],
); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó. Mỗi controllers tương ứng với một module. báo lỗi sẽ được gọi ra.   
if (!array_key_exists($controller, $controllers)  
|| !in_array($action, $controllers[$controller])) {   
    $controller = 'home';   
    $action = 'error';   
    echo "<script> alert('Không tồn tại controller hoặc action!') </script>"; 
}   
    
 // Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó   
include_once('controllers/' . $controller . '_controller.php');   
 // Tạo ra tên lớp controller từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.   
 //Ví dụ $controller='pages' thì tạo ra tên lớp controller là PagesController. 
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller'; 
    
 // Tạo đối tượng controller từ lớp controller tương ứng được khai báo 
 // trong file tên-module_controller.php. Ví dụ file pages_controller.php. 
$controller = new $klass;    
    
 // Gọi hành động được chỉ định của đối tượng controller.   
$controller->$action(); 
?>
