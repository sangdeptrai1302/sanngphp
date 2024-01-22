<?php

use App\Helper\SlugHelper;
use App\Models\Slider;
use App\Models\Contact;
use App\Libraries\MyClass;

if (isset($_POST['TRALOI'])) {
    $contact = new Contact;
    $contact->replaydetail = $_POST['replaydetail'];
    $contact->updated_at =date('Y-m-d H:i:s');
    $contact->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id']:1;
    $contact->status = 2;
    $contact->save();

    // Lưu dữ liệu vào CSDL
    $contact->created_at = date('Y-m-d H:i:s');
    $contact->created_by = $_SESSION['userid'] ?? 1;
    $contact->updated_at = date('Y-m-d H:i:s');
    $contact->updated_by = $_SESSION['userid'] ?? 1;

    $contact->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công dữ liệu mới']);
    header('location:index.php?option=slider');
}


if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $contact->name = $_POST['name'];
    $contact->link = $_POST['link'];
    $contact->position = $_POST['position'];
    $contact->sort_order = $_POST['sort_order']+1;
    $contact->status = $_POST['status'];
    $contact->created_at =date('Y-m-d H:i:s');
    $contact->created_by=(isset($_SESSION['user_id']))?$_SESSION['user_id']:1;
    // $row->sort_order=$_POST['sort_order'];
    $contact->status = $_POST['status'];
    if (!empty($_FILES["image"]["name"])) {
        $file = $_FILES["image"];
        $target_dir = "../public/dist/images/slider/";
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra kiểu file
        $allowedExtensions = array("jpg", "jpeg", "png");
        if (in_array($imageFileType, $allowedExtensions)) {
            // Kiểm tra kích thước file
            if ($file["size"] > 0 && $file["size"] <= 500000) {
                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    $slider->image = basename($file["name"]);
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


    $contact->updated_at = date('Y-m-d H:i:s');
    $contact->updated_by = $_SESSION['userid'] ?? 1;
    $contact->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật mẫu tin thành công']);
    header('location:index.php?option=contact');
}
