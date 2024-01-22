<?php
use App\Models\Product;
use App\Models\Brand;

$list = Product::where('status', '!=', '0')->get();
$list_brand = Brand::where('status', '!=', '0')->get();
$html_category_id= '';
$html_list_brand= '';

foreach ($list as $item) {
    $html_category_id.= "<option value'" . $item->id . "'>" . $item->name . "</option>";
}
foreach ($list_brand as $brand) {
    $html_list_brand.= "<option value'" . $brand->id . "'>" . $brand->name . "</option>";
}
?>


<?php require_once('../views/backend/Header.php') ;?> 
  <!-- Content Wrapper. Contains page content --> 
<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) --> 
     <!-- Content Header (Page header) --> 
     <section class="content-header"> 
      <div class="container-fluid"> 
        <div class="row mb-2"> 
          <div class="col-sm-6 " style="justify-content: center;"> 
            <h1 >Thêm sản phẩm </h1> 
          </div> 
          <div class="col-sm-6 "> 
          <div class="row float-right"> 
              <a style="padding: 4px; border-radius: 10%;text-align: center;padding-left: 5px; align-items:center;" class="btn btn-danger mr-1 px-1"  href="index.php?option=product"><i class="fa-solid fa-arrow-left-long"></i>Quay về</a> 

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
                <?php include_once('../views/backend/message.php');?>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="name">Tên danh mục</label>
                                <input name="name" id="name" type="text" class="form-control" required placeholder="VD: Thời trang nam">
                            </div>
                            <div class="mb-3">
                                <label for="detail">Chi tiết</label>
                                <textarea name="detail" id="detail" class="form-control" required placeholder="VD: chi tiết"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metadesc">Mô tả(SEO)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" required placeholder="VD: Thời trang dành cho nam giới"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metakey">Từ khóa(SEO)</label>
                                <textarea name="metakey" id="metakey" class="form-control" required placeholder="VD: Thời trang,thời trang nam,thời trang dành cho nam"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="category_id">Danh mục</label>
                                <select id="category_id" name="category_id" class="form-control"required>
                                    <option value="">--Chọn Danh mục--</option>
                                    <?= $html_category_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="brand_id">Thương hiệu</label>
                                <select id="brand_id" name="brand_id" class="form-control">
                                    <option value="">--Chọn Thương hiệu--</option>
                                    <?= $html_brand_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="qty">Số lượng</label>
                                <input name="qty" id="qty" type="number" value="1" min="1" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="price">Giá</label>
                                <input name="price" id="price" type="number" value="1000" min="1000" step="500" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="pricesale">Giá sale</label>
                                <input name="pricesale" id="pricesale" type="number" value="1000" min="1000" step="500" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="image">Hình ảnh</label>
                                <input name="image" id="image" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                    <!-- <?= $html_sort_order; ?> -->
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-right">
                            <button name="THEM" type="submit" class="btn-btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[thêm]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=product">
                                <i class="fas fa-arrow-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                    </div>
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
<?php require_once('../views/backend/Footer.php') ;?>