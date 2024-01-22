<?php

use App\Models\Contact;
use App\Libraries\MyClass;


    $id = $_REQUEST['id'];
    $Contact = Contact::find($id);
   if($Contact==null) {
    header('location:index.php?option=slider');
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Không tìm thấy mẫu tin']);
        
    } else  {
        $Contact->status = 0;
        $Contact->updated_at = date('Y-m-d H:i:s');
        $Contact->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
        $Contact->save();
        MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Đưa mẫu tin vào thùng rác thành công']);
        header('location:index.php?option=Contact');
    } 
 if (isset($_POST['DELETE_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $Contact = Contact::find($id);
        if ($Contact) {
            $Contact->status = 0;
            $Contact->updated_at = date('Y-m-d H:i:s');
            $Contact->save();
        }
    }
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa vĩnh viễn nhiều mẫu tin vào thùng rác thành công']);
    header('location:index.php?option=Contact');
} else {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Thiếu thông tin cần thiết']);
    header('location:index.php?option=Contact');
}
