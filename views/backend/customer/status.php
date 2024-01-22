<?php
use App\Models\User;
use App\Libraries\MyClass;

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $row = User::find($id);
  if($row == null) {
    $response = array('success' => false, 'type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!');
  } else {
    $row->status = ($row['status'] == 1) ? 2 : 1;
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = 1;
    if ($row->save()) {
      $response = array('success' => true, 'type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!');
    } else {
      $response = array('success' => false, 'type' => 'danger', 'msg' => 'Lỗi khi lưu trạng thái!');
    }
  }
  echo json_encode($response);
} else {
  MyClass::set_flash('message',['type'=>'danger','msg'=> 'Lỗi không xác định!']);
  header('location:index.php?option=customer');
}
