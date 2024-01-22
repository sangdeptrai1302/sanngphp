<?php

use App\Helper\SlugHelper;
use App\Models\Slider;
use App\Libraries\MyClass;
use App\Libraries\MessageArt;


if (isset($_POST['THEM'])) {
    $slider = new Slider;
    $slider->name = $_POST['name'];
    $slider->link = $_POST['link'];
    $slider->position = $_POST['position'];
    $slider->sort_order = $_POST['sort_order']+1;
    $slider->status = $_POST['status'];
    $slider->created_at =date('Y-m-d H:i:s');
    $slider->created_by=(isset($_SESSION['user_id']))?$_SESSION['user_id']:1;
    // title,slug,image,type,metakey,status 
    // Upload hình ảnh
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

    // Lưu dữ liệu vào CSDL
    $slider->created_at = date('Y-m-d H:i:s');
    $slider->created_by = $_SESSION['userid'] ?? 1;
    $slider->updated_at = date('Y-m-d H:i:s');
    $slider->updated_by = $_SESSION['userid'] ?? 1;

    $slider->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công dữ liệu mới']);
    header('location:index.php?option=slider');
}


if(isset($_POST['CAPNHAT'])){
    $id=$_POST['user_id'];
    $slider = Slider::find($id);
    $slider->name = $_POST['name'] ;
    $slider->sort_order = $_POST['sort_order'] ;
    $slider->status = $_POST['status'] ;
    $slider->updated_at = date('Y-m-d H:i:s');
    $slider->updated_by = 1 ;
    $slider->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công ']);
    header('location:index.php?option=slider');
}
