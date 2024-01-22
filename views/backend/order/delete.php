<?php

use App\Models\Order;
use App\Libraries\MyClass;

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $row = Order::find($id);
    if ($row) {
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = 1;
        $row->save();
        MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Đưa mẫu tin vào thùng rác thành công']);
        header('location:index.php?option=order');
    } else {
        MyClass::set_flash('message', ['type' => 'error', 'msg' => 'Không tìm thấy mẫu tin']);
        header('location:index.php?option=order');
    }
} elseif (isset($_POST['DELETE_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $row = Order::find($id);
        if ($row) {
            $row->status = 0;
            $row->updated_at = date('Y-m-d H:i:s');
            $row->updated_by = 1;
            $row->save();
        }
    }
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Đưa nhiều mẫu tin vào thùng rác thành công']);
    header('location:index.php?option=order');
    exit(); // Thêm dòng này để chấm dứt thực thi và ngăn chặn chuyển hướng tiếp theo
} else {
    MyClass::set_flash('message', ['type' => 'error', 'msg' => 'Thiếu thông tin cần thiết']);
    header('location:index.php?option=order');
}

