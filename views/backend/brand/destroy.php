<?php

use App\Models\Category;
use App\Libraries\MyClass;

$id=$_REQUEST['id'];
$row=Category::find($id);
$row->delete();
MyClass::set_flash('message',['type'=>'success','msg'=>'Xóa dữ liệu thành công']);

header('location:index.php?option=category&cat=trash');