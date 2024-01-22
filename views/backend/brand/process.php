<?php

use App\Helper\SlugHelper;
use App\Models\Brand;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $brand = new Brand;
    $brand->name = $_POST['name'];
    $brand->slug = MyClass::str_slug($_POST["name"]);
    $brand->metakey = $_POST['metakey'];
    $brand->metadesc = $_POST['metadesc'];
    $brand->sort_order = $_POST['sort_order'];
    $brand->status = $_POST['status'];
    $brand->created_at = date('Y-m-d H:i:s');
    $brand->created_by = (isset($_SESSION['user_id'])) ?$_SESSION['user_id']:1;

    
    // Upload hình ảnh
    if (!empty($_FILES["image"]["name"])) {
        $file = $_FILES["image"];
        $target_dir = "../public/dist/img/brand/";
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      
        // Kiểm tra kiểu file
        $allowedExtensions = array("jpg", "jpeg", "png");
        if (in_array($imageFileType, $allowedExtensions)) {
            // Kiểm tra kích thước file
            if ($file["size"] > 0 && $file["size"] <= 500000) {
                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    $brand->image = basename($file["name"]);
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
    $brand->created_at = date('Y-m-d H:i:s');
    $brand->created_by = $_SESSION['userid'] ?? 1;
    $brand->updated_at = date('Y-m-d H:i:s');
    $brand->updated_by = $_SESSION['userid'] ?? 1;
    $brand->status = $_POST['status'];
    $brand->save();
    MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm thành công dữ liệu mới']);
    header('location:index.php?option=brand');
}




if (isset($_POST['CAPNHAT']))
{
    $id = $_REQUEST['id'];
    $brand=brand::find($id);
    $brand->name=$_POST['name'];
    $brand->slug=SlugHelper::createSlug($brand->name);
    $brand->metadesc=$_POST['metadesc'];
    $brand->metakey=$_POST['metakey']; 
    $brand->parent_id=$_POST['parent_id'];
    // $brand->sort_order=$_POST['sort_order'];
    $brand->status=$_POST['status'];
    if (!empty($_FILES["image"]["name"])) {
        $file = $_FILES["image"];
        $target_dir = "../public/dist/img/brand/";
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      
        // Kiểm tra kiểu file
        $allowedExtensions = array("jpg", "jpeg", "png");
        if (in_array($imageFileType, $allowedExtensions)) {
            // Kiểm tra kích thước file
            if ($file["size"] > 0 && $file["size"] <= 500000) {
                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    $brand->image = basename($file["name"]);
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
    

    $brand->updated_at=date('Y-m-d H:i:s');
    $brand->updated_by=$_SESSION['userid']?? 1;
    $brand->status=$_POST['status'];
    $brand->save();
    MyClass::set_flash('message',['type'=>'success','msg'=>'Cập nhật mẫu tin thành công']);
    header('location:index.php?option=brand');

}
