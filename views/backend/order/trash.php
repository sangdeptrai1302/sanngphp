<?php

use App\Models\Brand;
use App\Models\Order;
use App\Libraries\MyClass;


$list = Order::where([['status', ' =', '0'], ['roles', '=', '0']])->orderBy('created_at', 'DESC')->get();

// var_dump($list);
use node_modules\bootstrap\dist\js\bootstrap;

?>
<?php require_once('../views/backend/Header.php'); ?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 " style="justify-content: center;">
          <h1>Thùng Rác </h1>
        </div>
        <div class="col-sm-6 ">
          <div class="row float-right">
            <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1" href="index.php?option=order"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">


    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <form method="post" action="index.php?option=order&cat=destroy">

          <button name="DESTROY_ALL" type="submit" class="btn btn-sm btn-danger p-3 m-2" style="border-radius: 17%;">
            <i class="fas fa-trash"></i> Xóa nhiều tin
          </button>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
      </div>
      <div class="card-body">
        <?php
        require_once('../views/backend/message.php');
        ?>
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Id</th>
              <th>Hình Ảnh</th>
              <th>Tên</th>
              <th>Tên Đăng Nhập</th>
              <th>Mật Khẩu</th>
              <th>Email</th>
              <th>Giới Tính</th>
              <th>Điện Thoại</th>
              <th>Địa Chỉ</th>
              <th>Quyền Truy Nhập</th>
              <th>Ngày Tạo</th>
              <th>Chức năng</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($list as $row) : ?>
              <tr>
                <td><input type="checkbox" name="checkId[]" value="<?= $row->id ?>"></td>
                <td><?= $row['id'] ?></td>
                <td><img class="img-thumbnail img-fluid" src="../public/dist/images/order/<?php echo $row['image'] ?>" alt=""></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['password'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?php if ($row['roles'] == 1) : ?>Quản trị<?php else : ?>Khách hàng<?php endif; ?></td>
                <td><?= $row['created_at'] ?></td>
                <td>
                  <a class="btn btn-sm btn-info p-3 mr-2" style="border-radius: 17%" ; href="index.php?option=order&cat=restore&id=<?= $row['id']; ?>">
                    <i class="fa-solid fa-rotate-left"></i>
                  </a>
                  <a class="btn btn-sm btn-danger p-3 mr-2" style="border-radius: 17%" ; href="index.php?option=order&cat=destroy&id=<?= $row['id']; ?>">
                    <i class="fa-solid fa-trash"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
                </form>
      </div>
      <!-- /.card-body -->

      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../views/backend/Footer.php'); ?>