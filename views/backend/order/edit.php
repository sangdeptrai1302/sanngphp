<?php

use App\Models\Order;

$id = $_REQUEST['id'];
$order = Order::find($id);

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
          <h1>Chỉnh sửa Customer</h1>
        </div>
        <div class="col-sm-6 ">
          <div class="row float-right">
            <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1" href="index.php?option=order"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a>

          </div>
        </div>
      </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">


    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Title</h3>

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


          <form action="index.php?option=order&cat=process" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $order->id ?>">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Tên Order:</label>
                    <input type="text" class="form-control" value="<?= $order->name ?>" id="name" name="name" placeholder="VD: Tham quan lăng bác">
                  </div>
                  <div class="form-group">
                    <label for="username">Tên đăng nhập:</label>
                    <input type="text" class="form-control" value="<?= $order->username ?>" id="username" name="username" placeholder="VD: Tham quan lăng bác">
                  </div>
                  <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="text" class="form-control" value="<?= $order->password ?>" id="password" name="password" placeholder="VD: Tham quan lăng bác">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" value="<?= $order->email ?>" id="email" name="email" placeholder="VD: Từ khóa">
                  </div>
                  <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="address" class="form-control" value="<?= $order->address ?>" id="address" name="address" placeholder="VD: Từ khóa">
                  </div>


                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" class="form-control" value="<?= $order->phone ?>" id="phone" name="phone" placeholder="VD: Từ khóa">
                  </div>
                  <div class="form-group">
                    <label for="status">Trạng thái:</label>
                    <select class="form-control" id="status" name="status">
                      <option value="<?= $order->status ?>">chọn</option>
                      <option value="1">Đã bật</option>
                      <option value="2">Chưa bật</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="gender">Giới tính:</label>
                    <select class="form-control" id="gender" name="gender">
                      <option value="<?= $order->gender ?>"><?= $order->gender ?></option>
                      <option value="Nam">Nam</option>
                      <option value="Nữ">Nữ</option>
                      <option value="Khác">Khác</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="image">Ảnh:</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" for="image">Chọn ảnh</label>
                    </div>
                    <script>
                      $('.custom-file-input').on('change', function() {
                        var fileName = $(this).val().split('\\').pop();
                        $(this).next('.custom-file-label').addClass("selected").html(fileName);
                      });
                    </script>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button name="CAPNHAT" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
                </div>
              </div>
            </div>
          </form>




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