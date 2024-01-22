<?php

use App\Models\Order;
use App\Libraries\MyClass;

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $row = Order::find($id);
    if ($row) {
        $row->delete();
        MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa dữ liệu thành công']);
        header('location:index.php?option=order');
    } else {
        MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Không tìm thấy mẫu tin']);
        header('location:index.php?option=order');
    }
} elseif (isset($_POST['DESTROY_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $row = Order::find($id);
        if ($row) {
            $row->delete();
        }
    }
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa vĩnh viễn nhiều mẫu tin khỏi CSDL thành công']);
    header('location:index.php?option=order&cat=trash');
} else {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Thiếu thông tin cần thiết']);
    header('location:index.php?option=order&cat=trash');
}
