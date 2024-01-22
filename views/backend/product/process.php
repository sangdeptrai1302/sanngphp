<?php

use App\Models\Product;

use App\Libraries\MessageArt;
use App\Libraries\MyClass;

    if (isset($_POST['THEM'])) {
        $row = new Product;
        $row->name = $_POST['name'];
        $row->slug = Myclass::str_slug($_POST['name']);
        $row->detail = $_POST['detail'];
        $row->metadesc = $_POST['metadesc'];
        $row->metakey = $_POST['metakey'];
        $row->category_id = $_POST['category_id'];
        $row->brand_id = $_POST['brand_id'];
        $row->qty = $_POST['qty'];
        $row->price = $_POST['price'];
        $row->pricesale = $_POST['pricesale'];
        $row->metakey = $_POST['metakey'];
        $row->qty = date('Y-m-d H:i:s');
        $row->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] :1;
        if (strlen($_FILES["image"]["name"]) > 0) {
            //upload file
            $target_dir = "../public/dist/images/product/";
            $file = $_FILES["image"];
            $target_file = $target_dir . basename($file["name"]);
            $file_extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (in_array($file_extention, ['png', 'jpg', 'webp'])) {
                $target_file = $target_dir . $row->slug . "." . $file_extention;

                move_uploaded_file($file["tmp_name"], $target_file);
                $row->image = $row->slug . "." . $file_extention;
                $file['name'];
                $row->save();
                MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công ']);
                header('location:index.php?option=product');
            } else {
                MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Kiểu ảnh không hợp lệ']);
                header('location:index.php?option=product');
            }
        }
    }
    

    if (isset($_POST['CAPNHAT'])) {
        $id=$_POST['id'];
        $row = Product::find($id);
        $row = new Product;
        $row->name = $_POST['name'];
        $row->slug = MyClass::str_slug($_POST['name']);
        $row->detail = $_POST['detail'];
        $row->metadesc = $_POST['metadesc'];
        $row->metakey = $_POST['metakey'];
        $row->category_id = $_POST['category_id'];
        $row->brand_id = $_POST['brand_id'];
        $row->qty = $_POST['qty'];
        $row->price = $_POST['price'];
        $row->pricesale = $_POST['pricesale'];
        $row->metakey = $_POST['metakey'];
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = $_SESSION['user_id'];
        //upload file
        if (strlen($_FILES["image"]["name"]) > 0) {

            if (strlen($_FILES["image"]['name']) != 0) {
                $target_dir = "../public/dist/images/product/";
                $file = $_FILES["image"];
                $target_file = $target_dir . basename($file["name"]);
                $file_extention = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (!in_array($file_extention, ['png', 'jpg', 'webp'])) {
                    MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Kiểu ảnh không hợp lệ']);
                    header('location:index.php?option=product&cat=edit');
                  
                  
                }   $target_file = $target_dir . $row->slug . "." . $file_extention;
                move_uploaded_file($file["tmp_name"], $target_file);
                $row->image = $row->slug . "." . $file_extention;
                $file['name'];
            }
            $row->save();
            MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công ']);
            header('location:index.php?option=product');
        }
    }

?>
