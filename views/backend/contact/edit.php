<?php

use App\Models\Slider;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$slider = Slider::find($id);
if($slider==null)
{
  header("location:index.php?option=slider");
  MyClass::set_flash('message',['type'=>'danger','msg'=>'mẫu tin không tồn tại']);
}
$list=Slider::where([['status','!=','0'],['id','!=','$id']])->get();
$html_sort_order="";
foreach($list as $item)
if($item->sort_order -1==$slider->sort_order)
{
  $html_sort_order.="<option selected value='".$item->sort_order."'>".$item->name."</option>";
}else{
  $html_sort_order.="<option  value='".$item->sort_order."'>".$item->name."</option>";

}
?>
<?php require_once('../views/backend/Header.php'); ?>
<form action="index.php?option=slider&cat=process" name="form1 " method="post">
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-lg-6 d-flex justify-content-center">
          <h1><strong>Cập nhật Bài viết </strong></h1>
        </div>
        <div class="col-lg-6 ">
          <div class="row float-right">
            <a class="btn btn-danger mr-1 px-1" href="index.php?option=slider"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a>

          </div>
        </div>
      </div>
  </section>

  <section class="content">


    <div class="card">
      <div class="card-header">

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
          <form action="index.php?option=slider&cat=process&id=<?= $slider->id; ?>" method="post" enctype="multipart/form-data">
            <div class="container">
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">tên slider</label>
                    <input type="text" class="form-control" id="slug" name="name" placeholder="VD: Tham quan lăng bác">
                  </div>

                  <div class="form-group">
                    <label for="link">liên kết</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="">
                  </div>
                  <div class="form-group">
          <label for="id">vị trí:</label>
          <select class="form-control" id="id" name="id">
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
                  <button name="CAPNHAT" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
                  <a class="btn btn-sm btn-info p-3 m-2" style="border-radius: 17%" ; href="index.php?option=slider&cat=detail&id=<?= $page['id']; ?>">


                    <i class="fa-solid fa-circle-info"></i>

                  </a>

                  <a class="btn btn-sm btn-danger  p-3 m-2" style="border-radius: 17%" ; href="index.php?option=slider&cat=delete&id=<?= $page['id']; ?>">

                    <i class="fas fa-trash"></i>

                  </a>

                </div>
              </div>

            </div>
          </form>




        </table>
      </div>
    </div>
  </section>
</div>
</form>
<?php require_once('../views/backend/Footer.php'); ?>