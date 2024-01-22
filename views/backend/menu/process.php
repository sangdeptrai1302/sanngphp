<!-- <?php

use App\Helper\SlugHelper;
use App\Models\Category;
use App\Libraries\MyClass;
use App\Models\Menu;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;

        if (isset($_POST['UPDATE_SORT_ORDER'])) {
            $list = $_POST['sort_order'];
            foreach ($list as $id => $sort_order) {
                $menu = Menu::find($id);
                $menu->sort_order = $sort_order;
                $menu->save();
            }
            MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Lưu thành công sắp xếp mới']);
            header('location:index.php?option=menu');
        }
        if (isset($_POST['themCategory'])) {
            $list_id = $_POST['categoryId'];
            foreach ($list_id as $id) {
                $category = Category::find($id);
                $menu = new Menu;
                $menu->name = $category->name;
                $menu->link = 'index.php?option=category&cat=' . $category->slug;
                $menu->type = "category";
                $menu->table_id = $category->id;
                $menu->sort_order = 1;
                $menu->status = 2;
                $menu->position = $_POST['position'];
                $menu->parent_id = 0;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = 1;
                $menu->save();
            }

            MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công dữ liệu mới']);
            header('location:index.php?option=menu');
        }

        

        if (isset($_POST['themBrand'])) {
            $list_id = $_POST['brandID'];
            foreach ($list_id as $brand_id) {
                $brand = Brand::find($brand_id);
                $menu = new Menu;
                $menu->name = $brand->name;
                $menu->link = 'index.php?option=product&brand=' . $brand->slug;
                $menu->type = "brand";
                $menu->table_id = $brand->id;
                $menu->sort_order = 1;
                $menu->status = 2;
                $menu->position = $_POST['position'];
                $menu->parent_id = 0;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = 1;
                $menu->save();
            }

            MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công dữ liệu mới']);
            header('location:index.php?option=menu');
        }
            if (isset($_POST['topicID'])) {
                $list_id = $_POST['topicID'];
                foreach ($list_id as $id) {
                    $topic = Topic::find($id);
                    $menu = new Menu;
                    $menu->name = $topic->name;
                    $menu->link = 'index.php?option=topic&cat=' . $topic->slug;
                    $menu->type = "topic";
                    $menu->table_id = $topic->id;
                    $menu->sort_order = 1;
                    $menu->status = 2;
                    $menu->position = $_POST['position'];
                    $menu->parent_id = 0;
                    $menu->created_at = date('Y-m-d H:i:s');
                    $menu->created_by = 1;
                    $menu->save();
                }
                MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công menu']);
                header('location:index.php?option=menu'); // Điều hướng về trang chính

        }



if (isset($_POST['themPage'])) {
    $list_id = $_POST['pageID'];
    foreach ($list_id as $id) {
        $page = Post::find($id);
        $menu = new Menu;
        $menu->name = $page->title;
        $menu->link = 'index.php?option=page&cat=' . $page->slug;
        $menu->type = "page";
        $menu->table_id = $page->id;
        $menu->sort_order = 1;
        $menu->status = 2;
        $menu->position = $_POST['position'];
        $menu->parent_id = 0;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = 1;
        $menu->save();
    }
            MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công menu']);
            header('location:index.php?option=menu'); // Điều hướng về trang chính

}

if (isset($_POST['themCustom'])) {
    if(strlen($_POST['name'])>0 && strlen($_POST['link'])>0){
    $menu = new Menu;
    $menu->name = $_POST['name'];
    $menu->link = $_POST['link'];
    $menu->type = "page";
    $menu->table_id = 0;
    $menu->sort_order = 1;
    $menu->status = 2;
    $menu->position = $_POST['position'];
    $menu->parent_id = 0;
    $menu->created_at = date('Y-m-d H:i:s');
    $menu->created_by = 1;
    $menu->save();
                MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công menu']);
    }else
            MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Chưa nhập tên và link']);
            header('location:index.php?option=menu'); // Điều hướng về trang chính

}
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $row = Menu::find($id);
    if ($row) {
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = 1;
        $row->save();
        MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Đưa mẫu tin vào thùng rác thành công']);
        header('location:index.php?option=menu&cat=trash');
    } else {
        MyClass::set_flash('message', ['type' => 'error', 'msg' => 'Không tìm thấy mẫu tin']);
        header('location:index.php?option=menu');
    }
} elseif (isset($_POST['DELETE_ALL'])) {
    $list = $_POST['checkId'];
    foreach ($list as $id) {
        $row = Menu::find($id);
        if ($row) {
            $row->status = 0;
            $row->updated_at = date('Y-m-d H:i:s');
            $row->updated_by = 1;
            $row->save();
        }
    }
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Xóa vĩnh viễn nhiều mẫu tin vào thùng rác thành công']);
    header('location:index.php?option=menu');
} else {
    MyClass::set_flash('message', ['type' => 'error', 'msg' => 'Thiếu thông tin cần thiết']);
    header('location:index.php?option=menu');
}







// if (isset($_POST['THEM'])) {
//     $row = new User;
//     $row->name = $_POST['name'];
//     $row->username = $_POST['username'];
//     $row->password = sha1($_POST['password']);
//     $row->email = $_POST['email'];
//     $row->address = $_POST['address'];
//     $row->phone = $_POST['phone'];
//     $row->status = $_POST['status'];
//     $row->gender = $_POST['gender'];
//     $row->roles = 0;

//     // Upload hình ảnh
//     if (!empty($_FILES["image"]["name"])) {
//         $file = $_FILES["image"];
//         $target_dir = "../public/dist/images/customer/";
//         $target_file = $target_dir . basename($file["name"]);
//         $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      
//         // Kiểm tra kiểu file
//         $allowedExtensions = array("jpg", "jpeg", "png");
//         if (in_array($imageFileType, $allowedExtensions)) {
//             // Kiểm tra kích thước file
//             if ($file["size"] > 0 && $file["size"] <= 500000) {
//                 if (move_uploaded_file($file["tmp_name"], $target_file)) {
//                     $row->image = basename($file["name"]);
//                 } else {
//                     $_SESSION['error'] = "Có lỗi khi tải file lên!";
//                 }
//             } else {
//                 $_SESSION['error'] = "Kích thước file ảnh phải từ 1 byte đến 500KB!";
//             }
//         } else {
//             $_SESSION['error'] = "Chỉ hỗ trợ tập tin JPG, JPEG và PNG!";
//         }
//     }
    
//     // Lưu dữ liệu vào CSDL
//     $row->created_at = date('Y-m-d H:i:s');
//     $row->created_by = $_SESSION['userid'] ?? 1;
//     $row->updated_at = date('Y-m-d H:i:s');
//     $row->updated_by = $_SESSION['userid'] ?? 1;
//     $row->save();
//     MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm thành công dữ liệu mới']);
//     header('location:index.php?option=customer');
// }




// if (isset($_POST['CAPNHAT'])) {
//     $id = $_REQUEST['id'];
//     $row = User::find($id);
//     $row->name = $_POST['name'];
//     $row->username = $_POST['username'];
//     $row->password = sha1($_POST['password']);
//     $row->email = $_POST['email'];
//     $row->address = $_POST['address'];
//     $row->phone = $_POST['phone'];
//     $row->status = $_POST['status'];
//     $row->gender = $_POST['gender'];
//     $row->status = $_POST['status'];
//     $row->roles = 0;


//     if (!empty($_FILES["image"]["name"])) {
//         $file = $_FILES["image"];
//         $target_dir = "../public/dist/images/customer/";
//         $target_file = $target_dir . basename($file["name"]);
//         $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//         // Kiểm tra kiểu file
//         $allowedExtensions = array("jpg", "jpeg", "png");
//         if (in_array($imageFileType, $allowedExtensions)) {
//             // Kiểm tra kích thước file
//             if ($file["size"] > 0 && $file["size"] <= 500000) {
//                 if (move_uploaded_file($file["tmp_name"], $target_file)) {
//                     $row->image = basename($file["name"]);
//                 } else {
//                     $_SESSION['error'] = "Có lỗi khi tải file lên!";
//                 }
//             } else {
//                 $_SESSION['error'] = "Kích thước file ảnh phải từ 1 byte đến 500KB!";
//             }
//         } else {
//             $_SESSION['error'] = "Chỉ hỗ trợ tập tin JPG, JPEG và PNG!";
//         }
//     }

//     $row->updated_at = date('Y-m-d H:i:s');
//     $row->updated_by = $_SESSION['userid'] ?? 1;
//     $row->save();
//     MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật mẫu tin thành công']);
//     header('location:index.php?option=customer');
// }

