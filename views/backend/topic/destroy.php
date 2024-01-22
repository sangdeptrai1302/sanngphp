<?php

use App\Models\Topic;
use App\Libraries\MyClass;

$id=$_REQUEST['id'];
$row=Topic::find($id);
$row->delete();
MyClass::set_flash('message',['type'=>'success','msg'=>'Xóa dữ liệu thành công']);

header('location:index.php?option=topic&cat=trash');