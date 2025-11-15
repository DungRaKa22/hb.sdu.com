<?php   
 require_once('models/db_model.php'); //Nhúng trang kết nối csdl.   
    if (isset($_GET['controller'])) {   
        $controller = $_GET['controller'];   
    if (isset($_GET['action'])) {   
        $action = $_GET['action'];   
    } else {   
        $action = 'index';  //Mỗi controller phải có một action có tên index làm mặc định nếu không chỉ rõ action.   
    }   
    } else {   
     $controller = 'home'; //Mặc định module home được gọi đến.   
     $action = 'index'; //Mặc định action index của home được gọi đến. 
    }   
 require_once('routers.php'); //Nhúng routes để xử lý gọi controller  phù hợp với yêu cầu của client. 
?>