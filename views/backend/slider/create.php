<?php

use App\Models\Slider;
use App\Libraries\MyClass;
use App\Libraries\Cart;
use App\Libraries\MessageArt;

$list_slider = Slider::where('status', '!=', '0')->get();
$html_sort_order="";
foreach($list_slider as $item)
{
  $html_sort_order.="<option value='" .$item->sort_order ."'>" . $item->name ."</option>";
}

// Kiểm tra xem đã thêm mới danh mục Trang đơn thành công hay chưa



?>


<?php require_once('../views/backend/Header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<form action="index.php?option=slider&cat=process" name="form1 " method="post" enctype="multipart/form-data">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 " style="justify-content: center;">
          <h1>Thêm Slider </h1>
        </div>
        <div class="col-sm-6 ">
          <div class="row float-right">
            <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1" href="index.php?option=slider"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a>

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


         
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="slug">tên slider</label>
                    <input type="text" class="form-control" id="slug" name="name" placeholder="VD: Tham quan lăng bác">
                  </div>

                  <div class="form-group">
                    <label for="link">liên kết</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="">
                  </div>
                  <div class="form-group">
          <label for="position">vị trí:</label>
          <select class="form-control" id="id" name="position">
            <option value="">-- Chọn ID --</option>
            <?php
               foreach ($list_slider as $item) {
                echo '<option value="' . $item->sort_order+1 . '">Sau:' . $item['name'] . '</option>';
              }
            ?>2
          </select>
        </div>
        <div class="form-group">
          <label for="parent-id">sắp xếp:</label>
          <select class="form-control" id="sort_order" name="sort_order">
            <option value="0">-- chọn vị trí sắp xếp--</option>
            <?php
            
              foreach ($list_slider as $item) {
                echo '<option value="' . $item['id'] . '">' . $item['id'] . '</option>';
              }
            ?>
          </select>
        </div>
                </div>
                <div class="col-md-6">

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
                  <div class="form-group">
                    <label for="status">Trạng thái:</label>
                    <select class="form-control" id="status" name="status">
                      <option value="1">Đã bật</option>
                      <option value="2">Chưa bật</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button name="THEM" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
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
</form>
<?php require_once('../views/backend/Footer.php'); ?>