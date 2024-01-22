<?php

use App\Models\Slider;
use App\Libraries\MyClass;


    $id = $_REQUEST['id'];
    $slider = Slider::find($id);
   if($slider==null) {
    header('location:index.php?option=slider');
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Không tìm thấy mẫu tin']);
        
    } else  {
        $slider->status = 0;
        $slider->updated_at = date('Y-m-d H:i:s');
        $slider->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
        $slider->save();
        MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Đưa mẫu tin vào thùng rác thành công']);
        header('location:index.php?option=slider');
    } 
 if (isset($_POST['DELETE_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $slider = Slider::find($id);
        if ($slider) {
            $slider->status = 0;
            $slider->updated_at = date('Y-m-d H:i:s');
            $slider->save();
        }
    }
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa vĩnh viễn nhiều mẫu tin vào thùng rác thành công']);
    header('location:index.php?option=slider');
} else {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Thiếu thông tin cần thiết']);
    header('location:index.php?option=slider');
}
