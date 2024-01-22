<?php

use App\Models\Post;
use App\Libraries\MyClass;

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $row = Post::find($id);
    if ($row) {
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = 1;
        $row->save();
        MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Đưa mẫu tin vào thùng rác thành công']);
        header('location:index.php?option=post');
    } else {
        MyClass::set_flash('message', ['type' => 'error', 'msg' => 'Không tìm thấy mẫu tin']);
        header('location:index.php?option=post');
    }
} elseif (isset($_POST['DELETE_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $row = Post::find($id);
        if ($row) {
            $row->status = 0;
            $row->updated_at = date('Y-m-d H:i:s');
            $row->updated_by = 1;
            $row->save();
        }
    }
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa vĩnh viễn nhiều mẫu tin vào thùng rác thành công']);
    header('location:index.php?option=post');
} else {
    MyClass::set_flash('message', ['type' => 'error', 'msg' => 'Thiếu thông tin cần thiết']);
    header('location:index.php?option=post');
}
