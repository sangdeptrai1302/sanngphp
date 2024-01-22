<?php
use App\Models\Slider;
use App\Libraries\MyClass;

if(isset($_POST['id'])) {
  $id = $_POST['id'];
  $slider = Slider::find($id);
  if($slider == null) {
    $response = array('success' => false, 'type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!');
  } else {
    $slider->status = ($slider['status'] == 1) ? 2 : 1;
    $slider->updated_at = date('Y-m-d H:i:s');
    $slider->updated_by = (isset($_SESSION['user_id']))? $_SESSION['user_id']:1;
    if ($slider->save()) {
      $response = array('success' => true, 'type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!');
    } else {
      $response = array('success' => false, 'type' => 'danger', 'msg' => 'Lỗi khi lưu trạng thái!');
    }
  }
  echo json_encode($response);
} else {
  MyClass::set_flash('message',['type'=>'danger','msg'=> 'Lỗi không xác định!']);
  header('location:index.php?option=slider');
}
