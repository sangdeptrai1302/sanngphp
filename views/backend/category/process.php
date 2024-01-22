<?php

use App\Helper\SlugHelper;
use App\Models\Category;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $row = new Category;
    $row->name = $_POST['name'];
    $row->slug = MyClass::str_slug($row->name);
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->parent_id = $_POST['parent_id'];
    $row->status = $_POST['status'];
    
    
    // Upload hình ảnh
    if (!empty($_FILES["image"]["name"])) {
        $file = $_FILES["image"];
        $target_dir = "../public/dist/images/category/";
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
    $row->status = $_POST['status'];
    $row->save();
    MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm thành công dữ liệu mới']);
    header('location:index.php?option=category');
}




if (isset($_POST['CAPNHAT']))
{
    $id = $_REQUEST['id'];
    $row=Category::find($id);
    $row->name=$_POST['name'];
    $row->slug = MyClass::str_slug($row->name);
    $row->metadesc=$_POST['metadesc'];
    $row->metakey=$_POST['metakey']; 
    $row->parent_id=$_POST['parent_id'];
    // $row->sort_order=$_POST['sort_order'];
    $row->status=$_POST['status'];
    if (!empty($_FILES["image"]["name"])) {
        $file = $_FILES["image"];
        $target_dir = "../public/dist/images/category/";
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
    

    $row->updated_at=date('Y-m-d H:i:s');
    $row->updated_by=$_SESSION['userid']?? 1;
    $row->status=$_POST['status'];
    $row->save();
    MyClass::set_flash('message',['type'=>'success','msg'=>'Cập nhật mẫu tin thành công']);
    header('location:index.php?option=category');

}
