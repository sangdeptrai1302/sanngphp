<?php
use App\Libraries\MyClass;

    if (MyClass::exists_flash('message')) {
    $message = MyClass::get_flash('message');
    echo "<div class='alert alert-".$message['type']."'>";
    echo $message['msg'];
    echo "</div>";
}
 ?>