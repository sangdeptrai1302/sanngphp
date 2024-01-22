<?php
use App\Models\Topic;
use App\Libraries\MyClass;

if(isset($_POST['action']) && $_POST['action'] == 'delete_many') {
    $selected_ids = isset($_POST['selected_ids']) ? $_POST['selected_ids'] : [];
    if(!empty($selected_ids)) {
        foreach($selected_ids as $id) {
            $topic = Topic::find($id);
            if($topic) {
                $topic->status = 0;
                $topic->updated_at = date('Y-m-d H:i:s');
                $topic->updated_by = 1;
                $topic->save();
            }
        }
        MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Đưa các mẫu tin vào thùng rác thành công']);
        header('location: index.php?option=topic');
        exit();
    } else {
        MyClass::set_flash('message', ['type' => 'error', 'msg' => 'Chưa chọn bản ghi để xóa']);
        header('location: index.php?option=topic');
        exit();
    }
}

