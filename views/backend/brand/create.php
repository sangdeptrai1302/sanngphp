<?php
use App\Models\Brand;

$list=Brand::where('status','!=','0')->get();
// Kiểm tra xem đã thêm mới danh mục sản phẩm thành công hay chưa
$html_sort_order='';
foreach($list as $item)
{
  $html_sort_order.="<option value='".$item['sort_order'] ."'>Sau:".$item["name"]."</option>";
}

?>


<?php require_once('../views/backend/Header.php') ;?> 
  <!-- Content Wrapper. Contains page content --> 

  <div class="content-wrapper"> 
    <!-- Content Header (Page header) --> 
     <!-- Content Header (Page header) --> 
     <section class="content-header"> 
      <div class="container-fluid"> 
        <div class="row mb-2"> 
          <div class="col-sm-6 " style="justify-content: center;"> 
            <h1 >Thêm thương hiệu </h1> 
          </div> 
          <div class="col-sm-6 "> 
          <div class="row float-right"> 
              <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1"  href="index.php?option=brand"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a> 

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
     



<form action="index.php?option=brand&cat=process" method="post" enctype="multipart/form-data">
<div class="container">
  <div class="row">
    <div class="col-md-6">
        <div class="form-group">
          <label for="name">Tên thương hiệu:</label>
          <input type="name" class="form-control" id="name" name="name" require placeholder="VD:Quần áo">
        </div>
        <div class="form-group">
          <label for="metadesc">Mô tả(SEO):</label>
          <textarea class="form-control" id="metadesc" name="metadesc" require placeholder="VD:Thời trang nam đẹp số dách, đẹp hơn Sơn Tùng, chấp tùng núi, chấp sếp 3 bước "></textarea>
        </div>
        <div class="form-group">
          <label for="metakey">Từ khóa(SEO):</label>
          <input type="text" class="form-control" id="metakey" name="metakey" require placeholder="VD:Thời trang nam">
        </div>
        <div class="form-group">
          <label for="parent-id">Danh mục cha:</label>
          <select class="form-control" id="parent-id" name="parent_id">
            <option value="0">-- Chọn danh mục cha --</option>
            <?php
            
              foreach ($list as $brand) {
                echo '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
              }
            ?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="id">Sau sản phẩm:</label>
          <select class="form-control" id="id" name="id">
            <option value="">-- Chọn ID --</option>
            <?php
               foreach ($list as $brand) {
                echo '<option value="' . $brand->sort_order+1 . '">Sau:' . $brand['name'] . '</option>';
              }
            ?>2
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
          <div class="form-group">
          <label for="status">Trạng thái:</label>
          <select class="form-control" id="status" name="status">
          <option value="1">Chưa bật</option>
          <option value="2">Đẫ bật</option>
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
 
<?php require_once('../views/backend/Footer.php') ;?>