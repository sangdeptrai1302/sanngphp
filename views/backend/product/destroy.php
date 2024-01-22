<?php

use App\Models\Product;
use App\Libraries\MyClass;

$id=$_REQUEST['id'];
$row=Product::find($id);
$row->delete();
MyClass::set_flash('message',['type'=>'success','msg'=>'Xóa dữ liệu thành công']);

header('location:index.php?option=product&cat=trash');