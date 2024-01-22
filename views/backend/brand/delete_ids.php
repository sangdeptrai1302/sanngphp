<?php
use App\Models\Category;
use App\Libraries\MyClass;

if(isset($_POST['action']) && $_POST['action'] == 'delete_many') {
    $selected_ids = isset($_POST['selected_ids']) ? $_POST['selected_ids'] : [];
    if(!empty($selected_ids)) {
        foreach($selected_ids as $id) {
            $category = Category::find($id);
            if($category) {
                $category->status = 0;
                $category->updated_at = date('Y-m-d H:i:s');
                $category->updated_by = 1;
                $category->save();
            }
        }
        MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Đưa các mẫu tin vào thùng rác thành công']);
        header('location: index.php?option=category');
        exit();
    } else {
        MyClass::set_flash('message', ['type' => 'error', 'msg' => 'Chưa chọn bản ghi để xóa']);
        header('location: index.php?option=category');
        exit();
    }
}

