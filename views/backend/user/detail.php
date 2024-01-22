<?php

use App\Models\Brand;
use App\Models\User;
use App\Models\Product;

$list = User::where('status', '!=', '0')->orderBy('created_at', 'DESC')->get();

// var_dump($list);
use node_modules\bootstrap\dist\js\bootstrap;

$id = $_REQUEST['id'];
$user = User::find($id);
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
          <h1>Chi tiết User </h1>
        </div>
        <div class="col-sm-6 ">
          <div class="row float-right">
            <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1" href="index.php?option=user"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a>
            <a class="btn btn-success mr-1 px-1" href="index.php?option=user&cat=create"><i class="fa-solid fa-plus"></i>Thêm</a>
            <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1" href="index.php?option=user&cat=trash"><i class="fa-solid fa-trash"></i>Thùng Rác</a>
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
        <h3 class="card-title"></h3>

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
        <table class="table table-bordered table-hover table-striped">


          <div class="container my-5">
            <div class="row">
              <div class="col-md-5">
                <img class="img-fluid" src="../public/dist/img/post/<?php echo $post['image'] ?>" alt="">
              </div>
              <div class="col-md-7">
                <h2>Tên User:<?= $user['name'] ?></h2>
                <h2>Tên đăng nhập:<?= $user['username'] ?></h2>
                <p><strong>ID User: <?= $user['id'] ?></strong></p>
                <p><strong>email:<?= $user['email'] ?></strong></p>
                <p><strong>Địa chỉ:<?= $user['address'] ?></strong></p>
                <p><strong>Số điện thoại:<?= $user['phone'] ?></strong></p>
                <p><strong>Ngày tạo:<?= $user['created_at'] ?></strong></p>
                <p><strong>Người tạo:<?= $user['created_by'] ?></strong></p>
                <p><strong>Ngày sửa cuối:<?= $user['updated_at'] ?></strong></p>
                <p><strong>Người sửa cuối:<?= $user['updated_by'] ?></strong></p>
                <p><strong>Trạng thái:<?= $user['status'] ?></strong></p>
                <h3><strong>Quyền truy cập:</strong><?php if ($user['roles'] == 1) : ?>Quản trị<?php else : ?>Khách hàng<?php endif; ?></h3>
                <h3><strong>Giới tính:</strong><?= $user['gender'] ?></h3>


                <a class="btn btn-sm btn-success p-3 m-2  justify-content-center" style="border-radius: 17%" ; href="index.php?option=user&cat=edit&id=<?= $user['id']; ?>">
                  <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <a class="btn btn-sm btn-danger  p-3 m-2  justify-content-center" style="border-radius: 17%" ; href="index.php?option=user&cat=delete&id=<?= $user['id']; ?>">
                  <i class="fas fa-trash"></i>
                </a>
              </div>
            </div>
          </div>

        </table>

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