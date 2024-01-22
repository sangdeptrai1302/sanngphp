<?php

use App\Helper\SlugHelper;
use App\Models\Order;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $row = new Order;
    $row->name = $_POST['name'];
    $row->username = $_POST['username'];
    $row->password = sha1($_POST['password']);
    $row->email = $_POST['email'];
    $row->address = $_POST['address'];
    $row->phone = $_POST['phone'];
    $row->status = $_POST['status'];
    $row->gender = $_POST['gender'];
    $row->roles = 0;

    // Upload hình ảnh
    if (!empty($_FILES["image"]["name"])) {
        $file = $_FILES["image"];
        $target_dir = "../public/dist/images/order/";
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      
        // Kiểm tra kiểu file
        $allowedExtensions = array("jpg", "jpeg", "png");
        if (in_array($imageFileType, $allowedExtensions)) {
            // Kiểm tra kích thước file
            if ($file["size"] > 0 && $file["size"] <= 500000) {
                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    $row->image = basename($file["name"]);
                } else {
                    $_SESSION['error'] = "Có lỗi khi tải file lên!";
                }
            } else {
                $_SESSION['error'] = "Kích thước file ảnh phải từ 1 byte đến 500KB!";
            }
        } else {
            $_SESSION['error'] = "Chỉ hỗ trợ tập tin JPG, JPEG và PNG!";
        }
    }
    
    // Lưu dữ liệu vào CSDL
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = $_SESSION['userid'] ?? 1;
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = $_SESSION['userid'] ?? 1;
    $row->save();
    MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm thành công dữ liệu mới']);
    header('location:index.php?option=order');
}




if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $row = Order::find($id);
    $row->name = $_POST['name'];
    $row->username = $_POST['username'];
    $row->password = sha1($_POST['password']);
    $row->email = $_POST['email'];
    $row->address = $_POST['address'];
    $row->phone = $_POST['phone'];
    $row->status = $_POST['status'];
    $row->gender = $_POST['gender'];
    $row->status = $_POST['status'];
    $row->roles = 0;


    if (!empty($_FILES["image"]["name"])) {
        $file = $_FILES["image"];
        $target_dir = "../public/dist/images/order/";
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra kiểu file
        $allowedExtensions = array("jpg", "jpeg", "png");
        if (in_array($imageFileType, $allowedExtensions)) {
            // Kiểm tra kích thước file
            if ($file["size"] > 0 && $file["size"] <= 500000) {
                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    $row->image = basename($file["name"]);
                } else {
                    $_SESSION['error'] = "Có lỗi khi tải file lên!";
                }
            } else {
                $_SESSION['error'] = "Kích thước file ảnh phải từ 1 byte đến 500KB!";
            }
        } else {
            $_SESSION['error'] = "Chỉ hỗ trợ tập tin JPG, JPEG và PNG!";
        }
    }

    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = $_SESSION['userid'] ?? 1;
    $row->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật mẫu tin thành công']);
    header('location:index.php?option=order');
}

