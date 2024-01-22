<?php
use App\Models\Slider;
use App\Libraries\MyClass;

if(isset($_REQUEST['id'])) {
   $id = $_REQUEST['id'];
   $row = Slider::find($id);
   $row->status = 1; // Khôi phục mục tin bằng cách đặt status=1
   $row->updated_at = date('Y-m-d H:i:s');   
   $row->updated_by = 1;
   $row->save();
   MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục mẫu tin thành công từ thùng rác']);

   header('location:index.php?option=page&cat=trash');
} else {
   echo "Lỗi: Không tìm thấy biến 'id'";
}

